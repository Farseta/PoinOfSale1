<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stuff;
use App\Models\category;
use App\Models\discount;
use App\Models\tax;
class stuffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stuffs = stuff::with([ 'tax', 'category','discount'])->get();
        $categories = category::all();
        $discounts = discount::all();
        $taxes = tax::all();
        // return $stuffs;
        // dd($stuffs);
        return view("employeeLayout.stuffLayout.index", compact("categories",'taxes','discounts','stuffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $discounts = discount::all();
        $taxes = tax::all();
        return view("employeeLayout.stuffLayout.create", compact("categories",'taxes','discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name_stuff'=>'required',
            'category_id'=>'required',
            'discount_id'=>'required',
            'tax_id'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ]); 
        stuff::create($request->all());
        return redirect()->route('stuffs.index')->with('success','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stuff = stuff::with([ 'tax', 'category','discount'])->find($id);
        $categories = category::all();
        $discounts = discount::all();
        $taxes = tax::all();
        
        $selectedCategoryId = $stuff->category_id; 
        return view("employeeLayout.stuffLayout.edit", compact("categories",'taxes','discounts','stuff','selectedCategoryId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name_stuff'=>'required',
            'category_id'=>'required',
            'discount_id'=>'required',
            'tax_id'=>'required',
            'price'=>'required',
            'stock'=>'required',
        ]); 
        stuff::findOrFail($id)->update($request->all());
        return redirect()->route('stuffs.index')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stuff = stuff::findOrFail($id);
        $stuff->delete();
        return redirect()->route('stuffs.index');
    }
}

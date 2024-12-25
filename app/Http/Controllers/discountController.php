<?php

namespace App\Http\Controllers;

use App\Models\discount;
use Illuminate\Http\Request;

class discountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("employeeLayout.stuffLayout.discount.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'discount_name'=> 'required',
            'discount_type'=> 'required',
            'discount_value'=> 'required',
        ]);

        $input = $request->all();
        discount::create($input);
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
        $discount = discount::findOrFail($id);
        return view('employeeLayout.stuffLayout.discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'discount_name'=> 'required',
            'discount_type'=> 'required',
            'discount_value'=> 'required',
        ]);
        discount::findOrFail($id)->update($request->all());
        return redirect()->route('stuffs.index')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = discount::findOrFail($id);
        $discount->delete();
        return redirect()->route('stuffs.index')->with('success','success');
    }
}

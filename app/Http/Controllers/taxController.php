<?php

namespace App\Http\Controllers;

use App\Models\tax;
use Illuminate\Http\Request;

class taxController extends Controller
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
        return view("employeeLayout.stuffLayout.tax.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tax_name'=>'required',
            'value'=>'required',
        ]);
        $input = $request->all();
        tax::create($input);
         return redirect()->route('stuffs.index')->with('success','berhasil menginputkan kategori');
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
        $tax = tax::findOrFail($id);
        return view('employeeLayout.stuffLayout.tax.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[

            'tax_name' =>'required',
            'value'=> 'required',
        ]);
        $input = $request->all();
        tax::findOrFail($id)->update($input);
        return redirect()->route('stuffs.index')->with('success','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax = tax::findOrFail($id);
        $tax->delete();
        return redirect()->route('stuffs.index')->with('success','success');
    }
}

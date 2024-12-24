<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\discount;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("employeeLayout.stuffLayout.category.create");
        // return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        $input = $request->all();
        category::create($input);

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
        
        $category = category::find($id);
        return view('employeeLayout.stuffLayout.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
            [
                'category_name'=> 'required',
            ]
            );
        // return $request;
        $category = category::find($id);
        $category->update($request->all());
        return redirect()->route('stuffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->route('stuffs.index');
    }
}

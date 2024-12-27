<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stuff;
use App\Models\restock;
use App\Models\restock_detail;
class restockDetailController extends Controller
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
    public function create(string $id)
    {
        $stuffs = stuff::find($id);
        return view("employeeLayout.restockLayout.restock_detail.create", compact("stuffs"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $stuffs = stuff::find($id);
        return view('employeeLayout.restockLayout.restock_detail.edit', compact("stuffs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

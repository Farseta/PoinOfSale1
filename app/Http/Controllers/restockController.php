<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stuff;
use App\Models\restock;
use App\Models\restock_detail;
use Egulias\EmailValidator\Result\Reason\DetailedReason;

class restockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view("employeeLayout.restockLayout.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stuffs = stuff::all();
        $restocks = restock::with("user")->get();
        $detail_restocks = restock_detail::with("stuff")->get();
        return view("employeeLayout.restockLayout.create",compact('stuffs'));
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
        return view('employeeLayout.restockLayout.restock_detail.edit');
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

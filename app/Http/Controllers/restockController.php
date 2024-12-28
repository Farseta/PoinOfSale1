<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stuff;
use App\Models\restock;
use App\Models\restock_detail;
use App\Models\User;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
// use Illuminate\Support\Facades\Log;
class restockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $restocks = restock::with('user')->get();
    $restock_details = restock_detail::with('stuff')->get();
    
    return view("employeeLayout.restockLayout.index",compact("restocks", "restock_details"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stuffs = stuff::all();
        // $restocks = restock::with("user")->get();
        // $detail_restocks = restock_detail::with("stuff")->get();
        return view("employeeLayout.restockLayout.create",compact('stuffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stuffArray = $request->input(('stuffArray'));
        $totalPrice = $request->input(('totalPrice'));
        $user_id = $request->input('id_user');
        $restock =restock::create([
            'user_id' => $user_id,
            'cost_total' => $totalPrice,
            'status' => 0,
        ]);
        foreach($stuffArray as $stuff){
            restock_detail::create([
                'restock_id' =>$restock->id,
                'stuff_id' =>$stuff['id'],
                'stuff_total'=> $stuff['stock_stuff'],
                'cost_unit' =>$stuff['price_stuff'],
            ]);
            $stuffItem = stuff::find($stuff['id']);
            if($stuffItem){
                $stuffItem->stock+= $stuff['stock_stuff'];
                $stuffItem->save();
            }
        }
        
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
    //    
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

    public function searchItem(request $request){
        $idstuff = $request->query('id');
        $item = stuff::find($idstuff);
        if($item){
            return response()->json([
                'stuff_name' => $item->name_stuff 
            ]);
        }else{
            return response()->json(['message' => 'not found']);
        }
    }
    public function show_detail($restock_id){
        $restock_detail = restock_detail::where('restock_id', $restock_id)->with('stuff','restock')->get();
        // Log::info($restock_id);

        // Log::info($restock_detail);
        return response()->json($restock_detail);
    }
    public function approve_stack(Request $request, $id){
        $approvalvalue= $request->input('approvalValue');
        $restock_id = $request->input('restock_id');
        $restock = restock::find($restock_id);

        if ($restock){
            $restock->status = 1;
            $restock->save();
            // return response()->json(['message' => 'Stock approved successfully']);
            return redirect()->route('home');
        }
        else{
            return response()->json(['message'=>$approvalvalue]);
        }
    }
}

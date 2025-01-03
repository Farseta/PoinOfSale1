<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restock_detail extends Model
{
    protected $table ='restock_details';
    protected $primaryKey = 'id';
    protected $fillable = ['restock_id', 'stuff_id', 'stuff_total','cost_unit'];
    public function  stuff(){
        return $this->belongsTo(stuff::class,'stuff_id');
    }
    public function restock(){
        return $this->belongsTo(restock::class,'restock_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales_detail extends Model
{
    protected $table ='sales_details';
    protected $primaryKey = 'id';
    protected $fillable = ['sale_id', 'stuff_id','stuff_total'];

    public function  stuff(){
        return $this->belongsTo(stuff::class,'stuff_id','stuffs');
    }
    public function sale(){
        return $this->belongsTo(sale::class,'sale_id','sales');
    }
}

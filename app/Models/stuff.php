<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stuff extends Model
{
    protected $table ='stuffs';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','discount_id','tax_id','name_stuff','stock','price'];

    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function discount(){
        return $this->belongsTo(discount::class,'discount_id');
    }
    public function tax(){
        return $this->belongsTo(tax::class,'tax_id');
    }

    public function sales_details(){
        return $this->hasMany(sales_detail::class,'stuff_id','id');
    }
    public function detail_restocks(){
        return $this->hasMany(restock_detail::class,'stuff_id','id');
    }
}

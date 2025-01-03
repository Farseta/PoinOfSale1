<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $table ='sales';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','price_total','status'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','users');
    }
    public function sales_details(){
        return $this->hasMany(sales_detail::class,'sale_id','id');
    }
}

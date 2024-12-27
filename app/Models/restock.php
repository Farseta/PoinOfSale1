<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restock extends Model
{


    protected $table ='restocks';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','cost_total','status'];
    public function  user(){
        return $this->belongsTo(user::class,'user_id','users');
    }
    public function detail_restocks(){
        return $this->hasMany(restock_detail::class,'restock_id','id');
    }
}

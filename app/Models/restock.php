<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restock extends Model
{


    protected $table ='restocks';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','const_total','status'];
    public function  user(){
        return $this->belongsTo(user::class,'user_id','users');
    }
}

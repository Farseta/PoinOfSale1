<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    protected $table ='discounts';
    protected $primaryKey = 'id';
    protected $fillable = ['discount_name','discount_type','discount_value'];
    public function  stuffs(){
        return $this->hasMany(stuff::class,'discount_id','id');
    }
}

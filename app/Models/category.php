<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table ='categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name'];

    public function  stuffs(){
        return $this->hasMany(stuff::class,'category_id','id');
    }
}

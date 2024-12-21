<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tax extends Model
{
    protected $table ='taxes';
    protected $primaryKey = 'id';
    protected $fillable = ['tax_name','value'];
    public function stuffs(){{
        return $this->hasMany(stuff::class,'tax_id','id');
    }}
}

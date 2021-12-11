<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
      'name','address','code','is_active'
    ];

    public function members() {
      return $this->hasMany('App\Models\HouseMember');
    }

    // public function user(){
    //   return $this->hasOneThrough(User::class,HouseMember::class,'');
    // }

}

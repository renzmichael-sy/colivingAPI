<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $table = 'subcategories';
    protected $fillable = [
      'category_id',
      'name',
      'is_active'
    ];

    public function transactions(){
      return $this->hasMany('App\Models\Transaction');
    }
}

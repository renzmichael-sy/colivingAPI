<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
      'poster_id',
      'subcateg_id',
      'amount',
      'description',
      'place',
      'date',
      'due_date',
      'bill_peiod_start',
      'bill_peiod_end',
      'is_active',
      'currency_code'
    ];

    public function divisions(){
      return $this->hasMany('App\Models\TransactionDivision');
    }

    public function histories(){
      return $this->hasMany('App\Models\TransactionHistory');
    }

    public function poster(){
      return $this->hasOne('App\Models\HouseMember','id');
    }

    public function subcateg(){
      return $this->hasOne('App\Models\SubCategory');
    }

    public function settings(){
      return $this->hasMany('App\Models\TransactionSetting');
    }
}

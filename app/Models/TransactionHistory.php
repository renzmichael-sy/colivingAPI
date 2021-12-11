<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
  protected $fillable = [
    'transaction_id',
    'poster_id',
    'house_id',
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

  public function transaction(){
    return $this->hasOne('App\Models\Transaction');
  }

  public function poster(){
    return $this->hasOne('App\Models\HouseMember');
  }

  public function house(){
    return $this->hasOne('App\Models\House');
  }

  public function subcategory(){
    return $this->hasOne('App\Models\SubCategory');
  }
}

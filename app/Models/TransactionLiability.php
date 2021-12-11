<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLiability extends Model
{
    protected $fillable = [
      'payee_id',
      'payer_id',
      'transaction_id',
      'amount',
      'is_paid',
      'date_paid'
    ];

    public function payee(){
      return $this->hasOne('App\Models\HouseMember');
    }

    public function payer(){
      return $this->hasOne('App\Models\HouseMember');
    }

    public function transaction(){
      return $this->hasOne('App\Models\Transaction');
    }

    public function payments(){
      return $this->hasMany('App\Models\LiabilityPayment');
    }
}

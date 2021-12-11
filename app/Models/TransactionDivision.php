<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDivision extends Model
{
    use HasFactory;

    protected $fillable = [
      'transaction_id',
      'house_member_id',
      'amount_divided',
      'amount_paid',
      'percentage',
      'is_saved',
      'is_active'
    ];

    public function transaction(){
      return $this->hasOne('App\Models\Transaction');
    }

    public function home_member(){
      return $this->hasOne('App\Models\HouseMember');
    }
}

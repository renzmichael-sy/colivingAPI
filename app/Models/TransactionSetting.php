<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSetting extends Model
{
    protected $fillable = [
      'transaction_id',
      'house_member_id',
      'is_visible',
      'can_edit',
      'is_active'
    ];

    public function transaction(){
      return $this->hasOne('App\Models\Transaction');
    }

    public function house_member(){
      return $this->hasOne('App\Models\HouseMember');
    }
}

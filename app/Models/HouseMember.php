<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseMember extends Model
{
    protected $fillable = [
      'user_id','house_id','is_active','is_accepted'
    ];

    public function house(){
      return $this->belongsTo('App\Models\House');
    }

    public function user(){
      return $this->belongsTo('App\Models\User');
    }

    public function reminder_member(){
      return $this->hasMany('App\Models\ReminderMember');
    }

    public function transaction_settings(){
      return $this->hasMany('App\Models\TransactionSetting');
    }

    public function transactions(){
      return $this->hasMany('App\Models\Transaction');
    }
}

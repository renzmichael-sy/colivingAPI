<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderMember extends Model
{
    protected $fillable = [
      'reminder_id',
      'house_member_id',
      'is_visible',
      'can_edit',
      'is_active'
    ];

    public function reminder(){
      return $this->belongsTo('App\Models\Reminder');
    }

    public function house_member(){
      return $this->belongsTo('App\Models\HouseMember');
    }
}

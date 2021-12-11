<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
      'house_id',
      'poster_id',
      'reminder',
      'start_date',
      'end_date',
      'is_active'
    ];

    public function members(){
      return $this->hasMany('App\Models\ReminderMember');
    }
}

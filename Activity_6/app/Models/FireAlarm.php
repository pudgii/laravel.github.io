<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FireAlarm extends Model
{
    protected $fillable = ['location', 'status', 'installation_date'];
}

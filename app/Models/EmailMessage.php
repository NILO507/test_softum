<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'uuid',
        'from',
        'to',
        'cc',
        'ip',
        'user_agent',
    ];
}

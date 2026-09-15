<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'product',
        'name',
        'phone',
        'email',
        'message',
        'status',
        'admin_note',
    ];
}
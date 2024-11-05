<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $table = 'billings';

    protected $fillable = [
        'name',
        'email',
        'user_name',
        'amount',
        'mobile',
        'address',
        'billing_date',
        'gender',
        'message',
    ];
}

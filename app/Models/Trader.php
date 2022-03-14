<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = [
        'nationality',
        'country',
        'town',
        'address',
        'annees_experience',
        'level',
        'user_id'
    ];
    public $timestamps = true;
}

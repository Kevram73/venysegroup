<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venyse extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];
    public $timestamps = true;
}

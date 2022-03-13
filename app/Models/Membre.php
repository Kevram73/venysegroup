<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'poste',
        'nationality'.
        'country',
        'town',
        'born_day',
        'address',
        'photoId_url'
    ];
    public $timestamps = true;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';
    protected $fillable =[
        'first_name',
        'last_name',
        'nationality',
        'email',
        'phone_number',
        'country',
        'town',
        'born_day',
        'address',
        'annees_experience',
        'photoId_url',
        'certificatResidence_url',
        'level'
    ];
    public $timestamps = true;
}

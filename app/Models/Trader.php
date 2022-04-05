<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_naissance',
        'pays',
        'nationalite',
        'adresse',
        'url_photo_profile',
        'url_certificat_residence',
        'user_id'
    ];
    public $timestamps = true;

    protected $casts = [
        'date_naissance'=>'datetime',
    ];
   
    //Inverse of the one to one relationship BelongsTo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

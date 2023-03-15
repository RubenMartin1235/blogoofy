<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'goof_id',
        'user_id'
    ];

    function goof(){
        return $this->belongsTo(Goof::class)->withTimestamps();
    }
    function user(){
        return $this->belongsTo(User::class)->withTimestamps();
    }
}

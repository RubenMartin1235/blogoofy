<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Goof;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        'goof_id',
        'user_id'
    ];

    function goof(){
        return $this->belongsTo(Goof::class, 'goof_id');
    }
    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

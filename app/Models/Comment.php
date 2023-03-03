<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Goof;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'goof_id',
        'user_id'
    ];

    function user(){
        return $this->belongsTo(User::class)->withTimestamps();
    }
    function goof(){
        return $this->belongsTo(Goof::class)->withTimestamps();
    }
}

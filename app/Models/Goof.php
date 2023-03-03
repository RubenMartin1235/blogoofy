<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;

class Goof extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'body',
    ];
    /*
    protected $dispatchesEvents=[
        'created'=>PioCreated::class,
    ];
    */

    function user(){
        return $this->belongsTo(User::class);
    }
    function comments(){
        return $this->hasMany(Comment::class);
    }
    function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    function dispatch(){}
}

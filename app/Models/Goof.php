<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Rating;

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
        return $this->hasMany(Comment::class, 'goof_id');
    }
    function tags(){
        return $this->belongsToMany(Tag::class, 'goof_has_tags')->withTimestamps();
    }
    function ratings() {
        return $this->hasMany(Rating::class, 'goof_id');
    }

    public function hasAnyTag($tags) {
        if (is_array($tags)) {
            foreach ($tags as $tag) {
                if ($this->hasTag($tag)) {
                    return true;
                }
            }
        } else {
            if ($this->hasTag($tags)) {
                return true;
            }
        }
        return false;
    }
    public function hasTag($tag) {
        if ($this->tags()->where('tagname', $tag)->first()) {
            return true;
        }
        return false;
    }

    function dispatch(){}
}

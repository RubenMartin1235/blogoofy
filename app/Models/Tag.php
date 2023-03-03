<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Goof;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tagname',
    ];

    public function goofs(){
        return $this->belongsToMany(Goof::class)->withTimestamps();
    }
}

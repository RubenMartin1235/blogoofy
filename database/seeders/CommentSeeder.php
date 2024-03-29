<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Goof;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_cena = User::where('name', 'John Cena')->first();
        $user_whoami = User::where('name', 'Whoami')->first();
        $user_gura = User::where('name', 'Gawr Gura')->first();

        $goof_cena = Goof::where('title', 'RAP DE CENA')->first();
        $goof_forgor = Goof::where('title', 'I forgor')->first();

        $comment = new Comment();
        $comment->body = '¡Absolutamente sabroCena!';
        $comment->user_id = $user_gura->id;
        $comment->goof_id = $goof_cena->id;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'i forgor the lyrics';
        $comment->user_id = $user_whoami->id;
        $comment->goof_id = $goof_cena->id;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'a';
        $comment->user_id = $user_gura->id;
        $comment->goof_id = $goof_forgor->id;
        $comment->save();

        $comment = new Comment();
        $comment->body = 'bing chilling';
        $comment->user_id = $user_cena->id;
        $comment->goof_id = $goof_forgor->id;
        $comment->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Goof;
use App\Models\Rating;

class RatingSeeder extends Seeder
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

        $rating = new Rating();
        $rating->rating = 5;
        $rating->user_id = $user_gura->id;
        $rating->goof_id = $goof_cena->id;
        $rating->save();

        $rating = new Rating();
        $rating->rating = 4;
        $rating->user_id = $user_whoami->id;
        $rating->goof_id = $goof_cena->id;
        $rating->save();
    }
}

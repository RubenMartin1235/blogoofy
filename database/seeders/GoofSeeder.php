<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Goof;

class GoofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_cena = User::where('name', 'John Cena')->first();
        $user_whoami = User::where('name', 'Whoami')->first();

        $goof = new Goof();
        $goof->title = 'RAP DE CENA';
        $goof->body = 'Cena la coCena da ceCena la veCina que aseCina la boCina en la ofiCena con piCina que faCena la calCena y la porCena que perCena la reCena de tenCena';
        $goof->user_id = $user_cena->id;
        $goof->save();

        $goof = new Goof();
        $goof->title = 'I forgor';
        $goof->body = 'I forgor what I was going to write here... 💀';
        $goof->user_id = $user_whoami->id;
        $goof->save();
    }
}

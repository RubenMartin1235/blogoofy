<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = new Tag();
        $tag->tagname = "copypasta";
        $tag->save();

        $tag = new Tag();
        $tag->tagname = "forgor";
        $tag->save();
    }
}

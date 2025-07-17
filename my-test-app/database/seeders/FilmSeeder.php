<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Film;
use App\Models\Genre;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('films')->insert([
        //     'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),

        //     'name' => Str::random(25),

        //     'published' => false,

            

        // ]);
        Film::factory()

        ->count(20)

       // ->hasGenre(2)

        ->create();

        $genres = Genre::all();

// Populate the pivot table
Film::all()->each(function ($film) use ($genres) { 
    $film->genres()->attach(
        $genres->random(rand(1, 3))->pluck('id')->toArray()
    ); 
});
        
    }
}

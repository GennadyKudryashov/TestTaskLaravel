<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('genres')->insert([
        //     'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),

        //     'name' => Str::random(25),

        
            

        // ]);

        Genre::factory()

        ->count(10)

        //->hasPosts(1)

        ->create();


    }
}

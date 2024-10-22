<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        Movie::insert([
            //Inserting movies into the database quickly for testing
            //Movie 1
            ['name' => 'Avengers', 'description' => 'Simple old avengers yknow', 'pg_rating' => '16', 'rating' => '4 stars', 'budget' => '3000', 'release_date' => '2013', 'running_time' => '164', 'image_id' => 'Avengers_Age_of_Ultron_poster.jpg', 'created_at'=> $currentTimestamp],
            //Movie 2
            ['name' => 'Avengers 2', 'description' => 'Simple old avengers 2 yknow', 'pg_rating' => '16', 'rating' => '5 stars', 'budget' => '4000', 'release_date' => '2017', 'running_time' => '162', 'image_id' => 'Avengers1.jfif', 'created_at'=> $currentTimestamp],
            //Movie 3
            ['name' => 'The lego movie', 'description' => 'A movie made out of legos but has a good story', 'pg_rating' => '10', 'rating' => '5 stars', 'budget' => '2000', 'release_date' => '2015', 'running_time' => '134', 'image_id' => 'Lego_movie.jpg', 'created_at'=> $currentTimestamp],
        ]);
    }
}

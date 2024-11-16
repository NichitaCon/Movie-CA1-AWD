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
            ['name' => 'The Avengers', 'description' => 'The Avengers assembles Earths mightiest heroes—Iron Man, Captain America, Thor, Hulk, Black Widow, and Hawkeye—to stop Loki from taking over Earth with his alien army. Its a thrilling, action-packed movie that started the MCUs shared universe.', 'pg_rating' => '13', 'rating' => '4.6', 'budget' => '220', 'release_date' => '2012', 'running_time' => '143', 'image_id' => 'Avengers_Age_of_Ultron_poster.jpg', 'created_at'=> $currentTimestamp],
            //Movie 2
            ['name' => 'Avengers: Age of Ultron', 'description' => 'Tony Starks attempt to create a peacekeeping AI goes wrong, unleashing Ultron, a rogue artificial intelligence. The Avengers reunite to stop Ultron and save humanity, leading to intense battles and new alliances.', 'pg_rating' => '13', 'rating' => '4.3', 'budget' => '365', 'release_date' => '2015', 'running_time' => '141', 'image_id' => 'Avengers1.jfif', 'created_at'=> $currentTimestamp],
            //Movie 3
            ['name' => 'The LEGO Movie', 'description' => 'The LEGO Movie follows Emmet, an ordinary LEGO minifigure who is mistaken for the prophesied "Special." With the help of a group of master builders, he embarks on an adventure to stop the evil Lord Business from controlling the LEGO universe.', 'pg_rating' => '8', 'rating' => '4.7', 'budget' => '60', 'release_date' => '2014', 'running_time' => '100', 'image_id' => 'Lego_movie.jpg', 'created_at'=> $currentTimestamp],
        ]);
    }
}

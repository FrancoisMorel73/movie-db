<?php

namespace Database\Seeders;

use App\Models\Movie;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $movies = Movie::all();

        foreach ($movies as $movie) {
            // Generate random number of reviews for each movie
            for ($i = 0; $i < rand(1, 10); $i++) {
                DB::table('reviews')->insert([
                    'user_id' => rand(1, 5),
                    'movie_id' => $movie->id,
                    'content' => $faker->text,
                    'rating' => rand(1, 5),
                    'published_date' => $faker->dateTimeThisYear,
                ]);
            }
        }
    }
}

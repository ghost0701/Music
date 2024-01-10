<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TrackFactory extends Factory
{

    public function configure(): static
    {
        return $this->afterMaking(function (Track $track) {
            // ...
        })->afterCreating(function (Track $track) {
            $track->slug = str($track->name)->slug() . '-' . $track->id;
            $track->update();
        });
    }


    public function definition(): array
    {
        $artist = Artist::inRandomOrder()->first();
        $album = Album::where('artist_id', $artist->id)->inRandomOrder()->first();
        $genre = Genre::inRandomOrder()->first();
        $name = fake()->company();
        $durability = fake()->randomFloat(2, 0, 30);
        $viewed = rand();
        $release_date = fake()->date('Y-m-d');
        $created_at = fake()->dateTimeBetween($release_date, 'now')->format('Y-m-d');
        $mp3_path = 'public/track/selim.mp3'; // Replace with your logic to generate or fetch the path
        $file_size = fake()->randomNumber(); // Replace with your logic to generate or fetch the file size

        return [
            'artist_id' => $artist->id,
            'album_id' => isset($album) ? $album->id : null,
            'genre_id' => $genre->id,
            'is_favorite' => fake()->boolean(),
            'name' => $name,
            'slug' => str($name)->slug() . rand(),
            'durability' => $durability,
            'viewed' => $viewed,
            'release_date' => $release_date,
            'mp3_path' => $mp3_path,
            'file_size' => $file_size,
            'created_at' => $created_at,
        ];
    }

}

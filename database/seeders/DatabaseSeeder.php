<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
            PlaylistSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Artist::factory(10)->create();
        \App\Models\Album::factory(15)->create();
        \App\Models\Track::factory(50)->create();
        \App\Models\Playlist::factory(10)->create();
    }
}

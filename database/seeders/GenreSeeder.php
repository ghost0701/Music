<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $genres = [
            ['name' => 'Speed Up', 'name_ru' => ''],
            ['name' => 'Slowed + Reverb', 'name_ru' => ''],
            ['name' => 'Indie Music', 'name_ru' => 'Инди-музыка
'],
            ['name' => 'Jazz', 'name_ru' => 'Джаз'],
            ['name' => 'Opera', 'name_ru' => 'Опера'],
            ['name' => 'Remix', 'name_ru' => 'Ремикс'],
            ['name' => 'Acoustic', 'name_ru' => 'Акустический'],
            ['name' => 'Rock', 'name_ru' => 'Рок'],
            ['name' => 'Rep & Hip Hop', 'name_ru' => 'Реп & хип-хоп
'],
            ['name' => 'Pop', 'name_ru' => 'Поп'],
        ];

        foreach ($genres as $genre) {
            $files = Storage::disk('public')->allFiles('genre');
            $randomFile = $files[rand(0, count($files) - 1)];

            $description = fake()->paragraph(3);

            $el = new Genre();
            $el->name = $genre['name'];
            $el->name_ru = $genre['name_ru'];
            $el->slug = str($genre['name'])->slug();
            $el->description = $description;
            $el->image = $randomFile;
            $el->save();
        }
    }
}

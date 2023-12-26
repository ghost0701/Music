<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::inRandomOrder()
            ->take(10)
            ->get();

        $artists = Artist::inRandomOrder()
            ->take(10)
            ->get();

        $albums = Album::inRandomOrder()
            ->take(10)
            ->get();

        $tracks = Track::with('artist', 'album', 'genre')
        ->inRandomOrder()
            ->get();
//        $genreTracks = [];
//
//        foreach ($genres as $genre) {
//            $genreTracks[] = [
//                'Genre' => $genre,
//                'Tracks' => Track::where('genre_id', $genre->id)
//                ->with('genre')
//                ->take(10)
//                ->get(),
//            ];
//        }

        return view('client.home.index')
            ->with([
                'genres' => $genres,
                'artists' => $artists,
                'albums' => $albums,
                'tracks' => $tracks,
            ]);
    }
}
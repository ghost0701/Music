@extends('admin.layouts.app')
@section('title')
    Admin|Tracks|Edit
@endsection

@section('main')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Edit Track</h1>
        <a href="{{ route('admin.track.index') }}" class="btn btn-secondary">Back to Track Index</a>
    </div>

    <form method="post" action="{{ route('admin.track.update', $track->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $track->name }}" required>
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <select class="form-select" id="artist" name="artist_id" required>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}" {{ $track->artist_id == $artist->id ? 'selected' : '' }}>{{ $artist->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="album" class="form-label">Album</label>
            <select class="form-select" id="album" name="album_id">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ $track->album_id == $album->id ? 'selected' : '' }}>{{ $album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" id="genre" name="genre_id" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $track->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="durability" class="form-label">Durability</label>
            <input type="text" class="form-control" id="durability" name="durability" value="{{ $track->durability }}" required>
        </div>


        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="text" class="form-control" id="release_date" name="release_date" value="{{ $track->release_date }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Track Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .svg">
        </div>

        <div class="mb-3">
            <label for="mp3_path" class="form-label">Track File</label>
            <input type="file" class="form-control" id="mp3_path" name="mp3_path" accept=".mp3, .wav, .flac">
        </div>

        <button type="submit" class="btn btn-primary">Update Track</button>
    </form>
@endsection

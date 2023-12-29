@extends('layouts/main')

@section('title', 'Playlist: ' . $playlist->Name)

@section('main')
    <a href="{{ route('playlist.index') }}">Back to playlists</a>
    
    <h1>{{ $playlist->Name }}</h1>


    @if (count($tracks) === 0)
        <p>No tracks found for the {{ $playlist->Name }} playlist.</p>
    @else
        <p>Total tracks: {{ $tracks->count() }}</p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Track</th>
                    <th>Album</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $track)
                    <tr>
                        <td>
                            {{ $track->trackName }}
                        </td>
                        <td>
                            {{ $track->albumTitle }}
                        </td>
                        <td>
                            {{ $track->artistName }}
                        </td>
                        <td>
                            {{ $track->genreName }}
                        </td>
                        <td>
                            ${{ $track->price }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

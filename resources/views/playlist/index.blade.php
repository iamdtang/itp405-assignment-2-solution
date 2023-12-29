@extends('layouts/main')

@section('title', 'Playlists')

@section('main')
    <h1>Playlists</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
                <tr>
                    <td>
                        {{ $playlist->Name }}
                    </td>
                    <td>
                        <a href="{{ route('playlist.show', [ 'id' => $playlist->PlaylistId ]) }}">
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

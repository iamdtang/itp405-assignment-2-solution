<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('playlist/index', [
            'playlists' => DB::table('playlists')->orderBy('Name')->get(),
        ]);
    }

    public function show($playlistId)
    {
        $playlist = DB::table('playlists')->where('PlaylistId', '=', $playlistId)->first();

        $tracks = DB::table('playlist_track')
            ->select([
                'tracks.Name AS trackName',
                'tracks.UnitPrice AS price',
                'albums.Title AS albumTitle',
                'artists.Name AS artistName',
                'genres.Name AS genreName',
            ])
            ->join('tracks', 'tracks.TrackId', '=', 'playlist_track.TrackId')
            ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
            ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId')
            ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
            ->where('playlist_track.PlaylistId', '=', $playlistId)
            ->orderBy('tracks.Name')
            ->get();

        return view('playlist/show', [
            'playlist' => $playlist,
            'tracks' => $tracks,
        ]);
    }
}
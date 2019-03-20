<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return response()->json($albums);
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_cover'           => 'required',
            'artist_name'           => 'required',
            'album_name'            => 'required',
            'music_style'           => 'required',
            'production_year'       => 'required',
            'label'                 => 'required',
            'songs_list'            => 'required',
            'album_average_score'   => 'required'


        ]);

        $album = Album::create($request->all());

        return response()->json([
            'message' => 'Great success! New album created',
            'album' => $album
        ]);
    }
    public function search(Request $request)
    {
      $parameter = $request->only('param');
      $param = array_first($parameter);
           //
      $albums = Album::where(function ($query) use ($param) {
            return $query->where('artist_name', 'LIKE','%' . $param . '%')
            ->orWhere('album_name', 'LIKE','%' . $param . '%');
        })
      ->get();

      // $albums_art = Album::where('artist_name', 'LIKE','%' . $param . '%')->get();
      // $albums_alb = Album::where('album_name', 'LIKE','%' . $param . '%')->get();
      // $albums = $albums_alb->concat($albums_art);
        return response()->json($albums);
    }

    public function show(Album $album)
    {
        return $album;
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
          'album_cover'           => 'nullable',
          'artist_name'           => 'nullable',
          'album_name'            => 'nullable',
          'music_style'           => 'nullable',
          'production_year'       => 'nullable',
          'label'                 => 'nullable',
          'songs_list'            => 'nullable',
          'album_average_score'   => 'nullable'
        ]);

        $album->update($request->all());

        return response()->json([
            'message' => 'Great success! Album updated',
            'album' => $album
        ]);
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json([
            'message' => 'Successfully deleted album!'
        ]);
    }

}

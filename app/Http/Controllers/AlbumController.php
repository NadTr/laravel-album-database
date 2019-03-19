<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
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

        $task = Task::create($request->all());

        return response()->json([
            'message' => 'Great success! New task created',
            'task' => $task
        ]);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
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

        $task->update($request->all());

        return response()->json([
            'message' => 'Great success! Task updated',
            'task' => $task
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ]);
    }
}

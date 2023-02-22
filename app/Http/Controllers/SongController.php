<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // check middleware in constructor
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        //
        $songs = Song::all();

        foreach ($songs as $song) {
            $album = $song->album;
            $song->album_name = $album->title;

            $user = $song->user;
            $song->user_name = $user->name;
        }

        return response()->json([
            'status' => 'success',
            'result' => $songs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongRequest $request)
    {
        //
        $song = Song::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "song Created successfully!",
            'song' => $song
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //return single song;
        $song = Song::find($song->id);
        if (!$song) {
            return response()->json([
                'message' => "song not found!"
            ], 404);
        } else {
            $album = $song->album;
            $song->album_name = $album->title;
            return response()->json([
                'song' => $song
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSongRequest  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSongRequest $request, Song $song)
    {
        // return 5;

        // dd($request->all());
        // return;
        $song->update($request->all());

        if (!$song) {
            return response()->json(['message' =>
            'song not found'], 404);
        }

        return response()->json([
            'status' => true,
            'message' => "song Updated successfully!",
            'song' => $song
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
        $song->delete();

        if (!$song) {
            return response()->json([
                'message' => 'song not found'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Article deleted successfully'
        ], 200);
    }
}

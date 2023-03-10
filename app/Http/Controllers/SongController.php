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
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            $songs = Song::with('album', 'user', 'lyrics')->get();

            return response()->json([
                'status' => 'success',
                'result' => $songs
            ]);
        } else {
            abort(403);
        }
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
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            $song = Song::create($request->all());

            return response()->json([
                'status' => true,
                'message' => "Song created successfully!",
                'song' => $song
            ], 201);
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show($song)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            $song = Song::with('album', 'user', 'lyrics')->find($song);
            if (!$song) {
                return response()->json([
                    'status' => true,
                    'message' => "song not found!"
                ], 404);
            } else {
                $album = $song->album;
                $song->album_name = $album->title;
                return response()->json([
                    'song' => $song
                ], 200);
            }
        } else {
            abort(403);
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
    public function update(StoreSongRequest $request, $song)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $song = Song::find($song);

            if (!$song) {
                return response()->json(
                    [
                        'message' => 'song not found'
                    ],
                    404
                );
            }
            $song->update($request->all());
            return response()->json([
                'status' => true,
                'message' => "song Updated successfully!",
                'song' => $song
            ], 200);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy($song)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $song = Song::find($song);

            if ($song) {
                $song->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'song deleted successfully',
                    'result' => $song
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'song not deleted',
                    'result' => $song
                ]);
            }
        } else {
            abort(403);
        }
    }
}

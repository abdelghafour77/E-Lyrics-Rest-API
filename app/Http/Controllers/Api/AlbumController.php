<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAlbumRequest;

class AlbumController extends Controller
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
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) { // return Album::all();
            // get all albums and songs associated with to each album
            $albums = Album::with('songs')->get();
            return response()->json([
                'status' => 'success',
                'result' => $albums
            ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator'])) { // return Album::all();
            $album = Album::create([
                'title' => $request->title,
                'description' => $request->description,
                'artist_id' => $request->artist_id,
                'user_id' => $request->user_id,

            ]);
            return new AlbumResource($album);
        } else {
            abort(403);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            return new AlbumResource($album);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $album->update([
                'title' => $request->title,
                'description' => $request->description,
                'artist_id' => $request->artist_id,
                'user_id' => $request->user_id,

            ]);
            return new AlbumResource($album);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($album)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $album = Album::find($album);
            if ($album) {
                $album->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'album deleted successfully',
                    'result' => $album
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'album not deleted',
                    'result' => $album
                ]);
            }
        } else {
            abort(403);
        }
    }
}

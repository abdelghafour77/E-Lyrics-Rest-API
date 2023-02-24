<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use Illuminate\Http\Request;


class ArtistController extends Controller
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
            $artists = Artist::with('user', 'albums')->get();
            return response()->json([
                'status' => 'success',
                'result' => $artists
            ]);
        } else {
            abort(403);
        }
    }
    // vhjdskqbcvse
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
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        //
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            $artist = Artist::create($request->all());
            return response()->json([
                'status' => true,
                'message' => "Artist Created successfully!",
                'artist' => $artist
            ], 201);
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($artist)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin', 'moderator', 'user'])) {
            $artist = Artist::with('albums', 'user')->find($artist);
            if (!$artist) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Artist not found'
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'result' => $artist
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, $artist)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            $artist = Artist::find($artist);
            if (!$artist) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Artist not found'
                ], 404);
            }
            $artist->update($request->all());
            return response()->json([
                'status' => 'success',
                'message' => 'Artist updated successfully',
                'result' => $artist
            ]);
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($artist)
    {
        $user = auth()->user();
        if ($user->hasAnyRole(['admin'])) {
            if (!$artist) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Artist not found'
                ], 404);
            }
            $artist->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Artist deleted successfully',
            ]);
        } else {
            abort(403);
        }
        $artist = Artist::find($artist);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

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
        // get artists and user who created the artist and albums associated with each artist
        $artists = Artist::with('user', 'albums')->get();
        return response()->json([
            'status' => 'success',
            'result' => $artists
        ]);
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
        $artist = Artist::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Artist Created successfully!",
            'artist' => $artist
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
        $artist = Artist::find($artist->id);
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
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        //
        $artist = Artist::find($artist->id);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
        $artist = Artist::find($artist->id);
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
    }
}

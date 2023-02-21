<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLyricsRequest;
use App\Http\Resources\LyricsResource;
use App\Models\Lyrics;
use Illuminate\Http\Request;

class LyricsController extends Controller
{
    // public function getLyrics()
    // {
    //     // $lyrics = Lyrics::all();
    //     return "hhhh";gu
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lyrics = Lyrics::all();
        return LyricsResource::collection($lyrics);
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
        $lyrics = Lyrics::create($request->all());

        return new LyricsResource($lyrics);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lyrics  $lyrics
     * @return \Illuminate\Http\Response
     */
    public function show(Lyrics $lyrics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lyrics  $lyrics
     * @return \Illuminate\Http\Response
     */
    public function edit(Lyrics $lyrics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lyrics  $lyrics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lyrics $lyrics)
    {
        $lyrics->update($request->all());

        return new LyricsResource($lyrics);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lyrics  $lyrics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lyrics $lyrics)
    {
        $lyrics->delete();

        return response(null, 204);
    }
}

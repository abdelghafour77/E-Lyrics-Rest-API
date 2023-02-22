<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLyricsRequest;
use App\Http\Resources\LyricsResource;
use App\Models\Lyrics;
use Illuminate\Http\Request;

use function Termwind\render;

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

    // check middleware in constructor
    public function __construct()
    {
        $this->middleware('auth:api');
    }

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
    public function update(Request $request, $lyrics)
    {
        $lyrics = Lyrics::find($lyrics);

        $lyrics->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'lyrics updated successfully',
            'result' => $lyrics
        ]);


        return new LyricsResource($lyrics);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lyrics  $lyrics
     * @return \Illuminate\Http\Response
     */
    // create function to delete lyrics and return status depending on the result
    public function destroy($lyrics)
    {
        $lyrics = Lyrics::find($lyrics);
        if ($lyrics) {
            $lyrics->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'lyrics deleted successfully',
                'result' => $lyrics
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'lyrics not deleted',
                'result' => $lyrics
            ]);
        }
    }
}

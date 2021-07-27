<?php

namespace App\Http\Controllers;

use App\Models\Disc;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Disc::with('genres')->orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $new_image_name = time() . '-' . $request->name . '.' .
        // $request->photo->extension();
        //$request->photo->move(public_path('images/users'), $new_image_name);

        $disc = new Disc;
        $disc->create([
            'name' => $request->name,
            'album' => $request->album,
            'artist' => $request->artist,
            'year' => $request->year,
            'photo' => 'hola',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function show(Disc $disc)
    {
        return $disc;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disc $disc)
    {
        $disc->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disc  $disc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disc $disc)
    {
        $disc->delete();
    }


    public function search(Request $request)
    {
        $filter = $request->buscador;
        $discs = Disc::filterByNameAlbumArtist($filter)
                    ->get();

        return $discs;
    }
}

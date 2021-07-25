<?php

namespace App\Http\Controllers;

use App\Models\Disc;
use Illuminate\Http\Request;

class DiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Disc::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disc = new Disc;
        $disc->create($request->all());
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
        //
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
}

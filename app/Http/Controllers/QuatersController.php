<?php

namespace App\Http\Controllers;

use App\quaters;
use Illuminate\Http\Request;

class QuatersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        quaters::create(array(

        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quaters  $quaters
     * @return \Illuminate\Http\Response
     */
    public function show(quaters $quaters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quaters  $quaters
     * @return \Illuminate\Http\Response
     */
    public function edit(quaters $quaters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quaters  $quaters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quaters $quaters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quaters  $quaters
     * @return \Illuminate\Http\Response
     */
    public function destroy(quaters $quaters)
    {
        //
    }
}

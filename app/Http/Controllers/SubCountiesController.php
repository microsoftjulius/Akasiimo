<?php

namespace App\Http\Controllers;

use App\sub_counties;
use Illuminate\Http\Request;

class SubCountiesController extends Controller
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
        sub_counties::create(array(

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
     * @param  \App\sub_counties  $sub_counties
     * @return \Illuminate\Http\Response
     */
    public function show(sub_counties $sub_counties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sub_counties  $sub_counties
     * @return \Illuminate\Http\Response
     */
    public function edit(sub_counties $sub_counties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sub_counties  $sub_counties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sub_counties $sub_counties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sub_counties  $sub_counties
     * @return \Illuminate\Http\Response
     */
    public function destroy(sub_counties $sub_counties)
    {
        //
    }
}

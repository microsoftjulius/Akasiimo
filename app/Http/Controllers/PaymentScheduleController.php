<?php

namespace App\Http\Controllers;

use App\payment_schedule;
use Illuminate\Http\Request;

class PaymentScheduleController extends Controller
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
        payment_schedule::create(array(

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
     * @param  \App\payment_schedule  $payment_schedule
     * @return \Illuminate\Http\Response
     */
    public function show(payment_schedule $payment_schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment_schedule  $payment_schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(payment_schedule $payment_schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment_schedule  $payment_schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment_schedule $payment_schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment_schedule  $payment_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment_schedule $payment_schedule)
    {
        //
    }
}

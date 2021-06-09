<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('feedbacks.index');
    }

    public function indexAll()
    {
        $datas = Feedbacks::all();
        return view('feedbacks.indexAll', compact('datas'));
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
        Feedbacks::create($request->all());
        return redirect()->route('viewSaran')->with('success', 'Saran atau Keluhan anda berhasil dibuat. terimakasih');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function show(Feedbacks $feedbacks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedbacks $feedbacks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedbacks $feedbacks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedbacks  $feedbacks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedbacks $feedbacks)
    {
        //
    }
}

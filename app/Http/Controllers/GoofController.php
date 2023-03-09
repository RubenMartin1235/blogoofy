<?php

namespace App\Http\Controllers;

use App\Models\Goof;
use Illuminate\Http\Request;

class GoofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('goofs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string|max:255',
        ]);

        $request->user()->pios()->create($validated);

        return redirect(route('goofs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Goof $goof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goof $goof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goof $goof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goof $goof)
    {
        //
    }
}

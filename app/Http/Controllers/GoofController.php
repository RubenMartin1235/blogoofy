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
        $goofs = Goof::all();
        return view('goofs.index', compact('goofs'));
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

        $request->user()->goofs()->create($validated);

        return redirect(route('goofs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Goof $goof)
    {
        return view('goofs.show',
            ['goof'=>$goof]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goof $goof)
    {
        return view('goofs.edit',
            ['goof'=>$goof]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goof $goof)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string|max:255',
        ]);

        $request->user()->goofs()->update($validated);

        return redirect(route('goofs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goof $goof)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Goof;
use Illuminate\Http\Request;
use Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Goof $goof)
    {
        if (Auth::user() == $goof->user) {
            return redirect(route('goofs.show', $goof));
        }
        $validated=$request->validate([
            'rating'=>'required|integer|max:5',
        ]);
        $rating_old = $goof->ratings()->where('user_id',Auth::user()->id)->first();
        if ($rating_old !== null) {
            return $this->update($request, $rating_old);
        }
        //dd($rating_old);
        //dd($request->input('rating-score'));
        //dd($validated);

        $rating = Rating::make($validated);
        $rating->goof()->associate($goof);
        $rating->user()->associate($request->user());
        $rating->save();

        return $this->redirectToOriginalGoof($rating);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        if (Auth::user() <> $rating->user || Auth::user() == $rating->goof->user) {
            return $this->redirectToOriginalGoof($rating);
        }
        $rating->save();
        $validated=$request->validate([
            'rating'=>'required|integer|max:5',
        ]);
        $rating->update($validated);
        return $this->redirectToOriginalGoof($rating);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }

    function redirectToOriginalGoof(Rating $rating) {
        return redirect(route('goofs.show', $rating->goof));
    }
}

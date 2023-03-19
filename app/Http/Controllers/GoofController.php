<?php

namespace App\Http\Controllers;

use App\Models\Goof;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class GoofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $goofs;
        $searchtags_arrstr = false;
        if (strlen(trim($request->get('searchtags'))) > 0) {
            $searchtags_arrstr = array_map('trim', explode(',', $request->get('searchtags')));
        }
        if ($searchtags_arrstr) {
            $searchtags = Tag::whereIn('tagname',$searchtags_arrstr)->pluck('id');
            //$goofs = Goof::with(['tags'])->whereIn('goof_has_tags.tag_id', $searchtags);
            $goofs = Goof::orWhereHas('tags', function ($query) use ($searchtags) {
                $query->whereIn('tag_id', $searchtags);
            })->get();
            //dd($searchtags);
            //dd($goofs);
        } else {
            $goofs = Goof::all()->sortByDesc('created_at');
        }

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
    public function show(Request $request, Goof $goof)
    {
        $comments = $goof->comments()->get()->sortByDesc('created_at');
        $tags = $goof->tags;
        $user_rating = $goof->ratings()->where('user_id',Auth::user()->id)->first();
        return view('goofs.show',
            [
                'goof'=>$goof,
                'comments'=>$comments,
                'user_rating'=>$user_rating,
                'tags'=>$tags,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goof $goof)
    {
        if (Auth::user() <> $goof->user) {
            return redirect(route('goofs.index'));
        }
        return view('goofs.edit',
            ['goof'=>$goof]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goof $goof)
    {
        if (Auth::user() <> $goof->user) {
            return redirect(route('goofs.index'));
        }

        $goof->save();

        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'body'=>'required|string|max:255',
        ]);

        $goof->update($validated);

        return redirect(route('goofs.index'));
    }

    public function delete(Goof $goof)
    {
        if (Auth::user() <> $goof->user) {
            return redirect(route('goofs.index'));
        }
        return view('goofs.delete',
            ['goof'=>$goof]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goof $goof)
    {
        if (Auth::user() == $goof->user) {
            $goof->delete();
        }
        return redirect(route('goofs.index'));
    }
}

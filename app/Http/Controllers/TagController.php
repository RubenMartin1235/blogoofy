<?php

namespace App\Http\Controllers;

use App\Models\Goof;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for attaching a tag to a goof.
     */
    public function add(Goof $goof)
    {
        if (!Auth::user()->hasAnyRole(['loader','admin'])) {
            return redirect(route('goofs.show', $goof));
        }
        $tags = $goof->tags;
        //dd($tags);
        $tagnames = $tags->pluck('tagname')->all();
        return view('tags.add',
            [
                'goof'=>$goof,
                'tags'=>$tags,
                'tagnames'=>implode(',',$tagnames),
            ]
        );
    }

    public function attach(Request $request, Goof $goof)
    {
        if (!Auth::user()->hasAnyRole(['loader','admin'])) {
            return redirect(route('goofs.show', $goof));
        }
        //dd($goof->tags);
        $tagnames_new = array_map('trim', explode(',', $request->get('tagnames')));
        $tagnames_deleted = $goof->tags()->whereNotIn('tagname',$tagnames_new)->pluck('tag_id');
        //$tags_detached = Tag::whereIn('tagname',$tagnames_deleted)->get();
        //dd($tagnames_deleted);
        $goof->tags()->detach($tagnames_deleted);
        foreach ($tagnames_new as $ntag_name) {
            $ntag = Tag::where('tagname',$ntag_name)->first();
            if ($ntag === null) {
                $ntag = $this->crtag($request, $ntag_name);
            }
            if ($goof->tags()->where('tagname', $ntag_name)->first() === null) {
                $goof->tags()->attach($ntag);
            }
        }
        return redirect(route('goofs.show', $goof));
        // I'm not sure how much longer this pyrrhic battle can go on for.
    }

    function crtag(Request $request, $tagname)
    {
        $request->merge(['tagname'=>$tagname]);
        //dd($request->input());
        $validated=$request->validate([
            'tagname'=>'required|string|max:255',
        ]);
        $tag = Tag::make($validated);
        $tag->save();
        return $tag;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'tagname'=>'required|string|max:255',
        ]);
        $tag = Tag::make($validated);
        $tag->save();
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $goofs = $tag->goofs()->get()->sortByDesc('created_at');
        return view('goofs.index', compact('goofs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}

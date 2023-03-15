<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Goof;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $validated=$request->validate([
            'body'=>'required|string|max:255',
        ]);
        $comment = Comment::make($validated);
        $comment->goof()->associate($goof);
        $comment->user()->associate($request->user());
        $comment->save();

        return redirect(route('goofs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show',
            [
                'comment'=>$comment,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Goof;
use Illuminate\Http\Request;
use Auth;

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

        return $this->redirectToOriginOfComment($comment);
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
        if (Auth::user() <> $comment->user) {
            return redirect(route('goofs.show', $comment->goof()));
        }
        return view('comments.edit',
            ['comment'=>$comment]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if (Auth::user() <> $comment->user) {
            return $this->redirectToOriginOfComment($comment);
        }

        $comment->save();
        $validated=$request->validate([
            'body'=>'required|string|max:255',
        ]);
        $comment->update($validated);
        return $this->redirectToOriginOfComment($comment);
    }

    /**
     * Show the form for removing the specified resource from storage.
     */
    public function delete(Comment $comment)
    {
        if (Auth::user() <> $comment->user) {
            return $this->redirectToOriginOfComment($comment);
        }
        return view('comments.delete',
            ['comment'=>$comment]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        if (Auth::user() == $comment->user) {
            $comment->delete();
        }
        return $this->redirectToOriginOfComment($comment);
    }

    function redirectToOriginOfComment(Comment $comment) {
        return redirect(route('goofs.show', $comment->goof));
    }
}

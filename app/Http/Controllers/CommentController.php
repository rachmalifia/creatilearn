<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Subject;
use App\Models\Group;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $validatedData = $request->all();
        $validatedData['user_id'] = auth()->user()->id;

        Comment::create($validatedData);

        return back();
    }

    public function save(string $id, Request $request)
    {
        // dd($id);
        $rules = [
            'likes' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Comment::where('id', $id)->update($validatedData);

        return back();
    }

    // public function save($comment_id, $likes)
    // {

    //     $comment = Comment::find($comment_id);
    //     $co
    //     $comment->likes = $likes;
    //     $comment->save();

    //     // dd($comment);
    //     // Comment::where('id', $comment_id)->update(
    //     //     ['likes' => $likes]
    //     // );

    //     // return back();
    // }
}

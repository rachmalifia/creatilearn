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

        $discussion = Discussion::where('id', $request->discussion_id)->first();
        $subject = Subject::where('id', $discussion->subject_id)->first();

        $validatedData = $request->all();
        $validatedData['user_id'] = auth()->user()->id;

        // dd($request->all());
        Comment::create($validatedData);
        return redirect('/discussion' . '/' . $subject->slug . '/' . $discussion->id . '/idea');
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
}

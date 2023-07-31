<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Discussion;
use App\Models\Subject;
use App\Models\Group;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {


        // $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();
        // $group = Group::select('id', 'name', 'member', 'group_id')->where('group_id', $groupId)->first();

        // return view('discuss.teacher.showDiscussion', [
        //     'subject' => $subject,
        //     'group' => $group,
        //     'discussions' => Discussion::where('subject_id', $subject->id)->where('group_id', $group->id)->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug, string $groupId)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();
        $subjects = Subject::select('id', 'title', 'course_id')->where('course_id', $course->id)->get();
        $group = Group::select('id', 'name')->where('id', $groupId)->first();

        return view('discuss.teacher.createDiscussion', [
            'course' => $course,
            'subjects' => $subjects,
            'group' => $group
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $rules = [
            'subject_id' => 'required',
            'group_id' => 'required',
            'case_study' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Discussion::create($validatedData);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Forum diskusi baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, string $discussionId)
    {
        // dd($slug);
        $course = Course::where('slug', $slug)->first();
        $subject = Subject::where('course_id', $course->id)->first();

        $discussion = Discussion::select('id', 'group_id',  'case_study', 'project_result')->where('id', $discussionId)->first();



        return view('discuss.showDiscussion', [
            'discussion' => $discussion,
            'course' => $course,
            'subject' => $subject,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, Discussion $discussion)
    {

        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();
        $subjects = Subject::select('id', 'title', 'course_id')->where('course_id', $course->id)->get();
        $discussionGroup = Discussion::join('groups', 'groups.id', '=', 'discussions.group_id')->select('discussions.id', 'group_id',  'case_study', 'discussions.subject_id', 'groups.name')->first();

        return view('discuss.teacher.editDiscussion', [
            'course' => $course,
            'subjects' => $subjects,
            'discussion' => $discussion,
            'discussionGroup' => $discussionGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug, Request $request, Discussion $discussion)
    {
        $course = Course::where('slug', $slug)->first();

        $rules = [
            'subject_id' => 'required',
            'group_id' => 'required',
            'case_study' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Discussion::where('id', $discussion->id)->update($validatedData);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Data forum diskusi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, Discussion $discussion)
    {
        $course = Course::where('slug', $slug)->first();

        Discussion::destroy($discussion->id);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Data forum diskusi berhasil dihapus!');
    }

    public function showDiscussion(string $slug, string $discussionId)
    {
        $subject = Subject::where('slug', $slug)->first();

        $discussion = Discussion::select('id', 'group_id',  'case_study', 'project_result')->where('id', $discussionId)->first();


        $course = Course::where('id', $subject->course_id)->first();

        return view('discuss.showDiscussion', [
            'discussion' => $discussion,
            'course' => $course,
            'subject' => $subject,
        ]);

        // $comments = Comment::where('discussion_id', $discussion->id)->get();

        // dd($discussion);
        // $discussion = Discussion::join('groups', 'groups.id', '=', 'discussions.group_id')->join('subjects', 'subjects.id', '=', 'discussions.subject_id')->select('discussions.id', 'group_id',  'case_study', 'project_result', 'discussions.subject_id', 'subjects.id', 'groups.id', 'groups.name', 'groups.member', 'groups.course_id')->where('discussions.subject_id', $subject->id)->where('discussions.group_id', $groupId)->get();
    }

    public function addProjectResult(string $slug, Request $request,  Discussion $discussion)
    {
        $subject = Subject::where('slug', $slug)->first();
        // dd($slug);
        $course = Course::where('id', $subject->course_id)->first();

        $rules = [
            'subject_id' => 'required',
            'group_id' => 'required',
            'case_study' => 'required',
            'project_result' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Discussion::where('id', $discussion->id)->update($validatedData);

        return redirect('/course' . '/' . $course->slug)->with('success', 'Hasil pengerjaan kelompok berhasil terkumpulkan!');
    }



    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $posts = Post::all();

    //     return view('posts.index', compact('posts'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('posts.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'=>'required',
    //         'body'=>'required',
    //     ]);

    //     Post::create($request->all());

    //     return redirect()->route('posts.index');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     return view('posts.show', compact('post'));
    // }
}

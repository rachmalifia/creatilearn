<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Discussion;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $subjects = Subject::select('id', 'title', 'slug', 'course_id')->where('course_id', $course->id)->get();

        $discussions = Discussion::join('groups', 'groups.id', '=', 'discussions.group_id')->join('subjects', 'subjects.id', '=', 'discussions.subject_id')->select('discussions.id', 'group_id',  'case_study', 'project_result', 'discussions.subject_id', 'subjects.title', 'groups.name', 'groups.member', 'groups.course_id')->get();

        // dd($discussions);
        return view('discuss.teacher.showGroupList', [
            'course' => $course,
            'groups' => Group::where('course_id', $course->id)->get(),
            'subjects' => $subjects,
            'discussions' => $discussions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug)
    {
        $course = Course::where('slug', $slug)->first();

        return view('discuss.teacher.createGroup', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $rules = [
            'course_id' => 'required',
            'name' => 'required',
            'member' => ''
        ];

        $validatedData = $request->validate($rules);

        Group::create($validatedData);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Kelompok baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, Group $group)
    {
        $course = Course::where('slug', $slug)->first();

        return view('discuss.teacher.editGroup', [
            'course' => $course,
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug, Request $request, Group $group)
    {
        $course = Course::where('slug', $slug)->first();

        $rules = [
            'course_id' => 'required',
            'name' => 'required',
            'member' => ''
        ];

        $validatedData = $request->validate($rules);

        Group::where('id', $group->id)->update($validatedData);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Data kelompok berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, Group $group)
    {
        $course = Course::where('slug', $slug)->first();

        Group::destroy($group->id);

        return redirect('/student-group' . '/' . $course->slug)->with('success', 'Data kelompok berhasil dihapus!');
    }

    public function showGroupswithCourse()
    {
        return view('discuss.teacher.index', [
            'courses' => Course::select('id', 'title', 'slug')->get(),
        ]);
    }

    public function showGroupsToStudent(string $courseSlug, string $subjectSlug)
    {
        $course = Course::select('id', 'slug', 'title')->where('slug', $courseSlug)->first();
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $subjectSlug)->first();


        $groups = Discussion::join('groups', 'groups.id', '=', 'discussions.group_id')->select('discussions.id', 'group_id', 'discussions.subject_id', 'groups.name', 'groups.member')->where('discussions.subject_id', $subject->id)->get();

        // dd($groups);

        return view('discuss.student.showGroupList', [
            'groups' => $groups,
            'subject' => $subject,
            'courseSlug' => $courseSlug
        ]);
    }
}

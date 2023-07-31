<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('subjects.index', [
            'title' => 'Daftar Materi',
            'course' => $course,
            'subjects' => Subject::where('course_id', $course->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('subjects.create', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        if (!Str::contains($request->url_video, 'embed')) {
            $url_video = substr($request->url_video, 17);
            $url_video = "https://www.youtube.com/embed/" . $url_video;
            $request['url_video'] = $url_video;
        }

        if (Str::contains($request->url_pdf, 'view?usp=sharing')) {
            $url_pdf = substr($request->url_pdf, 0, -16);
            $url_pdf = $url_pdf . "preview";
            $request['url_pdf'] = $url_pdf;
        }

        $rules = [
            'course_id' => 'required',
            'title' => 'required|max:100',
            'slug' => 'required|unique:subjects',
            'highlight' => 'required',
            'url_video' => 'required',
            'url_pdf' => ''
        ];

        $validatedData = $request->validate($rules);
        Subject::create($validatedData);

        return redirect('/' . $course->slug . '/subjects')->with('success', 'Materi baru berhasil ditambahkan dalam mata pelajaran ' . $course->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $a, Subject $subject)
    {
        $course = Course::select('id', 'title', 'slug')->where('id', $subject->course_id)->first();

        return view('dashboard.subjects.show', [
            'subject' => $subject,
            'course' => $course,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, Subject $subject)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('subjects.edit', [
            'title' => 'Edit Materi',
            'subject' => $subject,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug, Request $request, Subject $subject)
    {
        // dd($request);
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        if (!Str::contains($request->url_video, 'embed')) {
            $url_video = substr($request->url_video, 17);
            $url_video = "https://www.youtube.com/embed/" . $url_video;
            $request['url_video'] = $url_video;
        }

        if (Str::contains($request->url_pdf, 'view?usp=sharing')) {
            $url_pdf = substr($request->url_pdf, 0, -16);
            $url_pdf = $url_pdf . "preview";
            $request['url_pdf'] = $url_pdf;
        }

        $rules = [
            'course_id' => 'required',
            'title' => 'required|max:100',
            'slug' => 'required',
            'highlight' => 'required',
            'url_video' => 'required',
            'url_pdf' => ''
        ];

        if ($request->slug != $subject->slug) {
            $rules['slug'] = 'required|unique:subjects';
        }
        $validatedData = $request->validate($rules);

        Subject::where('id', $subject->id)->update($validatedData);

        return redirect('/' . $course->slug . '/subjects')->with('success', 'Data materi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, Subject $subject)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        Subject::destroy($subject->id);

        return redirect('/' . $course->slug . '/subjects')->with('success', 'Data materi berhasil dihapus!');
    }


    /**
     * Dashboard Subject for Student
     */
    public function subjectListStudent(string $slug)
    {
        $course = Course::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('dashboard.subjects.index', [
            'title' => 'Daftar Materi',
            'course' => $course,
            'subjects' => Subject::where('course_id', $course->id)->get(),

        ]);
    }

    // Show Subject Detail for Student
    public function showDetail(Subject $subject)
    {
        $course = Course::select('id', 'title', 'slug')->where('id', $subject->course_id)->first();

        $matchThese = ['code' => 'quiz', 'subject_id' => $subject->id, 'user_id' => auth()->user()->id];

        $result = Result::where($matchThese)->first();

        // dd($result == null);

        return view('dashboard.subjects.show', [
            'result' => $result,
            'subject' => $subject,
            'course' => $course
        ]);
    }

    // Check Slug Function
    public function checkSubjectSlug(Request $request)
    {
        $slug = SlugService::createSlug(Subject::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}

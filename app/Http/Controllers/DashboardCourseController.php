<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index', [
            'title' => 'Daftar Pelajaran',
            'courses' => Course::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create', [
            'title' => 'Pelajaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'slug' => 'required|unique:courses',
            'grade' => 'required'
        ]);

        Course::create($validatedData);

        return redirect('/dashboard/courses')->with('success', 'Mata pelajaran baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'title' => 'Edit Pelajaran',
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            'title' => 'required|max:50',
            'slug' => 'required',
            'grade' => 'required'
        ];

        if ($request->slug != $course->slug) {
            $rules['slug'] = 'required|unique:courses';
        }

        $validatedData = $request->validate($rules);

        Course::where('id', $course->id)->update($validatedData);

        return redirect('/dashboard/courses')->with('success', 'Data mata pelajaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect('/dashboard/courses')->with('success', 'Data mata pelajaran berhasil dihapus!');
    }

    // Check Slug Function
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Course::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    // Show ALL COURSES to TEACHERS and STUDENTS
    public function showAllCourses()
    {
        return view('dashboard.index', [
            'title' => 'Semua Pelajaran',
            'courses' => Course::all()
        ]);
    }
}

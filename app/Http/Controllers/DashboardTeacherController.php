<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.teachers.index', [
            'title' => 'Data Guru',
            'teachers' => User::where('type', 1)->get()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $teacher)
    {
        return view('users.teachers.edit', [
            'title' => 'Edit Data Guru',
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $teacher)
    {
        $rules = [
            'name' => 'required|max:25',
            'username' => 'required',
            'email' => 'required|email:dns'
        ];

        if ($request->username != $teacher->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $teacher->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $teacher->id)->update($validatedData);

        return redirect('/dashboard/teachers')->with('success', 'Data guru berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $teacher)
    {
        User::destroy($teacher->id);
        return redirect('/dashboard/teachers')->with('success', 'Data guru berhasil dihapus!');
    }
}

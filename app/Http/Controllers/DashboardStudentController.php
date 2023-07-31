<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.students.index', [
            'title' => 'Data Siswa',
            'students' => User::where('type', 2)->get()
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
    public function edit(User $student)
    {
        return view('users.students.edit', [
            'title' => 'Edit Data Guru',
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $student)
    {
        $rules = [
            'name' => 'required|max:25',
            'username' => 'required',
            'email' => 'required|email:dns'
        ];

        if ($request->username != $student->username) {
            $rules['username'] = 'required|unique:users';
        }

        if ($request->email != $student->email) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        User::where('id', $student->id)->update($validatedData);

        return redirect('/dashboard/students')->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        User::destroy($student->id);
        return redirect('/dashboard/students')->with('success', 'Data siswa berhasil dihapus!');
    }
}

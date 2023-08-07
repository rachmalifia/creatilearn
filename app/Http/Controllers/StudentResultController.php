<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question;
use App\Models\Result;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $subject = Subject::select('id', 'title', 'slug', 'course_id')->where('slug', $slug)->first();

        $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

        $quiz = Result::select('id', 'code', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'quiz')->first();
        $pretest = Result::select('id', 'code', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'pretest')->first();
        $posttest = Result::select('id', 'code', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'posttest')->first();


        return view('results.student.index', [
            'subject' => $subject,
            'course' => $course,
            'pretest' => $pretest,
            'quiz' => $quiz,
            'posttest' => $posttest,
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
    public function store(Request $request, string $slug, string $code)
    {
        $subject = Subject::select('id', 'title', 'slug', 'course_id')->where('slug', $slug)->first();

        $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

        // dd($course->slug);

        $matchThese = ['code' => $code, 'subject_id' => $subject->id];

        $questions = Question::select('id', 'subject_id', 'code', 'answer_key', 'point')->where($matchThese)->get();
        $total = 0;

        $i = 0;
        foreach ($questions as $question) {
            if ($request['no' . $i + 1] == $question->answer_key) {
                $total = $total + $question->point;
            }
            $i++;
        }

        $jumlahSoal = $i;
        $total = round(($total / $jumlahSoal) * 100.00, 2);
        $request['user_id'] = auth()->user()->id;
        $request['score'] = $total;


        Result::create($request->all());

        $type = "";
        if ($questions[0]->code == 'quiz') {
            $type = "kuis";
        } else {
            $type = "ujian";
        }

        return redirect('/course' . '/' . $course->slug)->with('success', 'Terima kasih! Anda telah menyelesaikan ' . $type);;
        // return redirect('/subject' . '/' . $subject->slug);
    }

    // public function storeOld(Request $request, string $slug, string $code)
    // {
    //     $subject = Subject::select('id', 'slug', 'course_id')->where('slug', $slug)->first();
    //     $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

    //     $matchThese = ['code' => $code, 'subject_id' => $subject->id];

    //     $questions = Question::select('id', 'subject_id', 'code', 'key_answer', 'point')->where($matchThese)->get();
    //     $total = 0;

    //     $i = 0;
    //     foreach ($questions as $question) {
    //         if ($request['no' . $i + 1] == $question->key_answer) {
    //             $total = $total + $question->point;
    //             $i++;
    //         }
    //     }

    //     $request['user_id'] = auth()->user()->id;
    //     $request['score'] = $total;
    //     // dd($request->all());

    //     Result::create($request->all());

    //     return redirect('/course' . '/' . $course->slug);
    // }

    // public function storePretest(Request $request, string $slug)
    // {
    //     $subject = Subject::select('id', 'slug', 'course_id')->where('slug', $slug)->first();
    //     $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

    //     $matchThese = ['code' => 'pretest', 'subject_id' => $subject->id];

    //     $questions = Question::select('id', 'subject_id', 'code', 'key_answer', 'point')->where($matchThese)->get();
    //     $total = 0;


    //     $i = 0;
    //     foreach ($questions as $question) {
    //         if ($request['no' . $i + 1] == $question->key_answer) {
    //             $total = $total + $question->point;
    //             $i++;
    //         }
    //     }


    //     $request['user_id'] = auth()->user()->id;
    //     $request['score'] = $total;

    //     // dd($request->all());

    //     Result::create($request->all());

    //     return redirect('/course' . '/' . $course->slug);
    // }

    // public function storePosttest(Request $request, string $slug)
    // {
    //     $subject = Subject::select('id', 'slug', 'course_id')->where('slug', $slug)->first();
    //     $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

    //     $matchThese = ['code' => 'posttest', 'subject_id' => $subject->id];

    //     $questions = Question::select('id', 'subject_id', 'code', 'key_answer', 'point')->where($matchThese)->get();
    //     $total = 0;


    //     $i = 0;
    //     foreach ($questions as $question) {
    //         if ($request['no' . $i + 1] == $question->key_answer) {
    //             $total = $total + $question->point;
    //             $i++;
    //         }
    //     }


    //     $request['user_id'] = auth()->user()->id;
    //     $request['score'] = $total;

    //     // dd($request->all());

    //     Result::create($request->all());

    //     return redirect('/course' . '/' . $course->slug);
    // }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }

    public function showCourseListsWithSubjects()
    {
        return view('results.teacher.index', [
            'courses' => Course::select('id', 'title', 'slug')->get(),
            'subjects' => Subject::all(),

        ]);
    }

    public function showResultAllStudents(string $slug)
    {

        $subject = Subject::select('id', 'title', 'slug', 'course_id')->where('slug', $slug)->first();

        $course = Course::select('id', 'title')->where('id', $subject->course_id)->first();

        $quiz = Result::join('users', 'users.id', '=', 'results.user_id')->select('results.id', 'code', 'user_id', 'users.name', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'quiz')->orderBy('score', 'DESC')->get();

        $pretest = Result::join('users', 'users.id', '=', 'results.user_id')->select('results.id', 'code', 'user_id', 'users.name', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'pretest')->orderBy('score', 'DESC')->get();

        $posttest = Result::join('users', 'users.id', '=', 'results.user_id')->select('results.id', 'code', 'user_id', 'users.name', 'subject_id', 'score')->where('subject_id', $subject->id)->where('code', 'posttest')->orderBy('score', 'DESC')->get();


        return view('results.teacher.showResultList', [
            'subject' => $subject,
            'course' => $course,
            'pretestResults' => $pretest,
            'quizResults' => $quiz,
            'posttestResults' => $posttest,
        ]);
    }
}

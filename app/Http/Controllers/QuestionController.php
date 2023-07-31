<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $matchQuiz = ['code' => 'quiz', 'subject_id' => $subject->id];

        return view('questions.show', [
            'quizzes' => Question::where($matchQuiz)->get(),
            'exams' => Question::where('code', 'like', '%test')->where('subject_id', $subject->id)->get(),
            'subject' => $subject
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('questions.create', [
            'subject' => $subject,
            'codes' => [
                1 => [
                    "key" => "quiz",
                    "name" => "Kuis"
                ],
                2 => [
                    "key" => "pretest",
                    "name" => "Ujian Awal"
                ],
                3 => [
                    "key" => "posttest",
                    "name" => "Ujian Akhir"
                ]
            ],
            'answer_keys' => [
                1 => [
                    "key" => "a",
                    "name" => "A"
                ],
                2 => [
                    "key" => "b",
                    "name" => "B"
                ],
                3 => [
                    "key" => "c",
                    "name" => "C"
                ],
                4 => [
                    "key" => "d",
                    "name" => "D"
                ],
                5 => [
                    "key" => "e",
                    "name" => "E"
                ]
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  string $slug)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        // dd($request);
        $rules = [
            'subject_id' => 'required',
            'code' => 'required',
            'question' => 'required|max:200',
            'img_question' => 'image|file|max:1024',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'answer_key' => 'required',
            'point' => 'required'
        ];


        $validatedData = $request->validate($rules);

        if ($request->file('img_question')) {
            $validatedData['img_question'] = $request->file('img_question')->store('question-images');
        }
        Question::create($validatedData);

        $jenisSoal = "";
        if ($request->code == "quiz") {
            $jenisSoal = "Kuis";
        } else {
            $jenisSoal = "Ujian";
        }

        return redirect('/questions' . '/' . $subject->slug)->with('success', 'Satu Soal ' . $jenisSoal . ' berhasil ditambahkan dalam materi ' . $subject->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Question $question)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('questions.showDetail', [
            'title' => 'Kuis',
            'question' => $question,
            'subject' => $subject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, Question $question)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        return view('questions.edit', [
            'title' => 'Kuis',
            'question' => $question,
            'subject' => $subject,
            'codes' => [
                1 => [
                    "key" => "quiz",
                    "name" => "Kuis"
                ],
                2 => [
                    "key" => "pretest",
                    "name" => "Ujian Awal"
                ],
                3 => [
                    "key" => "posttest",
                    "name" => "Ujian Akhir"
                ]
            ],
            'answer_keys' => [
                1 => [
                    "key" => "a",
                    "name" => "A"
                ],
                2 => [
                    "key" => "b",
                    "name" => "B"
                ],
                3 => [
                    "key" => "c",
                    "name" => "C"
                ],
                4 => [
                    "key" => "d",
                    "name" => "D"
                ],
                5 => [
                    "key" => "e",
                    "name" => "E"
                ]
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $slug, Request $request, Question $question)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $rules = [
            'subject_id' => 'required',
            'code' => 'required',
            'question' => 'required|max:200',
            'img_question' => 'image|file|max:1024',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'answer_key' => 'required',
            'point' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('img_question')) {
            $validatedData['img_question'] = $request->file('img_question')->store('question-images');
        }

        Question::where('id', $question->id)->update($validatedData);


        return redirect('/questions' . '/' . $subject->slug)->with('success', 'Satu data soal berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug, Question $question)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        Question::destroy($question->id);

        $jenisSoal = "";
        if ($subject->code == "quiz") {
            $jenisSoal = "kuis";
        } else {
            $jenisSoal = "ujian";
        }

        return redirect('/questions' . '/' . $subject->slug)->with('success', 'Satu data soal ' . $jenisSoal . ' berhasil dihapus!');
    }

    public function showCourseListsWithSubjects()
    {

        return view('questions.index', [
            'courses' => Course::select('id', 'title', 'slug')->get(),
            'subjects' => Subject::all(),

        ]);
    }

    // Confirmation before take a test
    public function showConfirmation(string $slug, string $code)
    {
        $subject = Subject::select('id', 'slug', 'course_id')->where('slug', $slug)->first();

        $course = Course::select('id', 'slug')->where('id', $subject->course_id)->first();

        $matchCode = ['code' => $code, 'subject_id' => $subject->id, 'user_id' => auth()->user()->id];
        // $matchPosttest = ['code' => 'posttest', 'subjects_id' => $subject->id, 'user_id' => auth()->user()->id];

        // $pretestResult = Result::where($matchCode)->first();
        $examResult = Result::where($matchCode)->first();
        // $posttestResult = Result::where($matchPosttest)->first();

        $matchThese = ['code' => $code, 'subject_id' => $subject->id];
        $questions = Question::where($matchThese)->get();

        return view('questions.dashboard.confirmationTest', [
            'subject' => $subject,
            'course' => $course,
            'questions' => $questions,
            'examResult' => $examResult,
            // 'posttestResult' => $posttestResult
        ]);
    }

    // Display for student to take an exam
    public function showQuestionList(string $slug, string $code)
    {
        $subject = Subject::select('id', 'title', 'slug')->where('slug', $slug)->first();

        $matchThese = ['code' => $code, 'subject_id' => $subject->id];

        return view('questions.dashboard.showQuestionList', [
            'subject' => $subject,
            'questions' => Question::where($matchThese)->get()
        ]);
    }
}

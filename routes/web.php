<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardTeacherController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main', [
        'title' => ''
    ]);
})->middleware('guest');

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


// batas suci

/*
    All Users Routes List
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'show']);
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit']);
    Route::put('/profile/{user}', [ProfileController::class, 'update']);
});


/*
    All Admin Users Routes List
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Route untuk CRUD Course Admin
    Route::resource('/dashboard/courses', DashboardCourseController::class)->except('show');
    Route::get('/dashboard/courses/checkSlug', [DashboardCourseController::class, 'checkSlug']);

    // Route untuk CRUD Teacher Admin
    Route::resource('/dashboard/teachers', DashboardTeacherController::class)->except('show');
});


/*
    All Teacher Users Routes List
*/
Route::middleware(['auth', 'user-access:teacher'])->group(function () {
    // Route untuk dashboard Guru setelah berhasil login
    Route::get('/course-list', [DashboardCourseController::class, 'showAllCourses']);

    // Route untuk CRUD Subject Guru
    Route::get('/subjects/checkSubjectSlug', [SubjectController::class, 'checkSubjectSlug']);
    Route::resource('/{course}/subjects', SubjectController::class);

    // Route untuk CRUD Student Guru
    Route::resource('/dashboard/students', DashboardStudentController::class);

    // Route untuk CRUD Question Guru
    Route::get('/dashboard/questions', [QuestionController::class, 'showCourseListsWithSubjects']);
    Route::get('/questions/{subject}', [QuestionController::class, 'index']);
    Route::get('/questions/{subject}/create', [QuestionController::class, 'create']);
    Route::post('/questions/{subject}', [QuestionController::class, 'store']);
    Route::get('/questions/{subject}/{question}', [QuestionController::class, 'show']);
    Route::get('/questions/{subject}/{question:id}/edit', [QuestionController::class, 'edit']);
    Route::put('/questions/{subject}/{question}', [QuestionController::class, 'update']);
    Route::delete('/questions/{subject}/{question}', [QuestionController::class, 'destroy']);

    // Route to display students result for teacher
    Route::get('/dashboard/student-result', [StudentResultController::class, 'showCourseListsWithSubjects']);
    Route::get('/all-students-result/{subject}', [StudentResultController::class, 'showResultAllStudents']);

    // Discussion
    // Route::get('/discussions/{subject}/{group}', [DiscussionController::class, 'index']);
    Route::get('/discussions/{course}/{group}/create', [DiscussionController::class, 'create']);
    Route::post('/discussions/{course}', [DiscussionController::class, 'store']);
    Route::get('/discussions/{course}/{discussion}/edit', [DiscussionController::class, 'edit']);
    Route::get('/discussions/{course}/{discussion}/show', [DiscussionController::class, 'show']);
    Route::put('/discussions/{course}/{discussion}', [DiscussionController::class, 'update']);
    Route::delete('/discussions/{course}/{discussion}', [DiscussionController::class, 'destroy']);
    // Route::get('/student-group/{course}', [DiscussionController::class, 'index']);
    // Route::resource('/student-group/{course}', DiscussionController::class);

    // Group
    Route::get('/dashboard/student-group', [GroupController::class, 'showGroupswithCourse']);
    Route::get('/student-group/{course}', [GroupController::class, 'index']);
    Route::get('/student-group/{course}/create', [GroupController::class, 'create']);
    Route::post('/student-group/{course}', [GroupController::class, 'store']);
    Route::get('/student-group/{course}/{group}/edit', [GroupController::class, 'edit']);
    Route::put('/student-group/{course}/{group}', [GroupController::class, 'update']);
    Route::delete('/student-group/{course}/{group}', [GroupController::class, 'destroy']);
});

/*
    All Student Users Routes List
*/
Route::middleware(['auth', 'user-access:student'])->group(function () {
    // Route untuk dashboard Siswa setelah berhasil login
    Route::get('/courses', [DashboardCourseController::class, 'showAllCourses']);

    Route::get('/course/{course}', [SubjectController::class, 'subjectListStudent']);

    Route::get('/subject/{subject}', [SubjectController::class, 'showDetail']);

    // Rout for save comment
    Route::post('/discussion/comment', [CommentController::class, 'store']);
    Route::put('/discussion/comment/likes/{comment}', [CommentController::class, 'save']);


    // Route::post('/like-comment/{id}', [CommentController::class, 'likeComment']);
    // Route::post('/unlike-comment/{id}', [CommentController::class, 'unlikeComment']);
    Route::get('/result/{subject}', [StudentResultController::class, 'index']);

    // Route for dashboard exam page
    Route::get('/{subject}/exam', [QuestionController::class, 'dashboardExam']);

    Route::get('/confirmation/{subject}/{question:code}', [QuestionController::class, 'showConfirmation']);

    Route::get('/groups/{course}/{subject}', [GroupController::class, 'showGroupsToStudent']);
    Route::get('/discussion/{subject}/{group}', [DiscussionController::class, 'showDiscussion']);
    Route::put('/discussion/{subject}/{discussion}', [DiscussionController::class, 'addProjectResult']);

    // Route for display questions view for student 
    Route::get('{subject}/{question:code}', [QuestionController::class, 'showQuestionList']);

    // Route for save student answer to Result table
    Route::post('/{subject}/{question:code}', [StudentResultController::class, 'store']);
});



// Route for save student answer to Result table
// Route::post('/{subject}/{question:code}', [StudentResultController::class, 'storeQuiz']);
// Route::post('/exam/{subject}/{question:code}', [StudentResultController::class, 'storePosttest']);
// Route for display all exam question for student
// Route::get('/exam/{subject}/{question:code}', [QuestionController::class, 'showExamQuestionList']);
// Route::post('/quiz/{subject}/student-answer', [StudentResultController::class, 'store']);


Route::get('/group-discussion', function () {
    return view('discuss');
});


// Route::get('/exam', function () {
//     return view('exam');
// });

// Route::get('/profile', function () {
//     return view('user', [
//         'title' => 'Profil'
//     ]);
// });

// Route::get('/profile/{user:username}', function(){
    
// })

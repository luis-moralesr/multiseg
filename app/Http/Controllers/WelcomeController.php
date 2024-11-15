<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;

class WelcomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request) {

        $query = Course::query()
            ->where('status', 'active') // Solo cursos con estado 'active'
            ->orderBy('id', 'desc');

        $enrollments = Enrollment::where('student_id', Auth::id())->pluck('course_id')->toArray();

        if ($request->has('name') && $request->input('name') !== '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $courses = $query->paginate(4);

        return view('welcome', compact('courses', 'enrollments'));
    }

}

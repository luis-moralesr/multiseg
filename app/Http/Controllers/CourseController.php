<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $query = Course::query()->orderBy('id', 'desc');

        if ($request->has('name') && $request->input('name') !== '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $courses = $query->paginate(4);


        return view('admin.courses', compact('courses'));
    }
}

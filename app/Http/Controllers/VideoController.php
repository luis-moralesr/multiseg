<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show($id)
    {
        $courses = Course::find($id);
        return view('video', compact('courses'));
    }
}

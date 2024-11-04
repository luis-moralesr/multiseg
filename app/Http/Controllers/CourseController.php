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

        $courses = $query->paginate(2);


        return view('admin.courses', compact('courses'));
    }


    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
            'duration' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tamaño máximo: 2MB
        ]);

        // Crear el curso con la imagen
        Course::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'url' => $validatedData['url'],
            'duration' => $validatedData['duration'],
            'image' => $request->file('image') ? $request->file('image')->store('courses', 'public') : null,
            'views' => 0,
            'likes' => 0,
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso creado exitosamente.');
    }


}

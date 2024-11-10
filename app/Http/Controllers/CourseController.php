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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tamaño máximo: 2MB
        ]);

        // Crear el curso con la imagen
        Course::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'url' => $validatedData['url'],
            'image' => $request->file('image') ? $request->file('image')->store('courses', 'public') : null,
            'views' => 0,
            'likes' => 0,
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        // Validación de los datos
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        // Si existe una nueva imagen en la solicitud
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($course->image) {
                $oldImagePath = public_path('img/' . $course->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Guardar la nueva imagen en public/img/courses
            $newImageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img/courses'), $newImageName);

            // Actualizar el nombre de la imagen en los datos validados con el prefijo 'courses/'
            $validatedData['image'] = 'courses/' . $newImageName;
        }

        // Actualizar el curso con los datos validados
        $course->update($validatedData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('courses.index')->with('success', 'Curso actualizado exitosamente.');
    }

}

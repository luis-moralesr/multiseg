<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Buscar el curso por su ID
        $courses = Course::find($id);

        if (!$courses) {
            return back()->with('danger', 'No se encontró el curso.');
        }

        // Obtener la inscripción del usuario en el curso
        $enrollment = Enrollment::where('student_id', $userId)
                                ->where('course_id', $courses->id)
                                ->first();

        // Si el curso existe pero no se encuentra la inscripción, redirigir a /welcome
        if (!$enrollment) {
            return redirect()->route('welcome.index')->with('error', 'No se encontró inscripción para el curso seleccionado');
        }

        // Asignar ID de inscripción
        $enrollmentId = $enrollment->id;

        $progress = $enrollment->progress;  // Asegúrate de que 'progress' esté en el modelo
        $progress = min(max($progress, 0), 100);  // Asegurarse de que esté entre 0 y 100

        // Verificar si el curso está completado
        $isCompleted = $enrollment->completed;

        $comments = Comment::where('course_id', $id)
                           ->with('student') // Asegúrate de que la relación esté correcta
                           ->orderBy('created_at', 'desc') // Ordena de forma descendente por fecha de creación
                           ->paginate(4);

        // Pasar el curso, la inscripción y el estado de completado a la vista
        return view('video', compact('courses', 'enrollmentId', 'isCompleted', 'progress', 'comments'));
    }






}

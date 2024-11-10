<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id(); // Obtén el ID del usuario autenticado
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'course_id' => 'required',
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'student_id' => $userId,
            'course_id' => $validatedData['course_id'],
            'comment' => $validatedData['comment'],
        ]);

        return back()->with('success', 'Comentario agregado exitosamente.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Certification;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{


    public function store($id)
    {
        $courseId = $id;
        $studentId = Auth::id();

        $course = Course::find($courseId);
        $duration = $course->duration;



        Enrollment::create([
            'student_id' => $studentId,
            'course_id' => $courseId,
            'completed' => false,
            'duration' => $duration,
            'progress',
        ]);

        return redirect()->back()->with('success', 'Inscripción completada exitosamente.');
    }

    public function progress(Request $request)
    {
        try {
            // Suponiendo que tienes el ID del usuario y el ID del curso en el request
            $userId = auth()->id(); // ID del usuario autenticado
            $courseId = $request->input('course_id'); // ID del curso actual (envíalo desde el frontend)

            // Busca la inscripción correspondiente
            $enrollment = Enrollment::where('student_id', $userId)
                ->where('course_id', $courseId)
                ->first();

            // Verifica si se encuentra la inscripción
            if ($enrollment) {
                $enrollment->progress = $request->input('progress');
                $enrollment->save();

                return response()->json(['status' => 'Progreso guardado exitosamente']);
            }

            // Si no se encuentra la inscripción, envía una respuesta de error
            return response()->json(['error' => 'Inscripción no encontrada'], 404);
        } catch (\Exception $e) {
            // Captura cualquier error y devuelve un mensaje con el error específico
            return response()->json([
                'error' => 'Ocurrió un error al guardar el progreso',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProgress($courseId)
    {
        try {
            $userId = auth()->id(); // Obtén el ID del usuario autenticado

            // Encuentra la inscripción del usuario para el curso específico
            $enrollment = Enrollment::where('student_id', $userId)
                ->where('course_id', $courseId)
                ->first();

            // Verifica si se encontró la inscripción y devuelve el progreso, o 0 si no existe progreso
            if ($enrollment) {
                return response()->json(['progress' => $enrollment->progress]);
            } else {
                return response()->json(['progress' => 0]);
            }
        } catch (\Exception $e) {
            // Maneja cualquier error inesperado y devuelve un mensaje de error
            return response()->json([
                'error' => 'Ocurrió un error al obtener el progreso',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function completed($courseId, $id)
    {
        $userId = auth()->id(); // Obtén el ID del usuario autenticado

        // Encuentra la inscripción del usuario para el curso específico
        $enrollment = Enrollment::where('student_id', $userId)
            ->where('course_id', $courseId)
            ->first(); // Busca la inscripción que coincida

        if ($enrollment) {
            $enrollment->completed = true; // Marca el curso como completado
            $enrollment->save();

            return response()->json(['status' => 'Curso marcado como completado']);
        } else {
            return response()->json(['status' => 'Inscripción no encontrada'], 404);
        }
    }


    public function crateCertificaton(Request $request)
    {
        // Validar que `enrollment_id` esté presente en el Request
        $enrollmentId = $request->input('enrollment_id');

        // Buscar la inscripción del estudiante
        $enrollment = Enrollment::find($enrollmentId);

        if (!$enrollment) {
            return response()->json(['error' => 'Inscripción no encontrada'], 404);
        }

        $uniqueKey = Str::random(42);


        // Crear el certificado
        $certification = Certification::create([
            'enrollment_id' => $enrollment->id,
            'key' => $uniqueKey
        ]);

        // Devolver una respuesta exitosa
        return response()->json(['message' => 'Certificado creado exitosamente', 'certification' => $certification]);
    }


    public function getCertificationData($id)
    {
        // Obtener la inscripción del usuario en el curso junto con sus relaciones
        $enrollment = Enrollment::with(['course', 'student', 'certification'])
                                 ->where('id', $id)
                                 ->first();

        // Si no se encuentra inscripción, devolver una respuesta con un mensaje de error
        if (!$enrollment) {
            return response()->json([
                'error' => 'Inscripción no encontrada'
            ], 404);
        }

        $certification = Certification::where('enrollment_id', $enrollment)->get();


        // Obtener los datos del curso, estudiante y certificación si existe
        $courseName = $enrollment->course->name ?? 'Curso no especificado';
        $studentName = $enrollment->student->name ?? 'Estudiante no especificado';
        $certificationCode = $enrollment->certification->key ?? 'Certificación no generada';
        $dateCreation = $enrollment->certification->created_at ?? 'Fecha no especificada';

        // Preparar los datos para la respuesta
        $data = [
            'enrollment_id' => $enrollment->id,
            'course_name' => $courseName,
            'student_name' => $studentName,
            'key' => $certificationCode,
            'create_at' => $dateCreation,
        ];

        return response()->json($data);
    }


}

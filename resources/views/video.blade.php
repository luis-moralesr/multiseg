@extends('layouts.app')

@section('content')
    <div class="container fondo">
        @include('includes.search')
        <div class="row">
            <div class="col">
                <h1>{{ $courses->name }} </h1>
            </div>
        </div>
        <div class="row">
            <p>{{ $courses->description }}</p>
        </div>
        <div class="row justify-content-center mb-1">
            <div class="col-12 col-md-8">
                <div class="video-container">
                    <iframe id="video"
                    src="{{ $courses->url }}"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen>
            </iframe>

                </div>

            </div>

            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">Progreso</h1>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;"
                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $progress }}%
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p>Consigue el certificado de Multiseg al completar todo el curso</p>
                        <!-- Si isCompleted es verdadero, el botón será activo; de lo contrario, estará desactivado -->
                        <button class="btn btn-primary {{ $isCompleted ? '' : 'disabled' }}" id="generatePDF" data-id="{{ $enrollmentId }}">Certificado</button>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container mt-5">
                    <div class="row mb-2">
                        <div class="col">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="comment-section">
                                <h4>Deja tu comentario</h4>
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $courses->id }}">
                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control comment-box" id="newComment" rows="3" placeholder="Escribe tu comentario aquí..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="addCommentBtn">Agregar comentario</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    @if ($comments->isEmpty())
                        <div class="alert alert-info text-center">
                            ¡Sé el primero en comentar este curso!
                        </div>
                    @else
                        @foreach ($comments as $comment)
                        <ul id="comments-list" class="list-unstyled">
                            <!-- Comentario Principal -->
                            <li class="comment-item mb-3">
                                <div class="d-flex align-items-start">
                                    <!-- Avatar -->
                                    <div class="comment-avatar me-3">
                                        <img src="{{ asset('img/favicon.png') }}" alt="Avatar" class="rounded-circle" width="65" height="65">
                                    </div>
                                    <!-- Caja del Comentario -->
                                    <div class="comment-box shadow-sm p-3 mb-3 bg-white rounded w-100">
                                        <div class="comment-head d-flex justify-content-between">
                                            <h6 class="comment-name mb-0">
                                                <a href="http://creaticode.com/blog" class="text-dark">{{ $comment->student->name }}</a>
                                            </h6>
                                            <span class="text-muted small">{{ $comment->course->created_at }}</span>
                                        </div>
                                        <div class="comment-content mt-2 text-muted">
                                            {{ $comment->comment }}
                                        </div>
                                        <div class="comment-actions mt-2 d-flex justify-content-end">
                                            <i class="fa fa-reply me-3" style="cursor:pointer;"></i>
                                            <i class="fa fa-heart" style="cursor:pointer;"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="col d-flex justify-content-center">
                        {{ $comments->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

<div id="to-top" class="scroll-button on">
	<a class="scroll-button" href="javascript:void(0)" title="Back to Top"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
      </svg></a>
</div>
@endsection

<style>
    .video-container {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        /* Proporción 16:9 */
        height: 0;
        overflow: hidden;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>
<script>
    // Asegúrate de que `@vimeo/player` esté cargado si no está incluido en el HTML
    var player;
    var courseId = {{ $courses->id }}; // Asigna el ID del curso desde Blade
    var maxAllowedTime = 0; // Almacena el progreso guardado
    var enrollmentId = {{ $enrollmentId ?? 'null' }}; // ID de la inscripción desde Blade o null

    // Inicializa el reproductor de Vimeo
    document.addEventListener("DOMContentLoaded", function() {
        player = new Vimeo.Player('video'); // Crea el reproductor con el id correcto

        // Evento para controlar el progreso del video
        player.on('timeupdate', function(data) {
            console.log(`Reproduciendo en el segundo: ${Math.floor(data.seconds)}s`);

            // Guarda el progreso si se ha avanzado más allá del progreso guardado
            if (data.seconds > maxAllowedTime) {
                saveProgress(data.seconds);
                maxAllowedTime = data.seconds; // Actualiza el progreso máximo permitido
            }
        });

        // Evento cuando el video llega al final
        player.on('ended', function() {
            console.log('El video ha terminado.');

            // Marcar curso como completado
            markCourseAsCompleted();

            // Generar certificado
            generateCertification(enrollmentId);

            // Recargar la página después de 1 segundo
            setTimeout(() => {
                location.reload();
            }, 1000);
        });
    });

    function saveProgress(progress) {
        axios.post("{{ route('enrollment.progress') }}", {
            course_id: courseId, // Incluye el ID del curso en el cuerpo de la solicitud
            progress: progress
        }, {
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}" // Incluye el token CSRF para proteger la solicitud
            }
        })
        .then(response => {
            console.log("Progreso guardado:", response.data);
        })
        .catch(error => {
            console.error("Error al guardar el progreso:", error);
        });
    }

    function generateCertification(enrollmentId) {
        console.log("Creando registro de certificado...");
        axios.post("{{ route('certifications.store') }}", {
            enrollment_id: enrollmentId
        }, {
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => {
            console.log("Certificado generado:", response.data);
        })
        .catch(error => {
            console.error("Error al generar el certificado:", error);
        });
    }

    function markCourseAsCompleted() {
        console.log("Marcando el curso como completado...");

        axios.put(`/markCompleted/${courseId}/${enrollmentId}`, {
            completed: true
        }, {
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => {
            console.log("Curso marcado como completado:", response.data);
        })
        .catch(error => {
            console.error("Error al marcar el curso como completado:", error);
        });
    }
</script>

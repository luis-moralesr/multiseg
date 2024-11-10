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
                    <iframe id="video" src="{{$courses->url}}?api=1&player_id=video"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
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
    // Crear el elemento script para cargar la API de Vimeo
    var script = document.createElement('script');
    script.src = "https://player.vimeo.com/api/player.js";
    document.head.appendChild(script);

    script.onload = function() {
        var iframe = document.querySelector('#video');
        var player = new Vimeo.Player(iframe);

        var courseId = {{ $courses->id }}; // ID del curso desde Blade
        var maxAllowedTime = 0; // Progreso guardado
        var enrollmentId = {{ $enrollmentId ?? 'null' }}; // ID de la inscripción desde Blade o null

        if (enrollmentId === null) {
            console.error('No se encontró inscripción para este curso.');
        }

        // Obtener el progreso del video al cargar la página
        axios.get("{{ route('enrollment.getProgress', ['id' => $courses->id]) }}")
            .then(response => {
                maxAllowedTime = response.data.progress;

                // Obtener la duración del video y ajustar el tiempo de inicio
                player.getDuration().then(duration => {
                    if (maxAllowedTime < duration) {
                        player.setCurrentTime(maxAllowedTime); // Establecer el tiempo solo si es válido
                    } else {
                        console.warn("El tiempo de progreso es mayor que la duración del video.");
                        maxAllowedTime = 0; // Reiniciar si es mayor
                    }
                });
            })
            .catch(error => {
                console.error("Error al obtener el progreso:", error);
            });

        // Eventos del reproductor
        player.on('play', function() {
            console.log('El video está reproduciéndose.');
            trackProgress();
        });

        player.on('pause', function() {
            console.log('El video está en pausa.');
            stopTrackingProgress();
            saveProgress();
        });

        player.on('ended', function() {
            console.log('El video ha terminado. Marcando el curso como completado...');
            stopTrackingProgress();
            markCourseAsCompleted();
            generateCertification(enrollmentId);
            setTimeout(() => {
                location.reload(); // Recarga la página después de 1 segundo
            }, 1000);
        });

        // Seguimiento de progreso
        var progressInterval;
        function trackProgress() {
            progressInterval = setInterval(() => {
                player.getCurrentTime().then(currentTime => {
                    console.log(`Reproduciendo en el segundo: ${Math.floor(currentTime)}s`);
                    if (currentTime > maxAllowedTime) {
                        maxAllowedTime = currentTime;
                    }
                });
            }, 5000); // Comprobar progreso cada 5 segundos
        }

        function stopTrackingProgress() {
            clearInterval(progressInterval);
        }

        // Guardar el progreso actual
        function saveProgress() {
            player.getCurrentTime().then(currentTime => {
                if (currentTime > maxAllowedTime) {
                    axios.post("{{ route('enrollment.progress') }}", {
                        course_id: courseId,
                        progress: currentTime
                    }, {
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: 'api key', // Reemplaza con tu API key
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        }
                    })
                    .then(response => {
                        console.log("Progreso guardado:", response.data);
                    })
                    .catch(error => {
                        console.error("Error al guardar el progreso:", error);
                    });
                }
            });
        }

        // Generar el certificado
        function generateCertification(enrollmentId) {
            console.log("Creando registro de certificado...");
            axios.post("{{ route('certifications.store') }}", {
                enrollment_id: enrollmentId
            }, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: 'api key',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error("Error al generar el certificado:", error);
            });
        }

        // Marcar el curso como completado
        function markCourseAsCompleted() {
            console.log("Marcando el curso como completado...");
            console.log("courseId:", courseId);
            console.log("enrollmentId:", enrollmentId);

            if (!courseId || !enrollmentId) {
                console.error("courseId o enrollmentId no están definidos correctamente.");
                return;
            }

            axios.put(`/markCompleted/${courseId}/${enrollmentId}`, {
                completed: true
            }, {
                headers: {
                    "Content-Type": "application/json",
                    Authorization: 'api key',
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error("Error al actualizar el curso como completado:", error);
            });
        }
    };
</script>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card border-danger">
                    <div class="card-header text-center" style="background-color: #ff3131">
                        <h3 class="text-white"><strong>¡Bienvenido al catálogo de cursos en línea de Multiseg</strong></h3>
                    </div>
                    <div class="card-body">
                        <div class="container mt-2">
                            <div class="row mb-4">
                                <div class="col-12 col-md-6">
                                    <h5 class="text-center parrafo">En nuestro catálogo, encontrarás una amplia variedad
                                        de cursos diseñados para ayudarte
                                        a desarrollar habilidades clave y alcanzar tus metas personales y profesionales.
                                    </h5>
                                </div>
                                <div class="col-12 col-md-6 ms-auto align-content-center">
                                    <form action="{{ route('welcome.index') }}" method="GET">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre del curso"
                                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                                name="name">
                                            <button class="btn btn-outline-primary" type="submit"
                                                id="button-addon2">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="row">
                                        @foreach ($courses as $course)
                                            <div class="col-md-6 mb-3">
                                                <div class="card border-danger-subtle shadow h-100">
                                                    <img src="{{ asset('img/' . $course->image) }}" alt="Imagen"
                                                        class="rounded-top"
                                                        style="object-fit: cover; width: 100% !important; height: 150px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $course->name }}</h5>
                                                        <div class="accordion accordion-flush"
                                                            id="accordion-{{ $course->id }}">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="heading-{{ $course->id }}">
                                                                    <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse-{{ $course->id }}"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapse-{{ $course->id }}">
                                                                        Ver Más
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse-{{ $course->id }}"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="heading-{{ $course->id }}">
                                                                    <div class="accordion-body">
                                                                        <p class="card-text">{{ $course->description }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-end bg-white">
                                                        @if (in_array($course->id, $enrollments))
                                                            <a href="{{ route('video.show', $course->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-primary">Ingresar</button>
                                                            </a>
                                                        @else
                                                            <form action="{{ route('enrollment.store', $course->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Inscribirse</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
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
    .parrafo{
        font-size: 1rem;
        color: #333;
        font-weight: 700 !important;
}
    }
</style>

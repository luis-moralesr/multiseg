@extends('layouts.app')

@section('content')
    <div class="container fondo">
        <div class="row mb-2">
            <div class="col">
                <div class="mt-4">
                    <a href="{{ asset('admin/dashboard') }}">
                        <button class="btn btn-danger">REGRESAR</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col text-center">
                <h1 class="text-primary">CURSOS MULTISEG</h1>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-md-6 mx-auto">
                <form action="{{route('courses.index')}}" method="GET">
                    <div class="input-group mb-3 d-flex justify-content-center">
                        <input type="text" class="form-control" placeholder="Nombre del curso"
                            aria-label="Recipient's username" aria-describedby="button-addon2" name="name">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="text-center p-2">
                    <button class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#createCourse"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                      </svg> NUEVO</button>
                </div>
            </div>
        </div>
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
        <div class="row">
            <div class="container">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-12 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/' . $course->image) }}"alt="Imagen" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body h-100 d-flex flex-column">
                                            <h5 class="card-title">{{ $course->name }}</h5>
                                            <p class="card-text">{{ $course->description }}</p>
                                            <p class="card-text"><small class="text-muted">Estatus:
                                                    {{ $course->status }}</small></p>
                                            <p class="card-text"><small class="text-muted">Vistas:</small></p>
                                            <div class="mt-auto text-end">
                                                <button class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg> Editar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col d-flex justify-content-center">
                    {{ $courses->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>
    @include('admin/modals/courses/newCourse')
@endsection

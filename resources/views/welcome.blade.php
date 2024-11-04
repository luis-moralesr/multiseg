@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">Multiseg</div>
                    <div class="card-body">
                        <div class="container mt-2">
                            <div class="row mb-2">
                                <div class="col-12 col-md-6 ms-auto">
                                    <form action="{{route('welcome.index')}}" method="GET">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre del curso"
                                                aria-label="Recipient's username" aria-describedby="button-addon2" name="name">
                                            <button class="btn btn-outline-primary" type="submit"
                                                id="button-addon2">Buscar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="row">
                                        @foreach ($courses as $course)
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100">
                                                    <img src="{{ asset('img/' . $course->image) }}"alt="Imagen" class="rounded-top"
                                                    alt="..." style="object-fit: cover; width: 100% !important; height: 200px;">
                                                    <div class="card-body h-100">
                                                        <h5 class="card-title">{{ $course->name }}</h5>
                                                        <p class="card-text">{{ $course->description }}</p>
                                                        <p class="card-text"><small class="text-muted">Likes:</small></p>
                                                        <p class="card-text"><small class="text-muted">Alumnos inscritos:</small></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="mt-auto text-end">
                                                            <button class="btn btn-primary">Inscribirse</button>
                                                                <a href=" {{ route('video.show', $course->id) }}">
                                                                    <button class="btn btn-primary">
                                                                        Ingresar
                                                                    </button>
                                                                </a>
                                                        </div>
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
@endsection

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
                                    <form action="">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nombre del curso"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-primary" type="button"
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
                                                    <img src="{{ asset('img/multiseg.jpg') }}" class="rounded-top"
                                                        alt="..." style="object-fit: cover; width: 100% !important; height: 200px;">
                                                    <div class="card-body h-100">
                                                        <h5 class="card-title">{{ $course->name }}</h5>
                                                        <p class="card-text">{{ $course->description }}</p>
                                                        <p class="card-text"><small class="text-muted">Estatus:
                                                                {{ $course->status }}</small></p>
                                                        <p class="card-text"><small class="text-muted">Vistas:</small></p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="mt-auto text-end">
                                                            <button class="btn btn-outline-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-pencil"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                                </svg> Editar</button>
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

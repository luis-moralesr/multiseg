@extends('layouts.app')

@section('content')

    <div class="container fondo">
        @include('includes.search')
        <div class="row">
            <div class="col">
                <h1>{{$courses->name}} </h1>
            </div>
        </div>
        <div class="row">
            <p>{{$courses->description}}</p>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-12 col-md-8">

                <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                        src="{{$courses->url}}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                        style="position:absolute;top:0;left:0;width:100%;height:100%;" title="test"></iframe></div>
                <script src="https://player.vimeo.com/api/player.js"></script>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-center">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center">Progreso</h1>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                          </div>
                    </div>
                    <div class="row">
                        <p>Consigue el certificado de Multiseg al completar todo el curso</p>
                        <button class="btn btn-primary disabled">Certificado</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="comment-section">
                                <h4>Deja tu comentario</h4>
                                <div class="mb-3">
                                    <textarea class="form-control comment-box" id="newComment" rows="3" placeholder="Escribe tu comentario aquí..."></textarea>
                                </div>
                                <button class="btn btn-primary" id="addCommentBtn">Agregar comentario</button>

                                <div class="comment-list" id="commentList">
                                    <h5>Comentarios</h5>
                                    <!-- Aquí se mostrarán los comentarios -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


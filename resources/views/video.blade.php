@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f7f7f7;
    }
    .comment-section {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    .comment-box {
        background-color: #f0f0f0;
        border: none;
        border-radius: 5px;
        padding: 10px;
    }
    .comment-list {
        margin-top: 20px;
    }
    .comment-item {
        background-color: #e9ecef;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
    <div class="container">
        @include('includes.search')
        <div class="row">
            <div class="col">
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. </h1>
                <h3>Lorem ipsum </h3>
            </div>
        </div>
        <div class="row">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni qui eligendi aspernatur accusamus tenetur,
                consectetur maxime quas velit officia in dolorem inventore. Ipsam dolor expedita harum repellat quaerat
                mollitia aliquid!Animi hic enim voluptates itaque. Fuga ipsam nisi veritatis labore ab, incidunt ducimus.
                Nam quidem possimus sequi assumenda laborum ex dolor, cumque sapiente dicta. Repellendus itaque nam cum
                quibusdam esse.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <div style="padding:56.25% 0 0 0;position:relative;"><iframe
                        src="https://player.vimeo.com/video/1020465290?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
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


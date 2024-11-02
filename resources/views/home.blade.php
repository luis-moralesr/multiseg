@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">Bienvenido a nuestra academia ONLINE</div>

                <div class="card-body">
                    <a href="http://conectandovidas.com">
                        <div class="figura">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

    body{
        justify-content: center;
        align-items: center;
    }

    .figura{
        background-image: url("{{asset('img/image.jpg')}}");
        height: 100vh;
        width: 100%;
        background-repeat: no-repeat;
        background-size: contain;
    }

    </style>

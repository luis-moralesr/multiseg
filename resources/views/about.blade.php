@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row mb-3 d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <img src="{{asset('img/multiseg.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">GARANTÍA Y COMPROMISO A LARGO PLAZO CONTIGO</h5>
                    <p class="card-text">
                        Estamos aquí para ofrecerte soluciones prácticas al mejor precio posible y ayudarte a que tus proyectos sean un placer y no una carga. Imagínalo y nosotros proveeremos las herramientas para lograrlo.
                    </p>
                    <ul class="list-unstyled">
                        <li><strong>Dirección: </strong> Av. San Juan no. 68A local 6 Cuautlancingo</li>
                        <li><strong>Teléfono: </strong> +52 221 598 0200</li>
                        <li><strong>Email: </strong>info@multiseg.com.mx</li>
                    </ul>
                    <div class="col-6 d-flex justify-content-center w-100">
                        <a href="https://multiseg.com.mx" class="btn btn-danger d-flex align-items-center" target="_blank">
                            <!-- Ícono SVG de Bootstrap -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="margin-right: 8px;">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h9V.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .485.379l1.5 8A.5.5 0 0 1 16 9H3a.5.5 0 0 1-.485-.621l1.5-8A.5.5 0 0 1 3.5 0zM3.5 1a.5.5 0 0 0-.5.5v7h10V1a.5.5 0 0 0-.5-.5h-9zM1.118 8h13.764L14.5 2H1.118L1.5 8h-.382zM10 11a2 2 0 1 0 4 0 2 2 0 0 0-4 0zm-6 0a2 2 0 1 0 4 0 2 2 0 0 0-4 0z"/>
                            </svg>
                            Tienda Online
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3 d-flex justify-content-center align-items-center">
        <!-- Misión -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">Misión</h5>
                    <p class="card-text">
                            Multiseg es una empresa mayorista de soluciones  de seguridad, telecomunicaciones, equipos de informática (TI) y todo tipo de productos ferreteros.
                            Contamos con colaboradores bien capacitados, comprometidos y motivados que proveen oportunamente a nuestros Clientes del servicio solicitado
                    </p>
                </div>
            </div>
        </div>

        <!-- Visión -->
        <div class="col-12 col-md-6 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <div class="card-body">
                    <h5 class="card-title text-center text-primary">Visión</h5>
                    <p class="card-text">Somos una empresa que genera riqueza global ofreciendo seguridad, gusto y con ello la tranquilidad de que nuestros activos más preciados están siempre vigilados: nuestras familias, nuestros bienes y nuestro medio ambiente.
                    </p>
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

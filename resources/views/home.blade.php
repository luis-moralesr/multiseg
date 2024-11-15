@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <div class="CarouselImou">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="border-radius: 15px">
                        <div class="carousel-item active">
                            <img src="{{asset('img/multiseg_academia1.jpeg')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <h3 class="text-danger"><strong>¡Prepárate para ser un experto en seguridad electrónica!</strong></h3>
                                    <p>Te invitamos a nuestros cursos prácticos de instalación y programación de equipos como CCTV análogo e IP, control de acceso, videoporteros, alarmas, cercas electrificadas ¡y mucho más!</p>
                                    <a href="{{asset('/welcome')}}" class="btn btn-outline-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/video-seguridad-2.png')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <p>Mejora tus habilidades con nuestros cursos.
                                        Aprende técnicas avanzadas para maximizar seguridad y cobertura en instalaciónes de alto rendimiento.</p>
                                    <a href="{{asset('/welcome')}}" class="btn btn-outline-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/multiseg_academia2.jpeg')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <h3 class="text-danger"><strong>¡Instaladores, lleven sus conocimientos al siguiente nivel!</strong></h3>
                                    <p>Únanse a nuestro curso de cámaras IP y dominen las últimas técnicas en instalación y configuración de seguridad en red.</p>
                                    <a href="{{asset('/welcome')}}" class="btn btn-outline-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="container col-12 col-md-10">
        <div class="card shadow-lg border-danger">
            <div class="card-body text-center p-5">
                <h1 class="display-5 fw-bold text-danger mb-4">¡Prepárate para ser un experto en seguridad electrónica!</h1>
                <p class="fw-bold mb-2">
                    Te invitamos a nuestros cursos prácticos de instalación y programación de equipos como CCTV análogo e IP, control de acceso, videoporteros, alarmas, cercas electrificadas ¡y mucho más!
                </p>
                <p class="fw-bold mb-2">Constancia al finalizar cada curso</p>
                <p class="fw-bold mb-2">Haz crecer tus habilidades y amplía tus oportunidades con nosotros en Multiseg!</p>
                <p class="fw-bold">¡Inscríbete y asegura tu futuro!</p>
                <div class="d-grid col-md-6 mx-auto mt-4">
                    <a href="{{ asset('/welcome') }}" class="btn btn-outline-primary btn-lg fw-bold">
                        INGRESAR
                    </a>
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

body{
    background-color:white;
}

.CarouselImou .carousel-caption {
  position: absolute;
  left: 0;
  width: 50%;
  color: white;
  text-align: left;
  background-color: rgba(0, 0, 0, 0.4);
  /* Fondo semitransparente */
  padding: 20px;
  height: 100%;
  margin: 0;
  bottom: 0;
}

.CarouselImou .carousel-item img {
  width: 100vw;
  height: 75vh;
  object-fit: cover;
}

.CarouselImou .CarouselText {
  padding: 20px;
}


/* Estilos para la sección del cupón */
.coupon-code {
    font-size: 1.2rem;
    color: #333;
}

.banner-content h2 {
    font-size: 2.5rem;
    color: #0d6efd;
}

.banner-content p.lead {
    color: #555;
}

.banner-content .btn-primary {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
}

/* Estilo para agregar un efecto de animación */
.banner-content {
    animation: fadeIn 1s ease-in-out;
}

/* Keyframes para animación */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Fondo de la sección con ::before */
.banner-wrapper {
    overflow: hidden;
}

.banner-wrapper::before {
    content: '';
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center right;
    background-repeat: no-repeat;
    opacity: 0.5; /* Ajusta la opacidad si deseas atenuar la imagen */
    z-index: -1; /* Envía el fondo detrás del contenido */
    transition: opacity 0.3s ease;
}

/* Efecto hover opcional para animación */
.banner-wrapper:hover::before {
    opacity: 0.7; /* Cambia la opacidad en hover para un efecto visual */
}

/* Ajustes del contenido para sobresalir sobre el fondo */
.banner-content {
    position: relative;
    color: #fff;
    z-index: 1;
}




@media (min-width: 300px) and (max-width: 576px) {


.CarouselImou .carousel-caption {
  position: absolute;
  left: 0;
  width: 100%;
  color: white;
  text-align: left;
  background-color: rgba(0, 0, 0, 0.4);
  height: 100%;
  margin: 0;
  bottom: 0;
}

}

    </style>




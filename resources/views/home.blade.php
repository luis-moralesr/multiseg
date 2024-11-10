@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
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
                            <img src="{{asset('img/redes-1.jpg')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <h3>¡Atención instaladores!</h3>
                                    <p><strong>MULTISEG</strong> te invita a mejorar tus habilidades en redes con nuestro curso especializado. Aprenderás a optimizar instalaciones de cámaras y asegurar conexiones seguras para nuestros clientes.</p>
                                    <a href="{{asset('/welcome')}}" class="btn btn-outline-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/video-seguridad-2.png')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <p>Mejora tus habilidades con nuestro curso especializado en cámaras para estacionamientos. Aprende técnicas avanzadas para maximizar seguridad y cobertura en instalaciones de alto rendimiento.</p>
                                    <a href="{{asset('/welcome')}}" class="btn btn-outline-light">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('img/imou3.jpg')}}" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption text-end d-flex justify-content-center align-items-center">
                                <div class="CarouselText">
                                    <h3>¡Instaladores, lleven sus conocimientos al siguiente nivel!</h3>
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
    <hr>
    <div class="row">
    <div class="container p-5 banner-content shadow-lg">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 ">
                <h1 class="display-5 fw-bold text-primary text-center">¡Bienvenido a <strong>Multiseg Academia</strong>!</h1>
                <p class="coupon-code  text-center fw-bold">Encuentra cursos avalados por <strong>Dahua Technology</strong>, líder mundial en soluciones de videovigilancia. </p>
               <p class="coupon-code  fw-bold">Nuestros cursos están diseñados para que cualquier persona, desde principiantes hasta profesionales, aprenda a instalar y configurar cámaras IP de forma práctica y sencilla. ¡Inscríbete hoy y adquiere las habilidades que necesitas para destacar en el mundo de la seguridad!</p>
            </div>
            <div class="col-12 col-md-6">
                <img src="{{asset('img/dahua.jpg')}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="{{ asset('/welcome') }}" class="btn btn-outline-primary">
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



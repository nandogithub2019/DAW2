@extends('layout')

@section('inicio')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{route('muestraPelicula')}}" class="stretched-link"></a>{{-- {{route('MuestraPelicula')}} --}}
        <img src="fotos/slide1.png" class="rounded d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{-- First slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the first slide. --}}</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="fotos/slide2.png" class="rounded d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{-- Second slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the second slide. --}}</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="fotos/slide3.png" class="rounded d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{-- Third slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the third slide. --}}</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- **** HR SEPARADOR **** --}}
<div class="row">
    <hr>
</div>

@stop

@section('categories')

<div class="text-white lead mb-3 ps-5 fs-2 pt-4 font-weight-bold">Categorías</div>
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card bg-dark">
      <div class="card-body">
        <img class="img-fluid rounded" src="{{asset('fotos/slide1.png')}}" alt="" srcset="">  
      
        <a href="{{route('contacta')}}" class="stretched-link"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/slide2.png')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>  
        </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/slide3.png')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>

      </div>
  </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/slide1.png')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>
      </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/slide2.png')}}" alt="" srcset="">  
          <a href="{{route('contacta')}}" class="stretched-link"></a>

        </div>
      </div>
  </div>  
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card bg-dark">
      <div class="card-body">
        <img class="img-fluid rounded" src="{{asset('fotos/slide3.png')}}" alt="" srcset="">  
       
        <a href="{{route('contacta')}}" class="stretched-link"></a>  
    </div>
    </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide1.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide2.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide3.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide1.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide2.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card bg-dark">
    <div class="card-body">
      <img class="img-fluid rounded" src="{{asset('fotos/slide3.png')}}" alt="" srcset="">  
     
      <a href="{{route('contacta')}}" class="stretched-link"></a>  
  </div>
  </div>
</div>
  
@stop

@section('footer')

@stop
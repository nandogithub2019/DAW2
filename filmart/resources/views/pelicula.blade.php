@extends('layout')

@section('pelicula')
<div class="card bg-dark text-white">
  <img src="{{asset('fotos/1.jpg')}}" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h2 class="card-text text-center">Título de la película</h2>
    <p class="card-text text-center">Breve descripción.</p>
    <div class="d-flex justify-content-center">
      <button type="button" class="btn btn-outline-warning"><i class="far fa-play-circle"></i> VER AHORA</button>
    </div>
  </div>
</div>
@stop

@section('cuadricula')


<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card bg-dark">
      <div class="card-body">
        <img class="img-fluid rounded" src="{{asset('fotos/1.jpg')}}" alt="" srcset="">  
      
        <a href="{{route('contacta')}}" class="stretched-link"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/1.jpg')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>  
      </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/1.jpg')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>

      </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/1.jpg')}}" alt="" srcset="">  
         
          <a href="{{route('contacta')}}" class="stretched-link"></a>
      </div>
      </div>
  </div>
  <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark">
        <div class="card-body">
          <img class="img-fluid rounded" src="{{asset('fotos/1.jpg')}}" alt="" srcset="">  
          <a href="{{route('contacta')}}" class="stretched-link"></a>

        </div>
      </div>
  </div>  
@stop
      



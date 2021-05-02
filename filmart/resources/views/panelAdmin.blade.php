@extends('layout')

@section('panelAdmin')


<div class="col-md-10 offset-md-1 my-5">{{-- centro el formulario --}}
  <h2 class="colorLogo">Contacta con nosotros</h2>
  <form class="row g-3" action="{{route('formulario')}}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-4">
      <label for="validationServer01" class="form-label"></label>
      <input type="text" name="nombre" class="form-control" id="validationServer01" value="" placeholder="Nombre">
      @if($errors->first('nombre'))
      <p class="text-danger">{{$errors->first('nombre')}}</p>
    @endif
      <div class="valid-feedback">
        
      </div>
    </div>
    <div class="col-md-4">
      <label for="validationServer02" class="form-label"></label>
      <input type="text" name="apellido" class="form-control" id="validationServer02" value="" placeholder="Apellidos" required>
      <div class="valid-feedback">
        
      </div>
    </div>
    <div class="col-md-4">
      <label for="validationServerUsername" class="form-label"></label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend3">@</span>
        <input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" placeholder="Email" required>
        <div id="validationServerUsernameFeedback" class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <label for="validationServer03" class="form-label"></label>
      <input type="text" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" placeholder="Dirección" required>
      <div id="validationServer03Feedback" class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    
   
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
        <label class="form-check-label" for="invalidCheck3">
          Agree to terms and conditions
        </label>
        <div id="invalidCheck3Feedback" class="">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn-lg colorLogo" type="submit"><b>Enviar</b></button>
    </div>
  </form>
</div>
  
@stop
      

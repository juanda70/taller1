@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">

  @foreach ($viewData["pets"] as $pet)
  @if($loop->first || ($loop->index == 1))
  
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://pixabay.com/get/g9a4915c8f06f8a674a298fb32918df65ad36bd402f71a7c32aebfbefc522c0d67154b4a941026cb488b78414bc97cf705813c3cfb80418e7e5727da929ffd731949775dcb23f6f6ebde4a5e63d97f6fb_1920.jpg" class="card-img-top img-card">
      <div class="card-body text-center">
        <u><b>{{ $pet->getId()}}</b></u>
      <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}"
        class="btn bg-primary text-white">{{ $pet->getName()}}</a>
          
      </div>
    </div>
  </div>
    
  
  @else
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://pixabay.com/get/g9a4915c8f06f8a674a298fb32918df65ad36bd402f71a7c32aebfbefc522c0d67154b4a941026cb488b78414bc97cf705813c3cfb80418e7e5727da929ffd731949775dcb23f6f6ebde4a5e63d97f6fb_1920.jpg" class="card-img-top img-card">
      <div class="card-body text-center">
        <p>{{ $pet->getId()}}</P>
      <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}"
        class="btn bg-primary text-white">{{ $pet->getName()}}</a>
          
      </div>
    </div>
  </div>
  
  @endif
  @endforeach
</div>
@endsection


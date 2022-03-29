@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">

  @foreach ($viewData["pets"] as $pet)
  @if($loop->first || ($loop->index == 1))
  
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/img/pet.jpg') }}">
      <div class="card-body text-center">
        
      <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}"
        class="btn bg-primary text-white">{{ $pet->getName()}}</a>
        <br>{{__('message.Gender')}}: {{ $pet->getGender()}} </br>
        @foreach ($viewData["breeds"] as $breed)
          @if($breed->getId() == $pet->getBreedId())
            <p>{{__('message.Breed')}}: {{ $breed->getName()}} </p>
          @endif
        @endforeach    
      </div>
    </div>
  </div>
    
  
  @else
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/img/pet.jpg') }}">
      <div class="card-body text-center">
        
        
      <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}"
        class="btn bg-primary text-white">{{ $pet->getName()}}</a>
        <br>{{__('message.Gender')}}: {{ $pet->getGender()}} </br>
        @foreach ($viewData["breeds"] as $breed)
          @if($breed->getId() == $pet->getBreedId())
            <p>{{__('message.Breed')}}: {{ $breed->getName()}} </p>
          @endif
        @endforeach    
      </div>
    </div>
  </div>
  
  @endif
  @endforeach
</div>
@endsection


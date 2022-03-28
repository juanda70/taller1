@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" />

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://pixabay.com/get/g9a4915c8f06f8a674a298fb32918df65ad36bd402f71a7c32aebfbefc522c0d67154b4a941026cb488b78414bc97cf705813c3cfb80418e7e5727da929ffd731949775dcb23f6f6ebde4a5e63d97f6fb_1920.jpg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["pet"]->getName()}}
        </h5>
        <p class="card-text">weight: {{ $viewData["pet"]->getWeight() }}kg</p>
        <p class="card-text">Date: {{$viewData["pet"]->getDateBirth()}}</p>
        <p class="card-text">Gender:{{$viewData["pet"]->getGender()}}</p>
        <p class="card-text">Breed:{{$viewData["breed"]->getName()}}</p>
        <a class="boton" id= "delete" href="{{route('pet.delete',['id'=> $viewData["pet"]->getId()] )}}" target="_self">Delete</a>
        <a class="boton" id= "edit" href="{{route('pet.edit',['id'=> $viewData["pet"]->getId()] )}}" target="_self">Edit</a>
       
      </div>
      
    </div>
  </div>
</div>
@endsection


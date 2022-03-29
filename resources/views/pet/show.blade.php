@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" />

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/img/pet.jpg') }}" id="petShow">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["pet"]->getName()}}
        </h5>
        <p class="card-text">{{__('message.Weight')}}: {{ $viewData["pet"]->getWeight() }}kg</p>
        <p class="card-text">{{__('message.Datebirth')}}: {{$viewData["pet"]->getDateBirth()}}</p>
        <p class="card-text">{{__('message.Gender')}}:{{$viewData["pet"]->getGender()}}</p>
        <p class="card-text">{{__('message.Breed')}}:{{$viewData["breed"]->getName()}}</p>
        <a class="boton" id= "delete" href="{{route('pet.delete',['id'=> $viewData["pet"]->getId()] )}}" target="_self">{{__('message.Delete')}}</a>
        <a class="boton" id= "edit" href="{{route('pet.edit',['id'=> $viewData["pet"]->getId()] )}}" target="_self">{{__('message.Edit')}}</a>
       
      </div>
      
    </div>
  </div>
</div>
@endsection


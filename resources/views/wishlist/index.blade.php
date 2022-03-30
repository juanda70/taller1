@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
<div class="row">

  @foreach ($viewData["wishlists"] as $product)
  
  
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/img/pet.jpg') }}">
      <div class="card-body text-center">
        <a class="btn bg-primary text-white">{{ $product->getName()}}</a>
        <br>@lang('price'): {{ $product->getPrice()}} </br>
      </div>
      <a class="boton" id= "delete" href="{{route('wishlist.delete',['id'=> $product->getId()] )}}" target="_self">@lang('Delete')</a>
    </div>
  </div>
    
  @endforeach
</div>
@endsection
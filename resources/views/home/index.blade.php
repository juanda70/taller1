@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
</head>
<div class="row">
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/Cat1.jpg') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/Cat1.jpg') }}" class="img-fluid rounded">
  </div>
  <div class="col-md-6 col-lg-4 mb-2">
    <img src="{{ asset('/img/Cat1.jpg') }}" class="img-fluid rounded">
  </div>
</div>
@endsection

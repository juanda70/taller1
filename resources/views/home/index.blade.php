@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" />
</head>

<div class="item-center">
    <a class="boton" href="{{route('pet.create')}}" target="_self">Create</a>
    <a class="boton" href="{{route('pet.index')}}" target="_self">Pet List</a>
</div>
@endsection

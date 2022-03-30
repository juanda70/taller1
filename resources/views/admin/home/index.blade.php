@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    @lang('Admin Panel - Home Page')
  </div>
  <div class="card-body">
    @lang('Welcome to the Admin Panel, use the sidebar to navigate between the different options.')
  </div>
</div>
@endsection

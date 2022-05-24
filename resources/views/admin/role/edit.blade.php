@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit User')
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.role.update', ['id'=> $viewData['user']->getId()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Name'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ $viewData['user']->getName() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('LastName'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="lastname" value="{{ $viewData['user']->getLastName() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Email'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="email" value="{{ $viewData['user']->getEmail() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Role'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="role" value="{{ $viewData['user']->getRole() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                    <select name="gender"  value="{{ $viewData['user']->getGender() }}" class="form-control mb-2">
                        <option value="Masculino"> {{__('message.Male')}}</option>
                        <option value="Femenino"> {{__('message.Femenine')}}</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="birthday"
                    class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>
                <div class="col-md-6">
                    <input id="birthday" type="date"
                        class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                        value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>
                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">@lang('Edit')</button>
        </form>
    </div>
</div>  
@endsection
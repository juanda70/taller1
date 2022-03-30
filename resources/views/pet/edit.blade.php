@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
@if(session()->has('msg'))
<div class="alert alert-primary" role="alert">
  {{session('msg')}}
</div>
@endif
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">@lang('Update pet')</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('pet.update',['id'=> $viewData["pet"]->getId()] ) }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder={{$viewData["pet"]->getName()}} name="name" value="{{ old('name',$viewData["pet"]->getName()) }}" />
              <input type="text" class="form-control mb-2" placeholder={{$viewData["pet"]->getWeight()}} name="weight" value="{{ old('weight',$viewData["pet"]->getWeight()) }}" />
              <input type="text" class="form-control mb-2" placeholder={{$viewData["pet"]->getDateBirth()}} name="dateBirth" value="{{ old('dateBirth',$viewData["pet"]->getDateBirth()) }}" />
              <input type="text" class="form-control mb-2" placeholder={{$viewData["pet"]->getGender()}} name="gender" value="{{ old('gender',$viewData["pet"]->getGender()) }}" />
              <select name="breed_id" class="form-control mb-2">
                @foreach ($viewData["breeds"] as $breed)
                  <option value="{{ $breed->getId() }}">
                    {{ $breed->getName() }}
                  </option>
                @endforeach
              </select>
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
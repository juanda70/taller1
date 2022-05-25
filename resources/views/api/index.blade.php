@extends('layouts.app')
@section('content')
<div class="row">
    @foreach ($viewData as $product)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="/img/{{ $product->image }}" class="list-picture">

                <div class="card-body text-center">
                    <a href="{{ route('api.show', ['id'=> $product->id]) }}"
                        class="btn bg-primary text-white">{{ $product->name}}</a>
                    <br>{{ $product->price }}</br>
                </div>


            </div>
        </div>
    @endforeach
</div>
@endsection

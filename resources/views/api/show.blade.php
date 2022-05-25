@extends('layouts.app')
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/img/{{ $viewData->image }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData->name }} (${{ $viewData->price }})
                </h5>
                <p class="card-text">{{ $viewData->description }}</p>
                <p class="card-text">
                <form method="POST" action="{{ route('cart.add', ['id'=> $viewData->id]) }}">
                    <div class="row">
                        @csrf
                        <div class="col-auto">
                            <div class="input-group col-auto">
                                <div class="input-group-text">@lang('Quantity')</div>
                                <input type="number" min="1" max="10" class="form-control quantity-input"
                                    name="quantity" value="1">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn bg-primary text-white" type="submit">@lang('Add to cart')</button>
                        </div>
                    </div>
                </form>
                @auth

                       <a href="{{ route('wishlist.save', ['id'=> $viewData->id]) }}"class="btn bg-primary text-white">@lang("Add")
                       </a>




                @endauth
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

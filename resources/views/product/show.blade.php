@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<style>
   .product-wish{
       position: absolute;
       top: 12%;
       left: 0;
       z-index: 99;
       right: 52%;
       text-align: right;
       padding-top: 0;
    }
    .product-wish .fa{
        color:#cbcbcb;
        font-size: 32px;
    }
    .product-wish .fa:hover{
       color:#ff7007;
    }
    .fill-heart{
        color:#ff7007 !important;
    }
</style>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
                </h5>
                <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
                <p class="card-text">
                <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                    <div class="row">
                        @csrf
                        <div class="col-auto">
                            <div class="input-group col-auto">
                                <div class="input-group-text">Quantity</div>
                                <input type="number" min="1" max="10" class="form-control quantity-input"
                                    name="quantity" value="1">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                        </div>

                    </div>
                </form>
                <div>&nbsp;</div>
                @auth
                <div class="product-wish">
                       <a href="#"><i class="fa fa-heart"></i></a>


                </div>
                @endauth
                </p>
            </div>
        </div>
    </div>
</div>
@endsection




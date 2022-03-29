@extends('layouts.app')
@section('content')

<h1>your wish list</h1>

<div class="container my-5">
    <div class= "card shadow">
        <div class="card-body">
           @If($wishlist->count() > 0)

           @else
               <h4>There are not products in your Wishlist</h4>
           @endif
        </div>
    </div>
</div>
@endsection

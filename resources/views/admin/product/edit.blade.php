@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        @lang('Edit Product')
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang("Name"):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Maker'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="maker" value="{{ $viewData['product']->getMaker() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Price'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Image'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Categoty'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="categoty" value="{{ $viewData['product']->getCategoty() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('Description'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="description" value="{{ $viewData['product']->getDescription() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">@lang('QuantifyAvailable'):</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="quantifyAvailable" value="{{ $viewData['product']->getQuantifyAvailable() }}" type="number"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">@lang('Edit')</button>
        </form>
    </div>
</div>
@endsection
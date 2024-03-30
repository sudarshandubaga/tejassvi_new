@extends('admin.layouts.afterlogin')

@section('title', 'Edit Product')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">
                Edit Product
            </h5>
            <div class="card-body">
                {{ Form::open(['url' => route('admin.product.update', $product), 'method' => 'PUT']) }}
                @include('admin.screens.product._form')
                <div>
                    <button class="btn btn-primary">Update</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

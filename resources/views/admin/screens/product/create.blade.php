@extends('admin.layouts.afterlogin')

@section('title', 'Add New Product')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">
                Add New Product
            </h5>
            <div class="card-body">
                {{ Form::open(['url' => route('admin.product.store')]) }}
                @include('admin.screens.product._form')
                <div>
                    <button class="btn btn-primary">Save &amp; Next</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

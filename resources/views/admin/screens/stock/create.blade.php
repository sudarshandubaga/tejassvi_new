@extends('admin.layouts.afterlogin')

@section('title', 'Add New Stock')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">
                Add New Stock
            </h5>
            <div class="card-body">
                {{ Form::open(['url' => route('admin.stock.store')]) }}
                @include('admin.screens.stock._form')
                {{-- <div>
                    <button class="btn btn-primary">Save</button>
                </div> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

@extends('admin.layouts.afterlogin')

@section('title', 'Add New Category')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">
                Add New Category
            </h5>
            <div class="card-body">
                {{ Form::open(['url' => route('admin.category.store')]) }}
                @include('admin.screens.category._form')
                <div>
                    <button class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

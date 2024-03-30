@extends('admin.layouts.afterlogin')

@section('title', 'Edit Seo Meta » ' . $seoMeta->page_slug)

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">
                Edit {{ $seoMeta->page_slug }}
            </h5>
            <div class="card-body">
                {{ Form::open(['url' => route('admin.seo-meta.update', $seoMeta), 'method' => 'PUT']) }}
                @include('admin.screens.seo_meta._form')
                <div>
                    <button class="btn btn-primary px-5">Update</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- /Content -->
@endsection

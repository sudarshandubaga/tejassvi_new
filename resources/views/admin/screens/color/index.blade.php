@extends('admin.layouts.afterlogin')

@section('title', 'Color')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add New</h3>
                        {{ Form::open(['url' => route('admin.color.store')]) }}
                        @include('admin.screens.color._form')
                        <div class="d-grid">
                            <button class="btn btn-primary">Save</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        @if ($colors->isEmpty())
                            <div>No data found.</div>
                        @else
                            <h5>
                                {{ $colors->firstItem() .
                                    ' to ' .
                                    $colors->lastItem() .
                                    ' of ' .
                                    $colors->total() .
                                    ' are showing.' }}
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colors as $key => $color)
                                            <tr>
                                                <td>
                                                    {{ $key + $colors->firstItem() }}
                                                </td>
                                                <td>
                                                    @if ($color->image)
                                                        <img src="{{ $color->image }}" alt="{{ $color->name }}"
                                                            class="img img-thumbnail">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $color->name }}
                                                </td>
                                                <td>
                                                    
                                                        <a href="{{ route('admin.color.edit', $color) }}" title="Edit"
                                                            class="btn btn-link">
                                                            <i class="bx bxs-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link text-danger btn-delete"
                                                            data-href="{{ route('admin.color.destroy', [$color]) }}">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        
                            <div class="mt-3">
                                {{ $colors->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- / Content -->
@endsection

@push('extra_styles')
@endpush

@push('extra_scripts')
@endpush

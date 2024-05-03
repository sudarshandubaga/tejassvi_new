@extends('admin.layouts.afterlogin')

@section('title', 'HSN / SAC')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Add New</h3>
                        {{ Form::open(['url' => route('admin.ware-house.store')]) }}
                        @include('admin.screens.ware-house._form')
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
                        @if ($wareHouses->isEmpty())
                            <div>No data found.</div>
                        @else
                            <h5>
                                {{ $wareHouses->firstItem() .
                                    ' to ' .
                                    $wareHouses->lastItem() .
                                    ' of ' .
                                    $wareHouses->total() .
                                    ' are showing.' }}
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th class="text-center">Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wareHouses as $key => $wareHouse)
                                            <tr>
                                                <td>
                                                    {{ $key + $wareHouses->firstItem() }}
                                                </td>
                                                <td>
                                                    {{ $wareHouse->name }}
                                                </td>
                                                <td>
                                                    {{ $wareHouse->address }}
                                                </td>
                                                <td>

                                                    <a href="{{ route('admin.ware-house.edit', $wareHouse) }}"
                                                        title="Edit" class="btn btn-link">
                                                        <i class="bx bxs-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-link text-danger btn-delete"
                                                        data-href="{{ route('admin.ware-house.destroy', [$wareHouse]) }}">
                                                        <i class="bx bx-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                {{ $wareHouses->links() }}
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

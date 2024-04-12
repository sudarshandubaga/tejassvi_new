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
                        {{ Form::open(['url' => route('admin.hsn.store')]) }}
                        @include('admin.screens.hsn._form')
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
                        @if ($hsns->isEmpty())
                            <div>No data found.</div>
                        @else
                            <h5>
                                {{ $hsns->firstItem() .
                                    ' to ' .
                                    $hsns->lastItem() .
                                    ' of ' .
                                    $hsns->total() .
                                    ' are showing.' }}
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">S.No.</th>
                                            <th rowspan="2">Code</th>
                                            <th colspan="3" class="text-center">GST</th>
                                            <th rowspan="2">Actions</th>
                                        </tr>
                                        <tr>
                                            <th>IGST</th>
                                            <th>CGST</th>
                                            <th>SGST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hsns as $key => $hsn)
                                            <tr>
                                                <td>
                                                    {{ $key + $hsns->firstItem() }}
                                                </td>
                                                <td>
                                                    {{ $hsn->code }}
                                                </td>
                                                <td>
                                                    {{ $hsn->gst }}%
                                                </td>
                                                <td>
                                                    {{ $hsn->gst / 2 }}%
                                                </td>
                                                <td>
                                                    {{ $hsn->gst / 2 }}%
                                                </td>
                                                <td>
                                                    
                                                        <a href="{{ route('admin.hsn.edit', $hsn) }}" title="Edit"
                                                            class="btn btn-link">
                                                            <i class="bx bxs-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link text-danger btn-delete"
                                                            data-href="{{ route('admin.hsn.destroy', [$hsn]) }}">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
        
                            <div class="mt-3">
                                {{ $hsns->links() }}
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

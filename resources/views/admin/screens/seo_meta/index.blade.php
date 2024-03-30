@extends('admin.layouts.afterlogin')

@section('title', 'Seo Meta')

@section('admin_content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <x-alert />
        <div class="card">
            <h5 class="card-header">View Seo Metas</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>URL</th>
                                <th>SEO Title</th>
                                <th>SEO Keywords</th>
                                <th>SEO Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($seo_metas as $key => $seo_meta)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $seo_meta->page_slug }}</td>
                                    <td>{{ $seo_meta->seo_title }}</td>
                                    <td>{{ $seo_meta->seo_keywords }}</td>
                                    <td>{{ $seo_meta->seo_description }}</td>
                                    <td>
                                        <a href="{{ route('admin.seo-meta.edit', $seo_meta) }}"
                                            class="btn btn-outline-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

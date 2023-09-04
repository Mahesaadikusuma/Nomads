@extends('layouts.admin')

@section('title', 'Gallery Travel')



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gallery Travel</h3>
                    <!-- <p class="text-subtitle text-muted">All Gallery Travel</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"></a>Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close border-0" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif





        <div class="button my-3">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary">+ Gallery Travel</a>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Gallery Travel</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Paket Travel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ assets(Storage::url($item->image)) }}" alt="image Travel"
                                                width="100" />
                                        </td>
                                        <td>{{ $item->travel_package->title }}</td>

                                        <td>
                                            <span
                                                onclick="event.preventDefault(); window.location.href='{{ route('gallery.edit', $item->id) }}' ";
                                                class="badge bg-success">update</span>


                                            <form action="{{ route('gallery.destroy', $item->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-warning my-2">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />

    <style>
        .bg-success {
            cursor: pointer;
        }
    </style>
@endpush

@push('after-script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endpush

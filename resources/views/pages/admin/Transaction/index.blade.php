@extends('layouts.admin')

@section('title', 'All Transaction')



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>All Transaction</h3>
                    <!-- <p class="text-subtitle text-muted">All Products</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"></a>Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">All Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        {{-- <div class="button my-3">
            <a href="{{ route('transaction.create') }}" class="btn btn-primary">+ Travel Package</a>
        </div> --}}

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">All Transaction</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-lg" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Paket Travel</th>
                                    <th>User</th>
                                    <th>visa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($Transaction as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->travel_package->title }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->additional_visa }}</td>
                                        <td>{{ $item->transactions_total }}</td>
                                        <td>{{ $item->trasactions_status }}</td>

                                        <td>
                                            <a href="{{ route('transaction.show', $item->id) }}">
                                                <span class="badge bg-primary">Show</span>
                                            </a>

                                            <a href="{{ route('transaction.edit', $item->id) }}">
                                                <span class="badge bg-success">update</span>
                                            </a>

                                            <form action="{{ route('transaction.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
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
@endpush

@push('after-script')
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endpush

@extends('layouts.admin')

@section('title', 'Detail Transaction')



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Transaction {{ $items->user->name }}</h3>
                    <!-- <p class="text-subtitle text-muted">All Products</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}"></a>Transaction</li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">Detail Transaction</div>
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- id="table1" --}}
                        <table class="table table-lg">

                            <tr>
                                <th>No.</th>
                                <td>{{ $items->id }}</td>
                            </tr>

                            <tr>
                                <th>Paket Travel</th>
                                <td>{{ $items->travel_package->title }}</td>
                            </tr>

                            <tr>
                                <th>User</th>
                                <td>{{ $items->user->name }}</td>
                            </tr>

                            <tr>
                                <th>Additional Visa</th>
                                <td>Rp. {{ $items->additional_visa }}</td>
                            </tr>

                            <tr>
                                <th>Transaction Total</th>
                                <td>Rp. {{ $items->transactions_total }}</td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>{{ $items->trasactions_status }}</td>
                            </tr>




                            {{-- Ini adalah transaction detail modelnya  --}}
                            <tr>
                                <th>Pembelian</th>

                                <table class="table table-bordered table-lg">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Nationality</th>
                                        <th>Visa</th>
                                        <th>DOE Passport</th>
                                    </tr>

                                    @foreach ($items->details as $detail)
                                        <tr>
                                            <td>{{ $detail->id }}</td>
                                            <td>{{ $detail->username }}</td>
                                            <td>{{ $detail->nasionality }}</td>
                                            <td>{{ $detail->is_visa ? '30 Days' : 'N / A' }}</td>
                                            <td>{{ $detail->doe_passport }}</td>
                                        </tr>
                                    @endforeach



                                </table>
                            </tr>
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

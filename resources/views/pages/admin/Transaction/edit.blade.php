@extends('layouts.admin')

@section('title', 'Edit Transaction')



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Transaction</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="product.html">Transaction</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Bootstrap Select end -->

        <!-- Basic choices start -->
        <section class="basic-choices">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Transaction {{ $items->title }}</h4>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('transaction.update', $items->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Title</label>
                                                <select class="form-select" name='trasactions_status' aria-label="">
                                                    <option selected value="{{ $items->trasactions_status }}">jangan di
                                                        ubah ({{ $items->trasactions_status }})
                                                    </option>
                                                    <option
                                                        value="IN_CART {{ old('transaction_status') === 'IN_CART' ? 'selected' : '' }}  ">
                                                        In
                                                        Cart
                                                    </option>

                                                    <option
                                                        value="PENDING {{ old('transaction_status') === 'PENDING' ? 'selected' : '' }}">
                                                        Pending</option>

                                                    <option
                                                        value="SUCCESS {{ old('transaction_status') === 'SUCCESS' ? 'selected' : '' }}">
                                                        Success</option>
                                                    <option
                                                        value="CANCEL {{ old('transaction_status') === 'CANCEL' ? 'selected' : '' }}">
                                                        Cancel</option>

                                                    <option
                                                        value="FAILED {{ old('transaction_status') === 'FAILED' ? 'selected' : '' }}">
                                                        Failed</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-12 d-flex justify-content-end my-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic choices end -->
    </div>
@endsection

@push('before-style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endpush

@push('after-style')
    <style>
        input[type="date"] {

            color-scheme: dark;
        }
    </style>
@endpush

@push('after-script')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>

    <script src="{{ asset('assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tinymce.js') }}"></script>
@endpush

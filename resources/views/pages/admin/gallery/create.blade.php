@extends('layouts.admin')

@section('title', 'Create Gallery Travel')


@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Gallery Travel</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Gallery Travel</li>
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
                            <h4 class="card-title">Tambah Gallery Travel</h4>
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
                                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="formFileMultiple" class="form-label">Input Gambar</label>
                                                <input class="form-control" type="file" id="formFileMultiple"
                                                    name="image" multiple />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="select-Product">Pilih Paket Travel</label>
                                                <select class="choices form-select" name="travel_package_id"
                                                    id="select-Product">

                                                    <option value="" selected>Pilih Product</option>
                                                    @foreach ($travel as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->title }}
                                                        </option>
                                                    @endforeach

                                                    {{-- <option value="square">Square</option>
                                                    <option value="rectangle">Rectangle</option>
                                                    <option value="rombo">Rombo</option>
                                                    <option value="romboid">Romboid</option>
                                                    <option value="trapeze">Trapeze</option>
                                                    <option value="traible">Triangle</option>
                                                    <option value="polygon">Polygon</option> --}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end my-2">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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



@push('after-script')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endpush

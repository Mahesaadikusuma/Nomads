@extends('layouts.admin')

@section('title', 'Edit Paket Travel')



@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Paket Travel</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="product.html">Paket Travel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Paket Travel</li>
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
                            <h4 class="card-title">Edit Paket Travel {{ $items->title }}</h4>
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

                                <form action="{{ route('travel-package.update', $items->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Title</label>
                                                <input type="text" id="first-name-vertical" name='title'
                                                    class="form-control @error('title') is-invalid @enderror" name="name"
                                                    value="{{ $items->title }}" placeholder="Title" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" id="location"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    name="location" value="{{ $items->location }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="featured_event">Featured Event</label>
                                                <input type="text" id="featured_event"
                                                    class="form-control @error('featured_event') is-invalid @enderror"
                                                    name="featured_event" value="{{ $items->featured_event }}"
                                                    placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="language">Language</label>
                                                <input type="text" id="language"
                                                    class="form-control @error('language') is-invalid @enderror"
                                                    name="language" value="{{ $items->language }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="food">Food</label>
                                                <input type="text" id="food"
                                                    class="form-control @error('food') is-invalid @enderror" name="food"
                                                    value="{{ $items->food }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="departure_date">Departure Date</label>
                                                <input type="date" id="departure_date"
                                                    class="form-control @error('departure_date') is-invalid @enderror"
                                                    name="departure_date" value="{{ $items->departure_date }}"
                                                    placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="duration">Duration</label>
                                                <input type="text" id="duration"
                                                    class="form-control @error('duration') is-invalid @enderror"
                                                    name="duration" value="{{ $items->duration }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="Type">Type</label>
                                                <input type="text" id="Type"
                                                    class="form-control @error('type') is-invalid @enderror" name="type"
                                                    value="{{ $items->type }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    name="price" value="{{ $items->price }}" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="col-12 my-2">
                                            <div class="form-group">
                                                <label for="dark">About</label>
                                                <textarea id="dark" name="about" class="@error('about') is-invalid @enderror" cols="30" rows="20"
                                                    value="">
                                                    {{ $items->about }}  
                                                </textarea>
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

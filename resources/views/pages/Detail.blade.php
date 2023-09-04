@extends('layouts.app')

@section('title', 'Nomads Details - Explore The Beautiful World As Easy One Click')


@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>

                            @if ($item->gallery->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->gallery->first()->image) }}"
                                            class="xzoom mb-3 w-100" id="xzoom-default"
                                            xoriginal=" {{ Storage::url($item->gallery->first()->image) }}" />
                                    </div>

                                    <div class="xzoom-thumbs">
                                        @foreach ($item->gallery as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery"
                                                    width="128" xpreview="{{ Storage::url($gallery->image) }}" />
                                            </a>
                                        @endforeach


                                    </div>
                                </div>
                            @endif




                            <h2>Tentang Wisata</h2>
                            <p>
                                {!! $item->about !!}
                            </p>


                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="{{ asset('frontend/image/features/ic_event.png') }}" alt="Featured"
                                        class="featured-image" />
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ asset('frontend/image/features/ic_language.png') }}" alt="Featured"
                                        class="featured-image" />
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>Bahasa {{ $item->language }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ asset('frontend/image/features/ic_foods.jpg') }}" alt="Featured"
                                        class="featured-image" />
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $item->food }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ asset('frontend/image/features/members (1).png') }}" alt=""
                                    class="members-image mr-1" />

                                <img src="{{ asset('frontend/image/features/members (4).png') }}" alt=""
                                    class="members-image mr-1" />

                                <img src="{{ asset('frontend/image/features/members (6).png') }}" alt=""
                                    class="members-image mr-1" />

                                <img src="{{ asset('frontend/image/features/members (8).png') }}" alt=""
                                    class="members-image mr-1" />

                                <img src="{{ asset('frontend/image/features/members(9).png') }}" alt=""
                                    class="members-image mr-1" />
                            </div>

                            <hr />
                            <h2>Trip Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th style="width: 50%">Date of Departure</th>
                                    <td style="width: 50%" class="text-right">{{ $date }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Duration</th>
                                    <td style="width: 50%" class="text-right">{{ $item->duration }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Type</th>
                                    <td style="width: 50%" class="text-right">{{ $item->type }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Price</th>
                                    <td style="width: 50%" class="text-right">Rp {{ number_format($item->price) }}/ person
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout-proses', $item->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">Join Now</button>
                                </form>

                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">Login Or Register
                                    In Here</a>
                            @endguest
                        </div>



                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@push('before-style')
    <link rel="stylesheet" href="{{ asset('frontend/libraries/xZoom/xzoom.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('frontend/libraries/xZoom/dist/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".xzoom, .xzoom-gallery").xzoom({
                zoomWidth: 500,
                zoomHeight: 300,
                title: false,
                tint: "#333",
                Xoffset: 15,
            });
        });
    </script>
@endpush

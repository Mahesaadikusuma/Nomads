@extends('layouts.app')

@section('title', 'Nomads - Explore The Beautiful World As Easy One Click')

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>
            Explore The Beautiful World <br />
            As Easy One Click
        </h1>

        <p class="mt-3">
            You will see beautiful <br />
            moment you never see before
        </p>

        <a href="#popular" class="btn btn-get-started px-5 py-2 mt-4">Get Started</a>
    </header>

    <!-- STATISTIC -->
    <main>
        <div class="container section-stats-container">
            <section class="section-stats row justify-content-center" id="stats">
                <x-status type="20k" message="Members" />
                <x-status type="12" message="Countries" />
                <x-status type="3K" message="Hotels" />
                <x-status type="72" message="Partners" />
            </section>
        </div>

        <!-- POPULAR -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>
                            Something that you never try <br />
                            before in this world
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ $item->gallery->count() ? Storage::url($item->gallery->first()->image) : '' }}')">
                                {{-- {{ $item->gallery->count() ? Storage::url($items->gallery->first()->image) : '' }} --}}
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>

                                <div class="travel-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4"> View
                                        Details </a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

        <!-- Network -->
        <section class="section-networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us <br />
                            More than just a trip
                        </p>
                    </div>

                    <div class="col-md-8">
                        <img src="{{ asset('frontend/image/Logo Network/logos_partner.png') }}" alt="img-patner" />
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving US</h2>
                        <p>
                            Moment Ware Giving Them <br />
                            The Best Experence
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ asset('frontend/image/Testimonial3.jpg') }}" alt="user"
                                    class="mb-4 rounded-circle" />
                                <h3 class="mb-3">Mahesa Adi Kusuma</h3>
                                <p class="testimonial">“ It was glorious and I could not stop to say wohooo for every
                                    single moment Dankeeeeee “</p>
                            </div>
                            <hr />
                            <p class="trip-to mt-2">Trip to Ubud</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ asset('frontend/image/testimonial.png') }}" alt="user"
                                    class="mb-4 rounded-circle" />
                                <h3 class="mb-3">Madelyn Levin</h3>
                                <p class="testimonial">“ The trip was amazing and I saw something beautiful in that
                                    Island that makes me want to learn more “</p>
                            </div>
                            <hr />

                            <p class="trip-to mt-2">Trip to Nusa Peninda</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ asset('frontend/image/Testimonial2.png') }}" alt="user"
                                    class="mb-4 rounded-circle" />
                                <h3 class="mb-3">Madelyn</h3>
                                <p class="testimonial">“I loved when the waves was shaking harde ~ I was scared too”
                                </p>
                            </div>
                            <hr />

                            <p class="trip-to mt-2">Trip to Karimun Jawa</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ asset('frontend/image/Testimonial2.png') }}" alt="user"
                                    class="mb-4 rounded-circle" />
                                <h3 class="mb-3">Madelyn</h3>
                                <p class="testimonial">“I loved when the waves was shaking harde ~ I was scared too”
                                </p>
                            </div>
                            <hr />

                            <p class="trip-to mt-2">Trip to Karimun Jawa</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
                        <a href="{{ route('login') }}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@extends('layouts.app')

@section('title', 'Checkout - Nomads')


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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            


                            <h1>Who is Going?</h1>
                            <p>Trip to {{ $item->travel_package->title }} , {{ $item->travel_package->location }}</p>

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr class="">
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                            <tr>
                                                <td>
                                                    {{-- asset('frontend/image/features/avatar 1.png') --}}
                                                    <img src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                                                        alt="avatar-user" height="60" class="rounded-circle" />
                                                    <!-- <img src="image/features/avatar 2.png" alt="" /> -->
                                                </td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">{{ $detail->nasionality }}</td>
                                                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::createFromDate() > \Carbon\Carbon::now() ? 'Active' : 'InActive' }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ asset('frontend/image/features/ic_remove-1@2x.jpg') }}"
                                                            alt="" style="width: 18px; height: 18px" />
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No visitor</td>
                                            </tr>
                                        @endforelse



                                    </tbody>
                                </table>
                            </div>

                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}" class="form-inline">
                                    @csrf

                                    <label for="username" class="sr-only">Name</label>
                                    <input type="text" class="form-control mb-2 me-sm-2" name="username" id="username"
                                        placeholder="Username" />

                                    <label for="nasionality" class="sr-only">Nasionality</label>
                                    <input type="text" class="form-control mb-2 me-sm-2" name="nasionality"
                                        id="nasionality" placeholder="nasionality" style="width: 50px;" />

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" id="is_visa" required class="custom-select mb-2 ml-sm-2">
                                        <option value="" selected>Visa</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N / A</option>
                                    </select>

                                    <label class="sr-only" for="doePassport">DOE Passport</label>
                                    <div class="input-group mb-2 ml-md-2">
                                        <input type="text" class="form-control datepicker" id="doePassport"
                                            name='doe_passport' placeholder="DOE Passport" required />
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4 ml-lg-2 ml-md-1 ml-sm-1">Add
                                        Now</button>
                                </form>

                                <h3 class="mt-3 mb-0 note">Note</h3>
                                <p class="disclamer mb-0">You are only able to invite member that has registered in Nomads.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th style="width: 50%">Members</th>
                                    <td style="width: 50%" class="text-right">{{ $item->details->count() }} person</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Additional VISA</th>
                                    <td style="width: 50%" class="text-right">Rp
                                        {{ number_format($item->additional_visa) }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Trip Price</th>
                                    <td style="width: 50%" class="text-right">Rp.
                                        {{ number_format($item->travel_package->price) }} /
                                        person
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Sub Total</th>
                                    <td style="width: 50%" class="text-right">Rp.
                                        {{ number_format($item->transactions_total) }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 50%">Total (+Unique)</th>
                                    <td style="width: 50%" class="text-right text-total">
                                        <span class="text-blue">Rp. {{ number_format($item->transactions_total) }},</span>
                                        <span class="text-orange">{{ mt_rand(0, 99) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr />

                            <h2>Payment Instructions</h2>
                            <p class="disclamer payment-instructions">Please complete your payment before to continue the
                                wonderful trip</p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{ asset('frontend/image/features/ic_bank@2x.jpg') }}" alt=""
                                        class="bank-image" />
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0881 8829 8800
                                            <br />
                                            Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="bank-item pb-3">
                                    <img src="{{ asset('frontend/image/features/ic_bank@2x.jpg') }}" alt=""
                                        class="bank-image" />
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>
                                            0899 8501 7888
                                            <br />
                                            Bank HSBC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="join-container">
                            <a href="{{ route('checkout-success', $item->id) }}"
                                class="btn btn-block btn-join-now mt-3 py-2">I Have
                                Made
                                Payment</a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->travel_package->slug) }} " class="text-muted"> Cancel
                                Booking </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@push('before-style')
    <!-- GIJGO -->
    <link rel="stylesheet" href="{{ asset('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
@endpush

@push('after-script')
    <script src="{{ asset('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: "bootstrap4",
                icons: {
                    rightIcon: '<img src="{{ asset('frontend/image/features/ic_doe.png') }}" alt="" />',
                },
            });
        });
    </script>
@endpush

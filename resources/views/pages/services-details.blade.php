@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
<!-- Start Main Section -->
<section class="services-details">
    <div class="services-details-card d-flex flex-column justify-content-center" data-aos="fade-up">
        <div class="container position-relative z-1">
            <div class="row align-items-center">
                <div class="col-12 d-flex flex-column justify-content-center text-center">
                    <h2 class="title-main-section">{{ $service['title'] }}</h2>
                    <p class="services-details-description mt-3">
                        {{ $service['description'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Services Details Section -->
<section class="details">
    <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right-top" />

    {{-- <div class="we-offer position-relative" data-aos="fade-right">
            <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Top Left" class="decor-top-left" />
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="title-main-section m-0">What We Offer</h3>
                <ul class="mt-4">
                    @foreach ($service['offers'] as $offer)
                    <li>{{ $offer }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="we-offer-img col-12 col-md-4 d-flex justify-content-end align-items-center">
                <img src="{{ asset('assets/imgs/' . $service['offer_image']) }}" alt="Project Image"
                    class="img-fluid custom-natural-img" />
            </div>
        </div>
    </div>
    </div> --}}

    <!-- Steps -->
    <div class="steps mt-5" data-aos="fade-up">
        <div class="container">
            <h3 class="title-main-section">خطواتنا</h3>

            <div class="steps-cards mt-5">
                @foreach ($service['steps'] as $index => $step)
                <div class="step-card mt-3" data-aos="{{ $index % 2 === 0 ? 'fade-right' : 'fade-left' }}">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <ul class="step-desc-list">
                                <li class="step-title">{{ $step['title'] }}</li>

                                @foreach ($step['description'] as $point)
                                <li class="step-desc">{{ $point }}</li>
                                @endforeach
                            </ul>

                        </div>
                        {{-- <div class="col-12 col-md-2 d-flex justify-content-end align-items-center we-offer-img">
                                    <img src="{{ asset('assets/imgs/' . $step['img']) }}" alt="{{ $step['title'] }}"
                        class="img-fluid custom-natural-img" />
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>


    <div class="mt-5"></div>
    @include('partials.index.contact-us')
</section>
@endsection
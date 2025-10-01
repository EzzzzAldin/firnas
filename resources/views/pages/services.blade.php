@extends('layouts.app')

@section('title', 'Services')

@section('content')
<section class="services-main-section">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

    <div class="container position-relative z-1">
        <h2 class="title-main-section text-center" data-aos="fade-up">الخدمات</h2>
    </div>

    <div class="container py-5">
        @php
        $services = [
        'التسويق الإلكتروني',
        'التسويق غير الإلكتروني',
        'الاستشارات التجارية',
        'البراندنج',
        'التسويق الإلكتروني',
        'الفعاليات',
        'البرمجيات',
        ];

        @endphp

        @foreach ($serviceCategories as $category)
        <div class="services-card mt-5">
            <div class="row">
                <div class="col-12 col-md-7" data-aos="fade-right">

                    <div class="d-flex align-items-center gap-3 d-md-none mb-3 justify-content-between">
                        <h4 class="services-title mb-0">{{ $category['category_title'] }}</h4>
                        <div class="services-img-wrapper-mobile">
                            <img src="{{ asset('assets/imgs/' . $category['category_image-mobile']) }}"
                                alt="Image" class="img-fluid" />
                        </div>
                    </div>
                    <h4 class="services-title d-none d-md-block">{{ $category['category_title'] }}</h4>

                    <p class="mt-2">{{ $category['category_description'] }}</p>
                    <ul class="custom-list list-unstyled">
                        <li class="tilte-ul">تضمن :</li>
                        @foreach ($category['services'] as $item)
                        <a href="{{ route('services.details', $item['id']) }}"
                            class="text-decoration-none text-reset">
                            <li
                                class="d-flex justify-content-between align-items-center gap-3 responsive-li mt-4">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('assets/imgs/campaign.webp') }}" alt="Icon"
                                        class="icon-img" />
                                    <span class="list-title">{{ $item['title'] }}</span>
                                </div>
                                <i class="fas fa-chevron-right arrow-icon"></i>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <div class="services-img-parent col-12 col-md-5 d-flex justify-content-md-end justify-content-center d-none d-md-block"
                    data-aos="fade-left">
                    <div class="services-img-wrapper">
                        <img src="{{ asset('assets/imgs/' . $category['category_image']) }}" alt="Image"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
@endsection
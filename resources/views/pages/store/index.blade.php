@extends('layouts.app')

@section('title', 'Store - Firnas')

@section('content')
    <section class="store-main services-main-section">

        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1">
            <h2 class="title-main-section text-center" data-aos="fade-up">الاشتراكات</h2>
        </div>

        <div class="container my-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-store mb-5 text-center">
                        <a href="{{ route('store.category', 1) }}">
                            <img src="{{ asset('assets/imgs/image 2.png') }}" class="img-fluid w-100"
                                alt="Category Image" />
                        </a>
                        <h5 class="mt-3">
                            <a href="{{ route('store.category', 1) }}" class="text-decoration-none title-store">
                                الخدمات البرمجية
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection

@extends('layouts.app')

@section('title', 'Service Category - Firnas')

@section('content')
    <section class="store-main services-main-section">

        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1">
            <h2 class="title-main-section text-center" data-aos="fade-up">البرمجة</h2>
        </div>

        <div class="container my-5">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 1) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التسويق">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 1) }}" class="text-decoration-none text-end">
                                    خدمات التسويق
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                الـ CRM هو نظام بيساعد الشركات تدير علاقتها بالعملاء، تابع الوسائط، وحسّن تجربة العميل عشان
                                تزود مبيعات الشركة
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 2) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التصميم">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 2) }}" class="text-decoration-none text-end">
                                    خدمات التصميم
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                تصميم احترافي للشعارات وواجهات المستخدم يساعد على إبراز هوية شركتك بشكل مميز ويشد العملاء
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 1) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التسويق">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 1) }}" class="text-decoration-none text-end">
                                    خدمات التسويق
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                الـ CRM هو نظام بيساعد الشركات تدير علاقتها بالعملاء، تابع الوسائط، وحسّن تجربة العميل عشان
                                تزود مبيعات الشركة
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 2) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التصميم">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 2) }}" class="text-decoration-none text-end">
                                    خدمات التصميم
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                تصميم احترافي للشعارات وواجهات المستخدم يساعد على إبراز هوية شركتك بشكل مميز ويشد العملاء
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 1) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التسويق">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 1) }}" class="text-decoration-none text-end">
                                    خدمات التسويق
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                الـ CRM هو نظام بيساعد الشركات تدير علاقتها بالعملاء، تابع الوسائط، وحسّن تجربة العميل عشان
                                تزود مبيعات الشركة
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 2) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التصميم">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 2) }}" class="text-decoration-none text-end">
                                    خدمات التصميم
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                تصميم احترافي للشعارات وواجهات المستخدم يساعد على إبراز هوية شركتك بشكل مميز ويشد العملاء
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 1) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التسويق">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 1) }}" class="text-decoration-none text-end">
                                    خدمات التسويق
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                الـ CRM هو نظام بيساعد الشركات تدير علاقتها بالعملاء، تابع الوسائط، وحسّن تجربة العميل عشان
                                تزود مبيعات الشركة
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card-cat mb-5 h-100 text-end">
                        <a href="{{ route('store.service', 2) }}">
                            <img src="{{ asset('assets/imgs/image 5.png') }}" class="card-img-top" alt="خدمات التصميم">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('store.service', 2) }}" class="text-decoration-none text-end">
                                    خدمات التصميم
                                </a>
                            </h5>
                            <p class="card-text text-end">
                                تصميم احترافي للشعارات وواجهات المستخدم يساعد على إبراز هوية شركتك بشكل مميز ويشد العملاء
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

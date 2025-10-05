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

                @forelse ($service->products as $item)
                    <div class="col-md-3 col-sm-6">
                        <div class="card-cat mb-5 h-100 text-end">
                            <a href="{{ route('store.service', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="خدمات التسويق">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('store.service', $item->id) }}" class="text-decoration-none text-end">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <p class="card-text text-end">
                                    {{ \Illuminate\Support\Str::limit($item->dis, 50) }}
                                </p>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>

@endsection

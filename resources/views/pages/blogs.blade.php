@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <section class="blogs-main-section">
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right-top" />
        <img src="{{ asset('assets/imgs/IMG_5148-Photoroom.png') }}" alt="Decor" class="decor-image position-absolute" />

        <div class="container position-relative z-1" data-aos="fade-left">
            <h2 class="title-main-section text-center">From Our Studio</h2>
            <p class="text-center mt-4">
                Stories, lessons, and ideas we're excited to share — all from our team to you.
            </p>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                @foreach ($blogs as $index => $blog)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card custom-blog-card h-100 shadow-sm border-0"
                            data-aos="{{ $index % 2 === 0 ? 'fade-down' : 'fade-up' }}">
                            <img src="{{ asset('assets/imgs/' . $blog['image']) }}" class="card-img-top" alt="Blog Image" />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title bold-text">{{ $blog['title'] }}</h5>
                                <hr class="divider" />
                                <div class="d-flex align-items-center mb-2 small text-muted gap-2 flex-wrap">
                                    <img src="{{ asset('assets/imgs/' . $blog['avatar']) }}" class="rounded-circle"
                                        width="40" height="40" alt="avatar" />
                                    <span class="writer">{{ $blog['writer'] }}</span>
                                    <span class="info-blog d-flex align-items-center justify-content-between w-100 mt-3">
                                        <span class="info-blog-date">{{ $blog['date'] }}</span>
                                        {{-- <span class="info-blog-comment">
                                            <i class="fa-regular fa-comments"></i> {{ $blog['comments'] }} comments
                                        </span> --}}
                                    </span>
                                </div>
                                <p class="card-text">
                                    {{ $blog['text'] }}
                                </p>
                                <a href="{{ route('blogs.details', $blog['id']) }}"
                                    class="btn btn-link px-0 text-decoration-none text-teal mt-auto align-self-start">View
                                    Post</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

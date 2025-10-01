@extends('layouts.app')

@section('content')
    <section class="blogs-details-section">
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="bottom Left" class="decor-bottom-left" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container py-5">
            <div class="blog-detail-card" data-aos="fade-up">
                <img src="{{ asset('assets/imgs/' . $blog['image']) }}" alt="Blog Cover" class="img-fluid blog-main-img" />
                <div class="d-flex flex-wrap align-items-center justify-content-between blog-meta gap-2 mt-3">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('assets/imgs/' . $blog['avatar']) }}" class="rounded-circle author-avatar"
                            alt="avatar" />
                        <span class="writer">{{ $blog['writer'] }}</span>
                    </div>
                    <div class="info-blog d-flex align-items-center gap-3">
                        <span>{{ $blog['date'] }}</span>
                        {{-- <span><i class="fa-regular fa-comments"></i> {{ $blog['comments'] }} comments</span> --}}
                    </div>
                </div>
            </div>

            <div class="body-blog mt-5">
                <div class="row">
                    <div class="col-12 col-md-8" data-aos="fade-right">
                        <h4 class="bold-text">{{ $blog['title'] }}</h4>
                        <p class="p-details mt-4">
                            {{ $blog['text'] }}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 categories" data-aos="fade-left">
                        <h4 class="bold-text">Categories</h4>
                        <div class="privacy-list-container mt-4">
                            <ul class="privacy-list">
                                @php
                                    $categories = [
                                        'Branding',
                                        'Marketing',
                                        'Software',
                                        'Sharing data with external parties',
                                        'Cookies',
                                        'Security and Data Protection',
                                        'User Rights',
                                        'Changes to the Privacy Policy',
                                    ];
                                @endphp

                                @foreach ($categories as $category)
                                    <li class="bold-text">
                                        <a href="{{ route('blogs.category', $category) }}"
                                            class="text-decoration-none text-dark">
                                            {{ $category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="suggestions mt-5">
                <h4 class="bold-text title-sug" data-aos="fade-up">Suggestions</h4>
                <div class="row g-4 mt-4">
                    @foreach ($suggestions as $i => $suggestion)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card custom-blog-card h-100 shadow-sm border-0"
                                data-aos="fade-{{ $i % 2 === 0 ? 'up' : 'down' }}">
                                <img src="{{ asset('assets/imgs/' . $suggestion['image']) }}" class="card-img-top"
                                    alt="..." />
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title bold-text">{{ $suggestion['title'] }}</h5>
                                    <hr class="divider" />
                                    <div class="d-flex align-items-center mb-2 small text-muted gap-2 flex-wrap">
                                        <img src="{{ asset('assets/imgs/' . $suggestion['avatar']) }}"
                                            class="rounded-circle" width="40" height="40" alt="avatar" />
                                        <span class="writer">{{ $suggestion['writer'] }}</span>
                                        <span
                                            class="info-blog d-flex align-items-center justify-content-between w-100 mt-3">
                                            <span>{{ $suggestion['date'] }}</span>
                                            {{-- <span><i class="fa-regular fa-comments"></i> {{ $suggestion['comments'] }}
                                                comments</span> --}}
                                        </span>
                                    </div>
                                    <p class="card-text">{{ $suggestion['text'] }}</p>
                                    <a href="{{ route('blogs.details', $suggestion['id']) }}"
                                        class="btn btn-link px-0 text-decoration-none text-teal mt-auto align-self-start">View
                                        Post</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Learn')

@section('content')
    <section class="portfolio-main-section build">
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1">
            <h2 class="title-main text-center">Build Your Strategy With Us</h2>
            <p class="text-center mt-4 m-auto w-75">
                Practical video guides to help you master marketing strategy, step by
                step From research to planning to execution — watch, learn, and apply
            </p>
        </div>

        <div class="container py-5">
            <div class="row g-4">
                @foreach ($videos as $index => $video)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="video-card">
                            <img src="{{ asset($video['thumbnail']) }}" alt="Video Thumbnail" />
                            <button class="play-button" data-bs-toggle="modal"
                                data-bs-target="#videoModal{{ $index }}">
                                <i class="fa-solid fa-play"></i>
                            </button>
                            <div class="video-body">
                                <div class="video-title bold-text">
                                    {{ $video['title'] }}
                                </div>
                                <div class="video-info">
                                    <i class="fa-solid fa-clock"></i>
                                    <span>{{ $video['duration'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modals -->
        @foreach ($videos as $index => $video)
            <div class="modal fade" id="videoModal{{ $index }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-black">
                        <div class="modal-body p-0 position-relative">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-3"
                                data-bs-dismiss="modal" aria-label="Close" style="z-index: 9999;"></button>
                            <video id="popupVideo{{ $index }}" controls autoplay muted class="w-100"
                                style="max-height: 500px">
                                <source src="{{ asset($video['video']) }}" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </section>
@endsection

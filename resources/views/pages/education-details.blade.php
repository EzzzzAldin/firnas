@extends('layouts.app')

@section('title', 'Education Details')

@section('content')
    <section class="portfolio-main-section">
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1">
            <h2 class="title-main text-center">Eduction</h2>
            <p class="text-center mt-3">
                Discover our hand-picked marketing books, guides, and resources — ready
                to read or download for free.
            </p>

            <div class="eduction eduction-livewire">
                @livewire('education-filter')
            </div>
        </div>
    </section>
@endsection

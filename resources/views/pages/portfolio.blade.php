@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
    <section class="portfolio-main-section">
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1">
            <h2 class="title-main-section text-center" data-aos="fade-up">
                أعمالنا الإبداعية عبر مختلف الصناعات
            </h2>
            <p class="text-center mt-4" data-aos="fade-up">
                مجموعة مختارة من أفضل مشاريعنا في البراندنج والبرمجيات والتسويق عبر مختلف الصناعات
            </p>

            @livewire('portfolio-filter')
        </div>
    </section>
@endsection

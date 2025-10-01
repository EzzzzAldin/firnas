@extends('layouts.app')

@section('title', 'Portfolio Details')

@section('content')
    <section class="portfolio-details">
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container position-relative z-1 portfolio-details">
            <div class="row custom-portfolio-card align-items-stretch" data-aos="fade-right">
                <div class="col-md-6 custom-card-text d-flex flex-column justify-content-center">
                    <h2 class="custom-card-title title-main-section">{{ $project['title'] }}</h2>
                    <p class="custom-card-description mt-3">
                        {{ $project['description'] }}
                    </p>
                </div>
                <div class="col-md-6 custom-card-image d-flex flex-column justify-content-between">
                    <div class="custom-image-wrapper position-relative h-100">
                        <img src="{{ asset('assets/imgs/' . $project['main_image']) }}" alt="Project Image"
                            class="img-fluid w-100 h-100 object-fit-contain" />
                        @if ($project['category'] === 'انظمة برمجية')
                            <a href="{{ $project['url'] }}" target="_blank"
                                class="btn btn-primary custom-card-button d-inline-flex align-items-center gap-2">
                                زيارة الموقع
                                <img src="{{ asset('assets/imgs/external-link 1.webp') }}" alt="Visit Website Icon"
                                    class="visit-icon-img" />
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- <div class="row info-data mt-5" data-aos="fade-left">
                @foreach ($project['stats'] as $percent => $text)
                    @php
                        $numeric = preg_replace('/[^\d]/', '', $percent);
                        $hasPercent = Str::contains($percent, '%');
                    @endphp
                    <div class="col-12 col-md-3 mt-5 text-center">
                        <h4 class="bold-text counter" data-target="{{ $numeric }}"
                            data-percent="{{ $hasPercent ? 'true' : 'false' }}">
                            0{{ $hasPercent ? '%' : '' }}
                        </h4>
                        <p>{{ $text }}</p>
                    </div>
                @endforeach
            </div> --}}

            <div class="comparison mt-5">
                <h2 class="title-main text-center" data-aos="fade-right">{{ $project['sec-title'] }}</h2>
                <div class="row mt-5">
                    @php
                        $allImages = array_merge($project['before_images']);
                    @endphp

                    @if ($project['category'] === 'التسويق' || $project['category'] === 'العلامة التجارية')
                        @foreach ($allImages as $img)
                            <div class="col-12 mb-4">
                                <img src="{{ asset('assets/imgs/' . $img) }}" alt="Image"
                                    class="w-100 open-modal view-marking"
                                    style="height: 520px; object-fit: cover; border-radius: 8px; cursor: pointer"
                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-img="{{ asset('assets/imgs/' . $img) }}">
                            </div>
                        @endforeach
                    @elseif ($project['category'] === 'الانتاج الاعلاني')
                        @foreach ($allImages as $img)
                            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                {{-- <img src="{{ asset('assets/imgs/' . $img) }}" alt="Image" class="w-100 open-modal"
                                    style="height: 405px; object-fit: cover; border-radius: 8px; cursor: pointer"
                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-img="{{ asset('assets/imgs/' . $img) }}"> --}}

                                <div style="position: relative; height: 405px; border-radius: 8px; overflow: hidden;">
                                    <iframe width="100%" height="100%"
                                        src="{{ str_replace('watch?v=', 'embed/', $img) }}" title="YouTube video"
                                        style="border: 0; border-radius: 8px;"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                                    </iframe>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($allImages as $i => $img)
                                    <div class="carousel-item @if ($i === 0) active @endif">
                                        <div class="text-center px-2">
                                            <img src="{{ asset('assets/imgs/' . $img) }}" alt="Slide {{ $i + 1 }}"
                                                class="carousel-image open-modal" data-bs-toggle="modal"
                                                data-bs-target="#imageModal" data-img="{{ asset('assets/imgs/' . $img) }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="carousel-indicators custom-indicators position-static mt-3">
                                @foreach ($allImages as $i => $img)
                                    <button type="button" data-bs-target="#imageCarousel"
                                        data-bs-slide-to="{{ $i }}"
                                        class="@if ($i === 0) active @endif"
                                        aria-current="@if ($i === 0) true @endif"
                                        aria-label="Slide {{ $i + 1 }}"></button>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    @if ($project['category'] === 'Software')
                        @php
                            $icon = 'Correct.svg';
                            $mergedList = array_merge($project['before_list'], $project['after_list']);
                            $half = ceil(count($mergedList) / 2);
                            $leftColumn = array_slice($mergedList, 0, $half);
                            $rightColumn = array_slice($mergedList, $half);
                        @endphp

                        <div class="row comparison-list mt-4">
                            <div class="col-12 col-md-4">
                                <ul class="list-unstyled">
                                    @foreach ($leftColumn as $item)
                                        <li class="comparison-list-item d-flex align-items-center mb-2">
                                            <img src="{{ asset('assets/imgs/' . $icon) }}" alt="✓"
                                                class="comparison-icon me-2" style="width: 18px; height: 18px;">
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 col-md-4"></div>
                            <div class="col-12 col-md-4">
                                <ul class="list-unstyled">
                                    @foreach ($rightColumn as $item)
                                        <li class="comparison-list-item d-flex align-items-center mb-2">
                                            <img src="{{ asset('assets/imgs/' . $icon) }}" alt="✓"
                                                class="comparison-icon me-2" style="width: 18px; height: 18px;">
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="ready mt-5 d-none" data-aos="fade-left">
                <h2 class="title-main text-center">Have a website that needs a facelift?</h2>
                <a href="#" class="btn btn-primary custom-ready-button d-inline-flex align-items-center gap-2 mt-5">
                    Let’s Talk Redesign
                </a>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center p-0">
                    <img src="" id="modalImage" class="img-fluid rounded" alt="Full Image">
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const hasPercent = counter.getAttribute('data-percent') === 'true';

                let count = 0;
                const duration = 2000;
                const steps = 60;
                const increment = Math.ceil(target / steps);
                const interval = duration / steps;

                const updateCounter = () => {
                    count += increment;
                    if (count >= target) {
                        counter.textContent = target + (hasPercent ? '%' : '');
                    } else {
                        counter.textContent = count + (hasPercent ? '%' : '');
                        setTimeout(updateCounter, interval);
                    }
                };

                updateCounter();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalImage = document.getElementById('modalImage');
            const modalTriggers = document.querySelectorAll('.open-modal');

            modalTriggers.forEach(img => {
                img.addEventListener('click', function() {
                    const fullImg = this.getAttribute('data-img');
                    modalImage.setAttribute('src', fullImg);
                });
            });
        });
    </script>


@endsection

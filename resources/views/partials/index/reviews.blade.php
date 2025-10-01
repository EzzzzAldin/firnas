<section class="clients-review d-none" data-aos="fade-up">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />

    <h2 class="title-main text-center">آراء عملائنا</h2>

    <div class="container mt-5">
        <div class="row d-flex align-items-stretch">
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-4 mt-5 position-relative d-flex">
                <div class="main-review d-flex flex-column position-relative w-100 h-100">
                    <div class="overlay-review"></div>
                    <h4 class="bold-text">Dr Amany</h4>
                    <p>
                        Core Clinic provides expert physical therapy and rehabilitation for pain relief, recovery, and
                        improved mobility—through personalized programs and advanced techniques.
                    </p>

                    <a href="https://www.youtube.com/watch?v=a6L-Zd-TUaQ&list=PLywfVCpvOwMkSlyblt0Pn-JEiH4hUU33h&index=1"
                        target="_blank" class="d-block w-100 h-100">
                        <div class="video-box flex-grow-1">
                            <video autoplay controls muted playsinline class="w-100 h-100 object-fit-contain "
                                id="myVideo">
                                <source src="{{ asset('assets/imgs/test3.mp4') }}" type="video/mp4" class="customV" />
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-12 col-md-1"></div>

            <div class="cards-review col-12 col-md-4 mt-5 position-relative d-flex">
                <div class="overlay-review"></div>
                <div class="container mt-5 w-100">
                    <div class="row cards gy-4 overflow-auto" style="max-height: 100%;">
                        @php
                            $cards = [
                                // [
                                // 'image' => 'clientsr4.webp',
                                // 'name' => 'Abdelrahman Zahran',
                                // 'text' => 'Z‑Card Egypt offers up to 80% discounts on healthcare and lifestyle services through a trusted network across Egypt and MENA.',
                                // 'link' => asset('assets/imgs/test4.mp4'),
                                // ],
                                [
                                    'image' => 'clientsr2.webp',
                                    'name' => 'Dr Amany',
                                    'text' =>
                                        'Core Clinic provides expert physical therapy and rehabilitation for pain relief, recovery, and improved mobility—through personalized programs and advanced techniques.',
                                    'link' => asset('assets/imgs/test3.mp4'),
                                    'youtube' =>
                                        'https://www.youtube.com/watch?v=a6L-Zd-TUaQ&list=PLywfVCpvOwMkSlyblt0Pn-JEiH4hUU33h&index=1',
                                ],
                                [
                                    'image' => 'clientsr3.webp',
                                    'name' => 'Mohamed Hamam',
                                    'text' =>
                                        'FloorHub delivers high-end wood flooring across Egypt, offering European brands and stylish, durable solutions for any space.',
                                    'link' => asset('assets/imgs/test2.mp4'),
                                    'youtube' =>
                                        'https://www.youtube.com/watch?v=HRHcymiwOqs&list=PLywfVCpvOwMkSlyblt0Pn-JEiH4hUU33h&index=3',
                                ],
                                [
                                    'image' => 'ReviewDrAlaaKhedr.webp',
                                    'name' => 'Dr Alaa Khedr',
                                    'text' =>
                                        'A beauty center in Nasr City offering advanced skincare, hair, and body treatments. Known for high-quality products, visible results from the first session, and personalized skincare plans using AI skin analysis.',
                                    'link' => asset('assets/imgs/ReviewDrAlaaKhedr.mp4'),
                                    'youtube' => 'https://youtube.com/shorts/pPx822gDcjc?si=eQCvZJpef-G7JQvX',
                                ],
                                [
                                    'image' => 'ReviewAbdElAziz.webp',
                                    'name' => 'Dr Abd El Aziz',
                                    'text' =>
                                        'Consultant in Oral & Maxillofacial Surgery Expert in jaw surgery, dental implants, and aesthetic treatments with a medical-first approach.',
                                    'link' => asset('assets/imgs/ReviewAbdElAziz.mp4'),
                                    'youtube' => 'https://youtube.com/shorts/phukOsLE3Oc?si=DGO6FKL-LjqmicjQ',
                                ],

                                // [
                                // 'image' => 'clientsr1.webp',
                                // 'name' => 'Client 1',
                                // 'text' => 'Short bio or description for Client 1',
                                // 'link' => asset('assets/imgs/test1.mp4'),
                                // ],
                            ];
                        @endphp

                        @foreach ($cards as $key => $card)
                            <div class="col-12 d-none d-md-block">
                                {{-- <div class="card flex-row align-items-stretch flex-wrap flex-md-nowrap">
                                    <a href="{{ $card['link'] }}" target="_blank" class="card-img-left d-block"
                            style="width: 80px; flex-shrink: 0;">
                            <img src="{{ asset('assets/imgs/' . $card['image']) }}"
                                class="img-fluid h-100 w-100 object-fit-cover" alt="Client Image" />
                            </a>
                            <div class="card-body d-flex flex-column justify-content-center">
                                <a href="https://www.youtube.com/watch?v=a6L-Zd-TUaQ&list=PLywfVCpvOwMkSlyblt0Pn-JEiH4hUU33h&index=1" target="_blank">

                                    <h5 class="card-title bold-text mb-2">{{ $card['name'] }}</h5>
                                    <p class="card-text text-muted">
                                        {{ $card['text'] }}
                                    </p>
                                </a>
                            </div>
                        </div> --}}

                                <div class="card flex-row align-items-stretch flex-wrap flex-md-nowrap btnS"
                                    custom-attr="{{ $card['link'] }}" data-youtube="{{ $card['youtube'] }}">
                                    <div class="card-img-left d-block" style="width: 80px; flex-shrink: 0;">
                                        <img src="{{ asset('assets/imgs/' . $card['image']) }}"
                                            class="img-fluid h-100 w-100 object-fit-cover" alt="Client Image" />
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <div class="">

                                            <h5 class="card-title bold-text mb-2">{{ $card['name'] }}</h5>
                                            <p class="card-text text-muted">
                                                {{ $card['text'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="d-md-none overflow-x-auto cards-container">
                            <div class="d-flex p-2 gap-2 cards-wrapper">
                                @foreach ($cards as $key => $card)
                                    <div class="btnS" custom-attr="{{ $card['link'] }}"
                                        data-name="{{ $card['name'] }}" data-text="{{ $card['text'] }}"
                                        style="flex: 0 0 150px;">
                                        <div class="img-wrapper h-100">
                                            <img src="{{ asset('assets/imgs/' . $card['image']) }}"
                                                class="img-fluid rounded object-fit-cover w-100 h-100"
                                                alt="Client Image" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-1"></div>
        </div>
    </div>
</section>
@push('js')
    <script>
        $('.btnS').on('click', function() { // Simplified the click handler
            const card = $(this);

            // Get data for the video
            const newSrc = card.attr('custom-attr');
            $('#myVideo source').attr('src', newSrc);
            $('#myVideo')[0].load();
            $('#myVideo')[0].play();

            // Get data for the text using data attributes
            const newName = card.data('name') || card.find('.card-title').text();
            const newText = card.data('text') || card.find('.card-text').text();

            $('.main-review h4.bold-text').text(newName);
            $('.main-review p').text(newText);

            const newYoutube = card.data('youtube');
            $('.main-review a').attr('href', newYoutube);
        });
    </script>
@endpush

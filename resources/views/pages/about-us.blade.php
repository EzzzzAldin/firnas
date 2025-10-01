@extends('layouts.app')

@section('title', 'About Us')
@push('styles')
<style>
    .founderSwiper {
        width: 100%;
    }

    .founderSwiper .swiper-slide {
        width: 100% !important;
        flex-shrink: 0;
        /* مهم علشان ياخد العرض كامل */
    }
</style>
@endpush
@section('content')
<section class="about-us-main">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" data-aos="fade-up">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" data-aos="fade-up">

    <div class="position-relative z-1">
        <div class="row custom-about-card align-items-center">
            <div class="col-md-6 d-flex flex-column justify-content-center text-start text-end info"
                data-aos="fade-right">
                <h2 class="custom-about-title title-main-section">من نحن</h2>
                <p class="custom-about-description mt-3">
                    فرناس هي شركة تسويق إبداعي تقوم على الإستراتيجية وصناعة القصص وتحقيق النتائج. منذ عام 2018، نساعد
                    العلامات التجارية على النمو وبناء روابط أعمق مع جمهورها.
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center" data-aos="fade-left">
                <img src="{{ asset('assets/imgs/e1.webp') }}" alt="Project Image" class="img-fluid custom-natural-img"
                    style="max-height: 500px;">
            </div>
        </div>
    </div>

    @php
    $founders = [
    ['name' => 'Hassan Nassar', 'role' => 'Founder'],
    ['name' => 'Basant Ehsan', 'role' => 'Founder'],
    ];
    @endphp
    <div class="swiper founderSwiper">
        <div class="swiper-wrapper" style="background-color: #8b805c !important;">
            <div class="row align-items-stretch founder-section swiper-slide d-flex">
                <div
                    class="col-md-4 d-flex flex-column justify-content-end align-items-center position-relative founder-section">
                    <img src="{{ asset('assets/imgs/Screenshot_8 (1).webp') }}" alt="Founder Image"
                        class="img-fluid custom-bottom-img" data-aos="fade-down">
                    <div class="person-caption text-center">
                        <h5 class="person-name bold-text">{{ $founders[0]['name'] }}</h5>
                        <p class="person-role">{{ $founders[0]['role'] }}</p>
                    </div>
                </div>

                <div class="col-md-8 d-flex flex-column justify-content-center text-center " data-aos="fade-up">
                    <div class="container pe-5 ps-5">
                        <h2 class="title-founders">المؤسسون</h2>
                        <h2 class="title-founders">حسن نصار</h2>
                        <p class="mt-3">بدأ حسن نصار مسيرته كمهندس برمجيات،ثم أسس HA Marketing لدعم نمو العلامات
                            التجارية وتميّزها. ومع تطوّر احتياجات السوق، أطلق H Space للحلول البرمجية الذكية وCrew Media
                            Production لإنتاج المحتوى المرئي عالي الجودة ثم أكمل مسيرته بشراكة مصرية سعودية أثمرت بشركة
                            فرناس الرقمية
                            أربع كيانات تكمل بعضها، تجمعها رؤية واحدة وهي صناعة قيمة حقيقية من الفكرة إلى الأثر.
                        </p>
                    </div>
                </div>

                {{-- <div
                            class="col-md-4 d-flex flex-column justify-content-end align-items-center position-relative founder-section">
                            <img src="{{ asset('assets/imgs/Screenshot_8 (1).webp') }}" alt="Founder Image"
                class="img-fluid custom-bottom-img" data-aos="fade-down">
                <div class="person-caption position-absolute text-center">
                    <h5 class="person-name bold-text">{{ $founders[1]['name'] }}</h5>
                    <p class="person-role">{{ $founders[1]['role'] }}</p>
                </div>
            </div> --}}
        </div>
        <div class="row align-items-stretch founder-section swiper-slide d-flex">
            <div
                class="col-md-4 d-flex flex-column justify-content-end align-items-center position-relative founder-section">
                <img src="{{ asset('assets/imgs/Bassant B&W.webp') }}" alt="Founder Image"
                    class="img-fluid custom-bottom-img" data-aos="fade-down">
                <div class="person-caption text-center">
                    <h5 class="person-name bold-text">{{ $founders[1]['name'] }}</h5>
                    <p class="person-role">{{ $founders[1]['role'] }}</p>
                </div>
            </div>

            <div class="col-md-8 d-flex flex-column justify-content-center text-center " data-aos="fade-up">
                <div class="container pe-5 ps-5">
                    <h2 class="title-founders">المؤسسون</h2>
                    <h2 class="title-founders">بسنت إحسان</h2>
                    <p class="mt-3">خريجة جامعة أم القرى – تخصص إعلام (علاقات عامة).
                        حاصلة على شهادة متخصصة في التسويق الرقمي.
                        قامت بالعمل ضمن فريق HA Marketing في مجالات إدارة الحملات وصناعة المحتوى التسويقي.
                    </p>
                </div>
            </div>

            {{-- <div
                                class="col-md-4 d-flex flex-column justify-content-end align-items-center position-relative founder-section">
                                <img src="{{ asset('assets/imgs/Screenshot_8 (1).webp') }}" alt="Founder Image"
            class="img-fluid custom-bottom-img" data-aos="fade-down">
            <div class="person-caption position-absolute text-center">
                <h5 class="person-name bold-text">{{ $founders[1]['name'] }}</h5>
                <p class="person-role">{{ $founders[1]['role'] }}</p>
            </div>
        </div> --}}
    </div>
    </div>
    </div>
</section>

<section class="team d-none">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top">

    <div class="container position-relative z-1" data-aos="fade-up">
        <h2 class="title-main-section text-center">Our team members</h2>
        <p class="text-center mt-4">
            We Focus on the details of everything we do. All to help businesses around the world Focus on what's most
            important to them.
        </p>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            @php
            $teams = [
            ['name' => 'Lynn Nasan', 'job' => 'Art Director', 'image' => 'Lynn.webp'],
            ['name' => 'Khalid Ali', 'job' => 'Head Of Department', 'image' => 'IMG-20250604-WA0021.jpg'],
            ['name' => 'Engy', 'job' => 'Digital Marketing Team Leader', 'image' => 'Engy.webp'],
            ['name' => 'Haidy', 'job' => 'Project Manager', 'image' => 'Haidy.webp'],

            [
            'name' => 'Abdelrahman Mohamed',
            'job' => 'Business Development Manager',
            'image' => '64b6262d-cde0-49e0-a01e-07877fd8bfcb.JPG',
            ],
            [
            'name' => 'Omar Fekry',
            'job' => 'Senior Business Developer',
            'image' => 'file_000000005194620aa82c487ac8f1a6e0.webp',
            ],
            [
            'name' => 'mohamed',
            'job' => 'Business Developer',
            'image' => 'mohmad.webp',
            ],

            [
            'name' => 'Mohamed Mustafa',
            'job' => 'Team Leader Software',
            'image' => 'WhatsApp Image 2025-07-30 at 12.33.56_6df32c99.jpg',
            ],
            ['name' => 'Lama Elshahawy', 'job' => 'Content Creator', 'image' => 'Lama.webp'],
            ['name' => 'Malak', 'job' => 'Graphic designer', 'image' => 'Malak.webp'],
            ['name' => 'Manar', 'job' => 'Graphic designer', 'image' => 'Manar.webp'],
            ['name' => 'Shrouk', 'job' => 'Content Creator', 'image' => 'Shrouk.webp'],
            ['name' => 'Amira', 'job' => 'Social media specialist', 'image' => 'Amira.webp'],
            ['name' => 'David Jan', 'job' => 'Senior Video-Editor', 'image' => 'David.webp'],
            ['name' => 'Ahmad ezzat', 'job' => 'Creative', 'image' => 'Ahmad ezzat.webp'],
            ['name' => 'Halim', 'job' => 'Media-Buyer', 'image' => 'Halim.webp'],
            [
            'name' => 'Nahla Fasil',
            'job' => 'Ui/Ux Designer',
            'image' => 'WhatsApp Image 2025-07-30 at 15.55.36_82d3845d.jpg',
            ],
            [
            'name' => 'Ezz Aldin Mohamed',
            'job' => 'Front-End Developer',
            'image' => 'WhatsApp Image 2025-06-24 at 15.58.27_71db5c53.jpg.webp',
            ],
            [
            'name' => 'Yossif Hagag',
            'job' => 'Back-End Developer',
            'image' => 'WhatsApp Image 2025-07-06 at 14.46.58_6201aa26.jpg',
            ],
            [
            'name' => 'Mostafa Elsayed',
            'job' => 'Mobile Application Developer',
            'image' => 'Eng mostafa .jpg',
            ],
            [
            'name' => 'Mohamed Sabry',
            'job' => 'System Admin / Wordpress Developer',
            'image' => 'WhatsApp Image 2025-07-30 at 12.28.01_91a8c2f8.jpg',
            ],
            ];
            @endphp
            @foreach ($teams as $i => $member)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3" data-aos="{{ $i % 2 == 0 ? 'fade-up' : 'fade-down' }}">
                <div class="team-card text-center p-3">
                    <div class="team-img-wrapper mx-auto mb-3">
                        <img src="{{ asset('assets/imgs/' . $member['image']) }}" class="team-img" alt="Person">
                    </div>

                    <h5 class="mb-3">{{ $member['name'] }}</h5>
                    <p class="title-job mb-3">{{ $member['job'] }}</p>
                </div>
            </div>
            @endforeach
            {{-- @for ($i = 0; $i < 12; $i++)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3" data-aos="{{ $i % 2 == 0 ? 'fade-up' : 'fade-down' }}">
            <div class="team-card text-center p-3">
                <img src="{{ asset('assets/imgs/Team Avatar.webp') }}"
                    class="rounded-circle team-img mx-auto mb-3" alt="Person">
                <h5 class="mb-3">John Doe</h5>
                <p class="title-job mb-3">Frontend Developer</p>
                <p class="team-desc">Passionate about building modern, responsive web applications with great
                    user experiences.</p>
                <div class="social-icons d-flex justify-content-center gap-3 mt-3">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        @endfor --}}
    </div>
    </div>
</section>
@endsection
@push('js')
<script>
    const founderSwiper = new Swiper(".founderSwiper", {
        loop: true,
        speed: 600,
        spaceBetween: 0,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            reverseDirection: true,
        },
        direction: "horizontal",
        rtl: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            576: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            992: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        },
    });
</script>
@endpush
@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="contact-main-section">
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
    <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

    <div class="container position-relative z-1">
        <h2 class="title-main-section text-center" data-aos="fade-up">تواصل مع فرناس للتسويق</h2>

        <div class="row mt-5">
            <div class="col-12 col-md-6 mt-3" data-aos="fade-right">
                <div class="contact-info">
                    <h4 class="bold-text">تواصل معنا في فرناس للتسويق في مصر أو السعودية أو لندن للحصول على أفضل خدمة
                    </h4>

                    {{-- Sudi Bransh --}}
                    <div class="country-line mt-5">
                        <img src="{{ asset('assets/imgs/Saudi Flag-01.webp') }}" alt="Egypt Flag" />
                        <span class="country-address bold-text">فرع المملكة العربية السعودية</span>
                    </div>

                    <div class="main-info mt-3">
                        <div class="row align-items-start address-row gx-4 gy-2">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/location.webp') }}" alt="Location"
                                    class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">العنوان:</h6>
                                <p class="address-text mb-0 zain-regular">الشوقية، مكة المكرمة – بالقرب من حي الملك فهد،
                                    المملكة العربية السعودية.</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/sms.webp') }}" alt="Email" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">البريد الألكتروني:</h6>
                                <p class="address-text mb-0 zain-regular">saudiarabia@hamarketingstudio.com</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/call.webp') }}" alt="Phone" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">الموبايل:</h6>
                                <div class="phones d-flex flex-wrap gap-2">
                                    <p class="address-text mb-0 zain-regular">966538812083+</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Egypt Branch --}}

                    <div class="country-line mt-5">
                        <img src="{{ asset('assets/imgs/Flag_of_Egypt.svg') }}" alt="Egypt Flag" />
                        <span class="country-address bold-text"> فرع مصر</span>
                    </div>

                    <div class="main-info mt-3">
                        <div class="row align-items-start address-row gx-4 gy-2">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/location.webp') }}" alt="Location"
                                    class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">العنوان:</h6>
                                <p class="address-text mb-0 zain-regular">فيلا 3، غرب سوميد، مدينة السادس من أكتوبر،
                                    الدور الأول، الجيزة، مصر.</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/sms.webp') }}" alt="Email" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">البريد الألكتروني:</h6>
                                <p class="address-text mb-0 zain-regular">egypt@hamarketingstudio.com</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/call.webp') }}" alt="Phone" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">التليفون:</h6>
                                <div class="phones d-flex flex-wrap gap-2">
                                    <p class="address-text mb-0 zain-regular">0236580692+</p>

                                    <p class="address-text mb-0 zain-regular">0236580694+</p>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/call.webp') }}" alt="Phone" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">الموبايل:</h6>
                                <div class="phones d-flex flex-wrap gap-2">
                                    <p class="address-text mb-0 zain-regular">201276476212+</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- UK Office --}}
                    <div class="country-line mt-5">
                        <img src="{{ asset('assets/imgs/Flag_of_the_United_Kingdom.webp') }}" alt="UK Flag" />
                        <span class="country-address bold-text">فرع المملكة المتحدة</span>
                    </div>

                    <div class="main-info mt-3">
                        <div class="row align-items-start address-row gx-4 gy-2">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/location.webp') }}" alt="Location"
                                    class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">العنوان:</h6>
                                <p class="address-text mb-0 zain-regular">٢٨ كلارندون رود، لندن، W11 3AD، المملكة
                                    المتحدة.</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/sms.webp') }}" alt="Email" class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">البريد الألكتروني:</h6>
                                <p class="address-text mb-0 zain-regular">unitedkingdom@hamarketingstudio.com</p>
                            </div>
                        </div>

                        <div class="row align-items-start address-row gx-4 gy-2 mt-3">
                            <div class="col-auto">
                                <img src="{{ asset('assets/imgs/call.webp') }}" alt="Phone"
                                    class="address-icon" />
                            </div>
                            <div class="col">
                                <h6 class="address-title mb-1 zain-regular">الموبايل:</h6>
                                <p class="address-text mb-0 zain-regular">447818977577+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-1"></div>


            <div class="col-12 col-md-5 mt-3" data-aos="fade-left">
                <div class="contact-form">
                    <h4 class="title-main-section">احصل على مكالمة مجانية</h4>
                    <p class="mt-5">احصل على مكالمة مجانية، يسعدنا استلام رسالتك.</p>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show bold-text" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                    @endif
                    <form class="mt-5" method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="firstName" class="form-label dm-sans-regular">الاسم الأول:</label>
                            <input type="text" name="firstName" class="form-control dm-sans-regular"
                                id="firstName" placeholder="ادخل اسمك" required />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label dm-sans-regular">البريد الألكتروني:</label>
                            <input type="email" name="email" class="form-control dm-sans-regular" id="email"
                                placeholder="ادخل عنوان بريدك الألكتروني" required />
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label dm-sans-regular">رقم الهاتف:</label>
                            <input type="tel" name="phone" class="form-control dm-sans-regular" id="phone"
                                placeholder="ادخل رقم هاتفك" />
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label dm-sans-regular">الرسالة:</label>
                            <textarea name="message" class="form-control dm-sans-regular" id="message" rows="4"
                                placeholder="اكتب رسالتك..." required></textarea>
                        </div>

                        <button type="submit" class="btn custom-ready-button mt-4 w-50">ارسال</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Follow Us --}}
        <!-- <div class="follow-us mt-5" data-aos="fade-up">
            <h4 class="title-main-section mt-5">Follow Us</h4>
            <div class="social-icons d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="https://www.facebook.com/hamarketingstudio" target="_blank"><img
                        src="{{ asset('assets/imgs/item (3).webp') }}" alt="Facebook" class="social-icon" /></a>
                <a href="https://www.instagram.com/hamarketingstudio" target="_blank"><img
                        src="{{ asset('assets/imgs/item insta.webp') }}" alt="Instagram" class="social-icon" /></a>
                <a href="https://wa.me/+01234567890" target="_blank"><img src="{{ asset('assets/imgs/item whats.webp') }}"
                        alt="WhatsApp" class="social-icon" /></a>
            </div>
        </div> -->
    </div>
</section>
@endsection
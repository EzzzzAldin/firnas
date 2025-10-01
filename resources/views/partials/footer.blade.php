<footer>
    <div class="container">
        <div class="row">
            <!-- Logo + Social Icons -->
            <div class="col-12 col-md-4 mb-4">
                <img src="{{ asset('assets/imgs/Group 1.webp') }}" alt="Logo"
                    style="max-width: 150px; margin-bottom: 1rem" />
                <div class="d-flex gap-2 mt-3">
                    <a href="https://www.facebook.com/firnasagency.sa" target="_blank" class="social-icon"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href=" https://www.instagram.com/firnasagency.sa" target="_blank" class="social-icon"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@firnasagency.sa" target="_blank" class="social-icon"><i
                            class="fa-brands fa-tiktok"></i></i></a>
                    <a href="https://www.linkedin.com/company/firnasagencysa" target="_blank" class="social-icon"><i
                            class="fa-brands fa-linkedin"></i></i></a>
                    <a href="https://x.com/firnasagencysa" target="_blank" class="social-icon"><i
                            class="fa-brands fa-x"></i></i></a>
                    <a href=" https://www.snapchat.com/@firnasagency.sa" target="_blank" class="social-icon"><i
                            class="fa-brands fa-snapchat"></i></i></a>
                    <a href="https://wa.me/+966538812083" target="_blank" class="social-icon"><i
                            class="fa-brands fa-whatsapp"></i></i></a>

                    {{-- <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a> --}}
                </div>
            </div>

            <!-- Pages Links -->
            <div class="col-12 col-md-4 mb-4">
                <div class="footer-title bold-text">الصفحات</div>
                <a href="{{ url('/about-us') }}" class="footer-link">من نحن</a>
                <a href="{{ url('/services') }}" class="footer-link">الخدمات</a>
                <a href="{{ url('/portfolio') }}" class="footer-link">عملائنا</a>
                <a href="{{ url('/contact-us') }}" class="footer-link">تواصل معنا</a>
                <a href="/" class="footer-link">استشارة</a>
                {{-- <a href="{{ url('/') }}" class="footer-link">Blog</a> --}}
                {{-- <a href="{{ url('/about-us') }}" class="footer-link">About Us</a>
                <a href="{{ url('/services') }}" class="footer-link">Services</a>
                <a href="{{ url('/portfolio') }}" class="footer-link">Portfolio</a>
                <a href="{{ url('/contact-us') }}" class="footer-link">Contact Us</a>
                <a href="#" class="footer-link">Create</a>
                <a href="{{ url('/blogs') }}" class="footer-link">Blog</a> --}}
            </div>

            <!-- Company Info -->
            <div class="col-12 col-md-4 mb-4">
                <div class="footer-title">الشركة</div>

                <div class="country-line mt-4">
                    <img src="{{ asset('assets/imgs/Saudi Flag-01.webp') }}" alt="UAE Flag" />
                    <span> العنوان : الشوقية، مكة المكرمة – بالقرب من حي الملك فهد، المملكة العربية السعودية. </span>
                </div>

                <div class="country-line">
                    <img src="{{ asset('assets/imgs/image 859.webp') }}" alt="Egypt Flag" />
                   <span> العنوان : فيلا 3، غرب سوميد، مدينة السادس من أكتوبر، الدور الأول، الجيزة، مصر.</span>
                </div>

                <div class="country-line mt-4">
                    <img src="{{ asset('assets/imgs/image 860.webp') }}" alt="UK Flag" />
                    <span> العنوان :  ٢٨ كلارندون رود، لندن، W11 3AD، المملكة المتحدة.</span>

                </div>

                <div class="country-line mt-4">
                    <span>Email info@hamarketingstudio.com</span>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-7">
                <div class="return-policy">

                </div>

            </div>
            <div class="col-12 col-md-5">
                <div class="copyright text-center">© 2025 H-Space. All rights reserved - One of Nassar Group companies
                </div>
            </div>
        </div>

    </div>
</footer>

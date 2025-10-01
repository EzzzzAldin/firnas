<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="assets/imgs/Group 1.webp" type="image/webp" />
    <title>@yield('title', 'HA Marking Studio')</title>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5P79F8DQ');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    @stack('styles')

    @livewireStyles

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SL37PNQP2Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SL37PNQP2Y');
    </script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5P79F8DQ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    {{-- سويتشر اللغة --}}
    {{-- <div class="language-switcher" style="text-align: right; padding: 10px;">
        <a href="{{ url('en/' . Request::segment(2)) }}">English</a> |
    <a href="{{ url('ar/' . Request::segment(2)) }}">العربية</a>
    </div> --}}

    <aside class="side-contact-nav d-flex flex-column">
        <ul class="social-links list-unstyled mb-4">
            {{-- <li>
                <a href="https://www.facebook.com/hamarketingstudio" target="_blank"
                    class="d-flex align-items-center text-decoration-none">
                    <span>Facebook</span>
                    <i class="fab fa-facebook me-2"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/hamarketingstudio" target="_blank"
                    class="d-flex align-items-center text-decoration-none">
                    <span>Instagram</span>
                    <i class="fab fa-instagram me-2"></i>
                </a>
            </li> --}}
            <li>
                <a class="d-flex align-items-center text-decoration-none" href="https://wa.me/+9660538812083">
                    <i class="fa-brands fa-whatsapp me-2"></i>
                    <span>+966538812083</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-items-center text-decoration-none" href="tel:+9660538812083">
                    <i class="fas fa-phone-alt me-2"></i>
                    <span>+966538812083</span>
                </a>
            </li>
        </ul>
    </aside>


    @include('partials.header')

    <main class="flex-fill">
        @yield('content')
    </main>


    @include('partials.footer')



    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <style>
        .iti {
            width: 100%;
        }
    </style>

    {{-- Welcome modal --}}
    <div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 p-4 text-center"
                style="border: 1px solid #5cb49e; height: 500px; justify-content: center;">

                <!-- Close Button -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>

                <div id="welcomeAlert"></div>
                {{-- Success Message --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>✔</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>✖</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>⚠</strong> Please fix the following errors:
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


                <!-- Title -->
                <h4 class="mb-3">احصل على استشارة تسويقية مجانية</h4>

                <form method="POST" id="phoneForm" style="direction: ltr">
                    @csrf
                    <div class="mb-3 text-end">
                        <label for="name" class="form-label">الاسم الكامل</label>
                        <input type="text" name="name" id="name" class="form-control rounded text-end" required>
                    </div>

                    <div class="mb-3 text-end">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="tel" name="phone" id="phone" class="form-control rounded text-end" required>
                    </div>

                    <input type="hidden" id="full_phone" name="full_phone">

                    <!-- Button -->
                    <button type="submit" id="startBtn" class="view-all btn px-5 py-2 rounded w-50 mx-auto">
                        ابدأ
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div id="chat-toggle"
        style="position: fixed; bottom: 20px; right: 20px; background: var(--main-color); color: #fff; width: 70px; height: 70px; border-radius: 50%; display: none; align-items: center; justify-content: center; cursor: pointer; z-index:10000;">
        <i class="fas fa-comments" style="font-size: 2rem;"></i>
    </div>

    {{-- Chat modal --}}
    @livewire('chat-bot')

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chatModal = document.getElementById("chatM");
            const closeChat = document.querySelector("#chatM .close-chat");


            const openChatButton = document.getElementById("openChatBtn");


            if (openChatButton) {
                openChatButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    chatModal.style.display = "block";
                });
            }



            if (closeChat) {
                closeChat.addEventListener("click", () => {
                    chatModal.style.display = "none";
                });
            }

            const chatToggle = document.getElementById("chat-toggle");
            if (chatToggle) {
                chatToggle.addEventListener("click", () => {
                    if (chatModal.style.display === "none" || chatModal.style.display === "") {
                        chatModal.style.display = "block";
                    } else {
                        chatModal.style.display = "none";
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var itiInstance = null;

            var welcomeModal = document.getElementById("welcomeModal");

            welcomeModal.addEventListener("shown.bs.modal", function() {
                var input = welcomeModal.querySelector("#phone");


                if (input && !itiInstance) {
                    itiInstance = window.intlTelInput(input, {
                        initialCountry: "sa",
                        geoIpLookup: function(callback) {
                            fetch("https://ipapi.co/json")
                                .then(res => res.json())
                                .then(data => callback(data.country_code))
                                .catch(() => callback("us"));
                        },
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                    });

                    setTimeout(() => {
                        document.querySelectorAll(".iti__country-name").forEach(function(el) {
                            el.classList.add("text-black-50");
                        });
                    }, 500);

                    document.getElementById("phoneForm").addEventListener("submit", function(e) {
                        var fullPhoneInput = document.getElementById("full_phone");
                        var countryData = itiInstance
                            .getSelectedCountryData();
                        var enteredNumber = itiInstance.getNumber();

                        if (!itiInstance.isValidNumber()) {
                            fullPhoneInput.value =
                                `+${countryData.dialCode}${enteredNumber.replace(/\D/g, '')}`;
                        } else {
                            fullPhoneInput.value = itiInstance.getNumber(intlTelInputUtils
                                .numberFormat.E164);
                        }

                        console.log(fullPhoneInput.value);
                    });
                }




                $("#phoneForm").on("submit", function(e) {
                    e.preventDefault();

                    let startBtn = $("#startBtn");
                    startBtn.prop("disabled", true);
                    startBtn.html(
                        '<span class="spinner-border spinner-border-sm me-2"></span> Loading...'
                    );


                    let phone = $("#phone").val();
                    let fullPhone = $("#full_phone").val();

                    if (!fullPhone) {
                        $("#full_phone").val(phone);
                    }

                    var formData = new FormData(this);

                    $.ajax({
                        url: '/chatbot/authenticate',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        success: function(data) {
                            if (data.success) {
                                // Hide welcome modal
                                var welcomeModalEl = document.getElementById(
                                    "welcomeModal");
                                var welcomeModal = bootstrap.Modal.getInstance(
                                        welcomeModalEl) ||
                                    new bootstrap.Modal(welcomeModalEl);
                                welcomeModal.hide();

                                // Show chat modal
                                document.getElementById("chatM").style.display =
                                    "block";
                                document.getElementById("chat-toggle").style.display =
                                    "flex";

                                // Store user info
                                window.currentUser = data.user;
                                fetch('/refresh-csrf')
                                    .then(res => res.json())
                                    .then(data => {
                                        document.querySelector(
                                                'meta[name="csrf-token"]')
                                            .setAttribute("content", data.token);
                                        if (window.Livewire?.connection) {
                                            window.Livewire.connection.csrfToken =
                                                data.token;
                                        }

                                        Livewire.dispatch('user-authenticated');

                                        const modalEl = document.getElementById(
                                            'chatM');
                                        const chatModal = bootstrap.Modal
                                            .getOrCreateInstance(modalEl);
                                        chatModal.show();
                                    });



                            } else {
                                document.getElementById("welcomeAlert").innerHTML = `
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        ${data.message || "Something went wrong. Please try again."}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                `;

                                // Replace Start button with Close
                                let startBtn = document.getElementById("startBtn");
                                startBtn.innerText = "Close";
                                startBtn.classList.remove("btn-primary");
                                startBtn.classList.add("btn-secondary");
                                startBtn.setAttribute("data-bs-dismiss", "modal");
                            }
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                let messages = "";

                                for (let field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        messages += errors[field].join("<br>") + "<br>";
                                    }
                                }

                                document.getElementById("welcomeAlert").innerHTML = `
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            ${messages}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    `;
                            } else {
                                console.error("Unexpected error:", xhr.responseText);
                                alert("Something went wrong, please try again.");
                            }
                        },
                        complete: function() {
                            startBtn.prop("disabled", false).html("Start");
                        }

                    });
                });



            });
        });
    </script>

    @if (request()->is('/') || request()->is('index'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            welcomeModal.show();
        });
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            speed: 500,
            spaceBetween: 30,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
                reverseDirection: false,
            },
            direction: "horizontal",

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 70,
                },
            },
        });
    </script>

    {{-- <script>
        ["popupVideo1", "popupVideo2", "popupVideo3"].forEach((id) => {
            const video = document.getElementById(id);
            const modal = video.closest(".modal");

            modal.addEventListener("hidden.bs.modal", () => {
                video.pause();
                video.currentTime = 0;
            });
        });
    </script> --}}

    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 10) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false,
            offset: 50,
        });


        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', (message, component) => {
                AOS.refresh();
            });
        });
    </script>

    {{-- <script>
        const filterButtons = document.querySelectorAll(".filter-btn");
        const cards = document.querySelectorAll(".eduction .custom-card-wrapper");
        const noResults = document.getElementById("no-results-message");

        filterButtons.forEach((button) => {
            button.addEventListener("click", () => {
                filterButtons.forEach((btn) => btn.classList.remove("active"));
                button.classList.add("active");

                const category = button.textContent.trim();
                let visibleCount = 0;

                cards.forEach((card) => {
                    const cardCategory = card
                        .querySelector(".category-text")
                        .textContent.trim();

                    if (
                        category === "All" ||
                        category.toLowerCase() === cardCategory.toLowerCase()
                    ) {
                        card.style.display = "block";
                        card.classList.remove("hide");
                        visibleCount++;
                    } else {
                        card.classList.add("hide");
                        setTimeout(() => {
                            card.style.display = "none";
                        }, 500);
                    }
                });

                if (visibleCount === 0) {
                    noResults.style.display = "block";
                } else {
                    noResults.style.display = "none";
                }

                setTimeout(() => {
                    AOS.refresh();
                }, 600);
            });
        });
    </script> --}}

    <script>
        document.getElementById('flagToggle').addEventListener('click', function(e) {
            e.preventDefault();
            const currentFlag = document.getElementById('currentFlag');

            if (currentFlag.alt === "English") {
                currentFlag.src = "{{ asset('assets/imgs/Saudi Flag-01.png') }}";
                currentFlag.alt = "Arabic";
            } else {
                currentFlag.src = "{{ asset('assets/imgs/Flag_of_the_United_Kingdom.png') }}";
                currentFlag.alt = "English";
            }
        });

        document.getElementById('altFlagLink').addEventListener('click', function(e) {
            e.preventDefault();
            const currentFlag = document.getElementById('currentFlag');
            currentFlag.src = "{{ asset('assets/imgs/Flag_of_Egypt.svg.webp') }}";
            currentFlag.alt = "Arabic";
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".mySwiper-service", {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>

    @livewireScripts
    @stack('js')
</body>

</html>
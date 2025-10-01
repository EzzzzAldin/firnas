<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/imgs/Group 1.webp') }}" class="img-fluid" style="max-height: 60px"
                id="navbar-logo" />
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
            @php
                $current = request()->path();
            @endphp

            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                <li class="nav-item">
                    <a class="nav-link {{ $current == '/' || $current == 'index' ? 'active' : '' }}"
                        href="{{ url('/') }}">
                        الرئيسية
                    </a>
                </li>

                <li class="nav-item">
                    {{-- <a class="nav-link {{ $current == 'about-us' ? 'active' : '' }}" href="{{ url('/') }}">
                    About Us
                    </a> --}}
                    <a class="nav-link {{ $current == 'about-us' ? 'active' : '' }}" href="{{ url('/about-us') }}">
                        من نحن
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link {{ $current == 'services' ? 'active' : '' }}" href="{{ url('/services') }}">
                        الخدمات
                    </a>
                </li>

                <li class="nav-item">
                    {{-- <a class="nav-link {{ $current == 'portfolio' ? 'active' : '' }}" href="{{ url('/') }}">
                    Portfolio
                    </a> --}}
                    <a class="nav-link {{ $current == 'portfolio' ? 'active' : '' }}" href="{{ url('/portfolio') }}">
                        عملائنا
                    </a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link {{ $current == 'portfolio' ? 'active' : '' }}" href="{{ url('/') }}">
                    Portfolio
                    </a> --}}
                    <a class="nav-link {{ $current == 'store' ? 'active' : '' }}" href="{{ url('/store') }}">
                        المتجر
                    </a>
                </li>

                <li class="nav-item">
                    {{-- <a class="nav-link {{ $current == 'education' ? 'active' : '' }}" href="{{ url('/') }}">
                    Education
                    </a> --}}
                    {{-- <a class="nav-link {{ $current == 'education' ? 'active' : '' }}" href="{{ url('/education') }}">
                    Education
                    </a> --}}
                </li>

                <li class="nav-item">
                    <button class="nav-link" id="openChatBtn" style="display: none;">استشارة</button>
                    <button class="nav-link" id="welcomeBtn" data-bs-toggle="modal" data-bs-target="#welcomeModal"
                        style="display: none;">استشارة</button>
                </li>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const openChatBtn = document.getElementById("openChatBtn");
                        const welcomeBtn = document.getElementById("welcomeBtn");

                        function showChatToggle() {
                            const chatToggle = document.getElementById("chat-toggle");
                            if (chatToggle) {
                                chatToggle.style.display = "flex";
                            }
                        }


                        function updateConsultationButton(isAuthenticated) {
                            if (isAuthenticated) {
                                openChatBtn.style.display = 'block';
                                welcomeBtn.style.display = 'none';
                            } else {
                                openChatBtn.style.display = 'none';
                                welcomeBtn.style.display = 'block';
                            }
                        }

                        updateConsultationButton(@json(auth()->check()));

                        window.addEventListener('user-authenticated', () => {
                            updateConsultationButton(true);

                            showChatToggle();
                            const modalEl = document.getElementById('chatM');
                            if (modalEl) {
                                const chatModal = bootstrap.Modal.getOrCreateInstance(modalEl);
                                chatModal.show();
                            }


                        });

                        openChatBtn.addEventListener("click", async function(event) {
                            event.preventDefault();
                            try {
                                showChatToggle();
                                const res = await fetch('/refresh-csrf');
                                const data = await res.json();
                                document.querySelector('meta[name="csrf-token"]').setAttribute("content", data
                                    .token);

                                if (window.Livewire?.connection) {
                                    window.Livewire.connection.csrfToken = data.token;
                                }

                                if (window.Livewire?.dispatch) {
                                    window.Livewire.dispatch('user-authenticated');
                                }

                                const modalEl = document.getElementById('chatM');
                                if (modalEl) {
                                    const chatModal = bootstrap.Modal.getOrCreateInstance(modalEl);
                                    chatModal.show();
                                }


                            } catch (err) {
                                console.error('CSRF refresh error:', err);
                            }
                        });
                    });
                </script>

                <li class="nav-item">
                    {{-- <a class="nav-link {{ $current == 'blogs' ? 'active' : '' }}" href="{{ url('/') }}">
                    Blogs
                    </a> --}}
                    {{-- <a class="nav-link {{ $current == 'blogs' ? 'active' : '' }}" href="{{ url('/blogs') }}">
                    Blogs
                    </a> --}}
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $current == 'contact-us' ? 'active' : '' }}"
                        href="{{ url('/contact-us') }}">
                        تواصل معنا
                    </a>
                </li>

                <div class="d-flex align-items-center gap-3 ms-5 position-relative language-switcher">
                    <a href="#" class="nav-link p-0 flag-toggle" id="flagToggle">
                        <img src="{{ asset('assets/imgs/Saudi Flag-01.webp') }}" alt="English" width="24"
                            height="16" id="currentFlag">
                    </a>

                    <!-- Hidden flag under -->
                    <div class="alt-flag position-absolute" style="top: 100%; left: 0; display: none;"
                        id="altFlagWrapper">
                        <a href="#" id="altFlagLink">
                            <img src="{{ asset('assets/imgs/Flag_of_the_United_Kingdom.webp') }}" alt="Arabic"
                                width="24" height="16">
                        </a>
                    </div>
                </div>


                {{-- <div class="d-flex align-items-center gap-3 ms-5">
                    <li class="nav-item">
                        <a class="nav-link p-0" href="#">
                            <img src="{{ asset('assets/imgs/Flag_of_the_United_Kingdom.png') }}" alt="English"
                width="24" height="16" />
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fa-solid fa-magnifying-glass" style="font-size: 1.2rem"></i>
                    </a>
                </li>
        </div> --}}
            </ul>

        </div>
    </div>
</nav>

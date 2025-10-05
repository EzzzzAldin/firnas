@extends('layouts.app')

@section('title', 'Service Details - Firnas')
@livewireStyles

@section('content')
    <section class="store-main services-main-section">
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <livewire:stor-price :product="$product" >
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const label = document.getElementById("employee-label");
            const buttons = document.querySelectorAll(".btn-select-employee");
            const input = document.getElementById("employee-input");

            buttons.forEach(btn => {
                btn.addEventListener("click", function() {
                    const value = this.textContent.trim();
                    label.textContent = value + " موظف";
                    input.value = "";
                });
            });

            input.addEventListener("input", function(e) {
                const value = e.target.value.trim();
                if (value && !isNaN(value)) {
                    label.textContent = value + " موظف";
                } else {
                    label.textContent = "عدد الموظفين";
                }
            });
        });
    </script>
@endsection
@livewireScripts

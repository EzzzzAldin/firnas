@extends('layouts.app')

@section('title', 'Service Details - Firnas')

@section('content')
    <section class="store-main services-main-section">
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Top Left" class="decor-top-left" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right" />
        <img src="{{ asset('assets/imgs/Frame 67.webp') }}" alt="Bottom Right" class="decor-bottom-right-top" />

        <div class="container">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="text-center px-2">
                            <img src="{{ asset('assets/imgs/ishraq-01.webp') }}" alt="Slide 1"
                                class="carousel-image open-modal" data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-img="{{ asset('assets/imgs/ishraq-01.webp') }}">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="text-center px-2">
                            <img src="{{ asset('assets/imgs/ishraq-01.webp') }}" alt="Slide 2"
                                class="carousel-image open-modal" data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-img="{{ asset('assets/imgs/ishraq-01.webp') }}">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="text-center px-2">
                            <img src="{{ asset('assets/imgs/ishraq-01.webp') }}" alt="Slide 3"
                                class="carousel-image open-modal" data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-img="{{ asset('assets/imgs/ishraq-01.webp') }}">
                        </div>
                    </div>
                </div>

                <div class="carousel-indicators custom-indicators position-static mt-3">
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
            </div>

            <div class="info-system mt-5 mb-5">
                <h3 class="mb-3">اسم الخدمة CRM</h3>
                <p>الـ CRM هو نظام بيساعد الشركات تدير علاقتها بالعملاء، تتابع المبيعات، وتحسّن تجربة العميل عشان تزود ولاءه
                    للشركة.</p>
            </div>

            <div class="form-service">
                <h3>للاشتراك في الخدمة أملئ الاستمارة التاليه</h3>
                <form action="POST" class="mt-5">
                    <div class="mb-4">
                        <input type="text" class="form-control" id="name" placeholder="ادخل اسم الشركة" required>
                    </div>
                    <div class="mb-4">
                        <select name="filed" id="filed" class="form-select custom-select-rtl" required>
                            <option value="" disabled selected>اختر مجال الشركة</option>
                            <option value="tech">تكنولوجيا</option>
                            <option value="health">صحة</option>
                            <option value="education">تعليم</option>
                            <option value="finance">تمويل</option>
                            <option value="other">مجال آخر</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <div
                            class="box-employee d-flex flex-wrap align-items-center justify-content-between gap-2 border rounded bg-white p-2">
                            <span id="employee-label" class="flex-grow-1">عدد الموظفين</span>

                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <button type="button" class="btn btn-select-employee btn-sm">15</button>
                                <button type="button" class="btn btn-select-employee btn-sm">30</button>
                                <button type="button" class="btn btn-select-employee btn-sm">50</button>

                                <input type="number" id="employee-input" class="form-control form-control-sm"
                                    placeholder="تخصيص عدد معين" min="1" style="max-width: 120px;">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 box-employee border rounded bg-white p-3">
                        <label class="title d-block mb-2 font-weight-bold">المنصة</label>

                        <div class="d-flex flex-wrap gap-4">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="platform1" value="facebook">
                                <label class="title-platform form-check-label ms-2" for="platform1">فيسبوك</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="platform2" value="x">
                                <label class="title-platform form-check-label ms-2" for="platform2">إكس</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="platform3" value="instagram">
                                <label class="title-platform form-check-label ms-2" for="platform3">انستجرام</label>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4 box-employee border rounded bg-white p-3">
                        <label class="title d-block mb-2 font-weight-bold">المنصة</label>

                        <div class="d-flex flex-wrap gap-4">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="platform" id="platform1"
                                    value="facebook">
                                <label class="title-platform form-check-label ms-2" for="platform1">فيسبوك</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="platform" id="platform2"
                                    value="x">
                                <label class="title-platform form-check-label ms-2" for="platform2">إكس</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="platform" id="platform3"
                                    value="instagram">
                                <label class="title-platform form-check-label ms-2" for="platform3">انستجرام</label>
                            </div>

                        </div>
                    </div>



                    <div class="mb-4">
                        <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                            <div class="price">السعر</div>
                            <div class="price-value">200</div>
                        </div>
                        <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                            <div class="price">الخصم</div>
                            <div class="discount-value">200</div>
                        </div>
                        <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                            <div class="price">الاجمالي</div>
                            <div class="price-value">200</div>
                        </div>
                    </div>

                    <div class="form-check form-check-reverse mt-4 mb-5">
                        <input class="form-check-input terms" type="checkbox" id="terms" required>
                        <label class="form-check-label text-white" for="terms">
                            أوافق على الشروط والأحكام
                        </label>
                    </div>

                    <button type="submit" class="btn btn-send w-100">حجز</button>
                </form>
            </div>

            <div class="condition mt-5">
                <h4>سياسة الاسترجاع</h4>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam tenetur nesciunt laboriosam possimus
                    tempore officiis accusantium, est ipsam, rem quibusdam assumenda! Aspernatur voluptatum sapiente facere
                    vero ipsa? Esse, voluptatibus aut!
                </p>
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

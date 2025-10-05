<div>
    <div class="container">
        <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse ($product->slider as $item)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="text-center px-2">
                            <img src="{{ asset('storage/' . $item) }}" alt="Slide 1" class="carousel-image open-modal"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-img="{{ asset('storage/' . $item) }}">
                        </div>
                    </div>
                @empty
                @endforelse
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
            <h3 class="mb-3">{{ $product->name }}</h3>
            <p>{{ $product->dis }}</p>
        </div>
        @php
            $textQuestions = collect($product->questions)->filter(function ($q) {
                return $q['type_question'] === 'text';
            });
            $selectQuestions = collect($product->questions)->filter(function ($q) {
                return $q['type_question'] === 'select';
            });
            $chickboxQuestions = collect($product->questions)->filter(function ($q) {
                return $q['type_question'] === 'chickbox';
            });
            $numberQuestions = collect($product->questions)->filter(function ($q) {
                return $q['type_question'] === 'number';
            });
            $radioQuestions = collect($product->questions)->filter(function ($q) {
                return $q['type_question'] === 'radio';
            });
        @endphp
        <div class="form-service">
            <h3>للاشتراك في الخدمة أملئ الاستمارة التاليه</h3>
            <form action="POST" class="mt-5">
                <div class="mb-4">

                    {{-- text --}}
                    @forelse ($textQuestions as $item)
                        <input type="text" class="form-control" id="name" placeholder="{{ $item['question'] }}"
                            required>
                        <input type="hidden" name="textPrice" value="{{ $item['price'] }}">
                    @empty
                    @endforelse


                </div>

                {{-- select --}}
                @forelse ($selectQuestions as $item)
                    <div class="mb-4">
                        <select name="filed" id="filed" class="form-select custom-select-rtl" required>
                            <option value="" disabled selected>{{ $item['question'] }}</option>
                            @forelse ($item['answers'] as $answer)
                                <option value="{{ $answer }}">{{ $answer }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>

                @empty
                @endforelse
                {{-- number --}}
                @forelse ($numberQuestions as $item)
                    <div class="mb-4">
                        <div
                            class="box-employee d-flex flex-wrap align-items-center justify-content-between gap-2 border rounded bg-white p-2">
                            <span id="employee-label" class="flex-grow-1">{{ $item['question'] }}</span>


                            <div class="d-flex flex-wrap align-items-center gap-2">
                                @forelse ($item['answers'] as $answer)
                                    <button type="button"
                                        class="btn btn-select-employee btn-sm">{{ $answer }}</button>

                                @empty
                                @endforelse
                                <input type="number" name="numberE" id="employee-input"
                                    class="form-control form-control-sm" placeholder="تخصيص عدد معين" min="1"
                                    style="max-width: 120px;">
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse
                {{-- chickboxQuestions --}}
                {{-- chickbox --}}
                @forelse ($chickboxQuestions as $item)

                    <div class="mb-4 box-employee border rounded bg-white p-3">
                        <label class="title d-block mb-2 font-weight-bold">{{ $item['question'] }}</label>

                        <div class="d-flex flex-wrap gap-4">
                            @forelse ($item['answers'] as $key => $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="platform1-{{ $key }}"
                                        value="{{ $answer }}">
                                    <label class="title-platform form-check-label ms-2"
                                        for="platform1-{{ $key }}">{{ $answer }}</label>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                @empty

                @endforelse

                {{-- radio --}}
                @forelse ($radioQuestions as $item)
                    <div class="mb-4 box-employee border rounded bg-white p-3">
                        <label class="title d-block mb-2 font-weight-bold">{{ $item['question'] }}</label>

                        <div class="d-flex flex-wrap gap-4">
                            @forelse ($item['answers'] as $key => $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="platform"
                                        id="platform2-{{ $key }}" value="{{ $answer }}">
                                    <label class="title-platform form-check-label ms-2"
                                        for="platform2-{{ $key }}">{{ $answer }}</label>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>

                @empty

                @endforelse


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
</div>

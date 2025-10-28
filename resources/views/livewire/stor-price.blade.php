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
        {{-- @dd($product)
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
        @endphp --}}

        {{-- تم إزالة كود الـ @php من هنا لأنه لم يعد ضرورياً --}}

        <div class="form-service">
            <h3>للاشتراك في الخدمة أملئ الاستمارة التاليه</h3>

            {{-- لا نستخدم action="POST" مع Livewire لأنها تدير الإرسال بنفسها --}}
            <form action="{{ route('order.submit', $product->id) }}" method="POST" class="mt-5">
                @csrf
                {{-- حلقة واحدة رئيسية لعرض جميع الأسئلة --}}
                {{-- 1. Text --}}
                <div class="mb-4">
                    <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                    {{-- لا داعي لإضافة سعر هنا --}}
                </div>
                <div class="mb-4">
                    <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" required>
                    {{-- لا داعي لإضافة سعر هنا --}}
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="mobile" placeholder="رقم الموبايل" required>
                    {{-- لا داعي لإضافة سعر هنا --}}
                </div>
                @foreach ($product->questions as $questionIndex => $question)
                    @switch($question['type_question'])
                        @case('text')
                            <div class="mb-4">
                                <input type="text" class="form-control" name="answer[]"
                                    placeholder="{{ $question['question'] }}" required>
                                <input type="hidden" value="{{ $question['question'] }}" name="question[]">
                                {{-- لا داعي لإضافة سعر هنا --}}
                            </div>
                        @break

                        {{-- 2. Select --}}
                        @case('select')
                            <div class="mb-4">
                                {{-- ربط الـ select بالمتغير في الكومبوننت --}}
                                <input type="hidden" value="{{ $question['question'] }}" name="question[]">
                                <select wire:model.live="selectedAnswers.{{ $questionIndex }}"
                                    class="form-select custom-select-rtl" required name="answer[]">
                                    <option value="" class="title" selected>{{ $question['question'] }}</option>
                                    @foreach ($question['answers'] as $answerIndex => $answer)
                                        {{-- القيمة هي الـ index --}}
                                        <option value="{{ $answer }}" data-index="{{ $answerIndex }}">
                                            {{ $answer }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @break

                        {{-- 3. Number (Treated as Radio Buttons) --}}
                        @case('number')
                            <div class="mb-4">
                                <div
                                    class="box-employee d-flex flex-wrap align-items-center justify-content-between gap-2 border rounded bg-white p-2">
                                    <span class="employee-label flex-grow-1">{{ $question['question'] }}</span>
                                    <div class="d-flex flex-wrap align-items-center gap-2" role="group">
                                        {{-- سنعرض الأرقام كخيارات راديو --}}
                                        <input type="hidden" value="{{ $question['question'] }}" name="question[][number][]">
                                        @foreach ($question['answers'] as $answerIndex => $answer)
                                            <input type="radio" class="btn-check employee-input" name="answer[]"
                                                id="num_{{ $questionIndex }}_{{ $answerIndex }}" value="{{ $answer }}"
                                                data-index="{{ $answerIndex }}"
                                                wire:model.live="selectedAnswers.{{ $questionIndex }}" autocomplete="off">

                                            <label class="btn btn-outline-primary btn-sm"
                                                for="num_{{ $questionIndex }}_{{ $answerIndex }}">{{ $answer }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @break

                        {{-- 4. Checkbox --}}
                        @case('chickbox')
                            {{-- انتبه للخطأ الإملائي --}}
                            <div class="mb-4 box-employee border rounded bg-white p-3">
                                <label class="title d-block mb-2 font-weight-bold">تتتتتت{{ $question['question'] }}</label>
                                <div class="d-flex flex-wrap gap-4">
                                    <input type="hidden" value="{{ $question['question'] }}" name="question[][chickbox][]">
                                    @foreach ($question['answers'] as $answerIndex => $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="chk_{{ $questionIndex }}_{{ $answerIndex }}" value="{{ $answer }}"
                                                data-index="{{ $answerIndex }}"
                                                wire:model.live="selectedAnswers.{{ $questionIndex }}" name="answer[{{ $questionIndex }}][chickbox][]">

                                            <label class="form-check-label ms-2"
                                                for="chk_{{ $questionIndex }}_{{ $answerIndex }}">{{ $answer }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @break

                        {{-- 5. Radio --}}
                        @case('radio')
                            <div class="mb-4 box-employee border rounded bg-white p-3">
                                <label class="title  d-block mb-2 font-weight-bold">{{ $question['question'] }}</label>
                                <div class="d-flex flex-wrap gap-4">
                                    <input type="hidden" value="{{ $question['question'] }}" name="question[][radio][]">
                                    @foreach ($question['answers'] as $answerIndex => $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer[{{ $questionIndex }}]"
                                                id="rad_{{ $questionIndex }}_{{ $answerIndex }}"
                                                value="{{ $answer }}" data-index="{{ $answerIndex }}"
                                                wire:model.live="selectedAnswers.{{ $questionIndex }}">
                                            <label class="form-check-label ms-2"
                                                for="rad_{{ $questionIndex }}_{{ $answerIndex }}">{{ $answer }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @break
                    @endswitch
                @endforeach


                {{-- قسم عرض السعر --}}
                <div class="mb-4">
                    <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                        <div class="price">السعر</div>
                        {{-- استخدام الخاصية المحسوبة لعرض السعر الإجمالي --}}
                        {{-- <div class="price-value">{{ $this->totalPrice() }} EGP
                            <input type="hidden" name="totalPrice" value="{{ $this->totalPrice() }}">
                        </div> --}}
                        @if (!collect($selectedAnswers)->every(fn($a) => is_null($a) || $a === '' || $a === []))
                            <div class="price-value">{{ $this->totalPrice() }} EGP</div>
                            <input type="hidden" name="totalPrice" value="{{ $this->totalPrice() }}">
                        @endif

                    </div>
                    {{-- يمكنك إضافة منطق الخصم هنا بنفس الطريقة --}}
                    {{-- <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                        <div class="price">الخصم</div>
                        <div class="discount-value">200</div>
                    </div>
                    <div class="price-box mb-3 d-flex justify-content-between align-items-center ">
                        <div class="price">الاجمالي</div>
                        <div class="price-value">{{ $this->totalPrice() - 200 }}</div>
                    </div> --}}
                </div>

                <div class="form-check form-check-reverse mt-4 mb-5">
                    <input class="form-check-input terms" type="checkbox" id="terms" required>
                    <label class="form-check-label text-white" for="terms">
                        أوافق على الشروط والأحكام
                    </label>
                </div>
                @if (!collect($selectedAnswers)->every(fn($a) => is_null($a) || $a === '' || $a === []))
                    <button type="submit" class="btn btn-send w-100">حجز</button>
                @endif
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

<div>
    @if ($showChat)
    <div class="startNowModal chatmodal" id="chatM" tabindex="-1" aria-hidden="true" wire:ignore.self
        data-bs-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Header --}}
                <div
                    class="modal-title d-flex justify-content-center position-relative align-items-center py-3 px-2 mb-4">
                    <h2 class="modal-title-chat mb-0">أهلاً بك</h2>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/imgs/close-icon.png') }}" alt="close" class="close-chat"
                            data-bs-dismiss="modal">
                    </div>
                </div>

                {{-- Body --}}
                <div class="modal-body pt-0">
                    <div id="chat-box">
                        <div id="chat-messages"
                            style="max-height:200px; overflow-y:auto; border:1px solid #dddddd38; padding:10px; border-radius:5px;">

                            {{-- تحية المستخدم --}}
                            <div class="chat-message position-relative mb-2 d-block">
                                <span class="badge">مرحبا {{ auth()->user()->name ?? '' }}</span>
                                <img src="/assets/imgs/robot.png" alt="bot" class="chat-avatar">
                            </div>

                            {{-- عرض الأسئلة والإجابات السابقة --}}
                            @foreach ($questions as $i => $q)
                            @if (isset($answers[$q['id']]) && $i < $currentIndex)
                                <div class="chat-message position-relative mb-2">
                                <span class="badge">{{ $q['question_text'] }}</span>
                                <img src="/assets/imgs/robot.png" alt="bot" class="chat-avatar">
                        </div>
                        <div class="text-start mb-2">
                            <span class="badge badge-ans">{{ $answers[$q['id']] }}</span>
                        </div>
                        @endif
                        @endforeach

                        {{-- السؤال الحالي --}}
                        @if (isset($questions[$currentIndex]))
                        @php $q = $questions[$currentIndex]; @endphp

                        @if ($q['type'] !== 'checkbox')
                        <div class="chat-message position-relative mb-2">
                            <span class="badge">{{ $q['question_text'] }}</span>
                            <img src="/assets/imgs/robot.png" alt="bot" class="chat-avatar">
                        </div>
                        @endif

                        @if ($q['type'] === 'checkbox')
                        <div class="chat-message position-relative mb-2">
                            <span class="badge">
                                {{ $q['question_text'] }}
                                <div
                                    class="tag-options-container align-items-start d-flex flex-column mt-2">
                                    @foreach (explode(',', $q['options'] ?? '') as $opt)
                                    <div class="tag-option m-1">
                                        <input class="chk-option d-none" type="checkbox"
                                            id="chk-{{ trim($opt) }}" value="{{ trim($opt) }}"
                                            wire:model="checkboxAnswers">
                                        <label class="tag-label"
                                            for="chk-{{ trim($opt) }}">{{ trim($opt) }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </span>
                            <img src="/assets/imgs/robot.png" alt="bot" class="chat-avatar">
                        </div>
                        @endif
                        @else
                        <div class="text-center mt-3 text-success">
                            لقد تم تسجيل استشارتك وسيتم التواصل معك خلال 24 ساعة.
                        </div>
                        @endif
                    </div>

                    {{-- Answer Box --}}
                    <div class="mt-3" id="answer-box">
                        @if (isset($questions[$currentIndex]))
                        @php $q = $questions[$currentIndex]; @endphp

                        @if ($q['type'] === 'text' || $q['type'] === 'number')
                        <div class="position-relative w-100">
                            <input type="{{ $q['type'] }}" wire:model="currentAnswer"
                                class="form-control pe-3" placeholder="اكتب إجابتك هنا">
                            <button wire:click="saveAnswer"
                                class="btn send-ans position-absolute top-50 start-0 translate-middle-y d-flex align-items-center justify-content-center">
                                ارسال
                            </button>
                        </div>
                        @elseif ($q['type'] === 'select')
                        <div class="position-relative w-100">
                            <select wire:model="currentAnswer" class="form-select custom-select">
                                <option value="">اختر</option>
                                @foreach (explode(',', $q['options'] ?? '') as $opt)
                                <option value="{{ trim($opt) }}">{{ trim($opt) }}</option>
                                @endforeach
                            </select>
                            <button wire:click="saveAnswer"
                                class="btn send-ans position-absolute top-50 start-0 translate-middle-y d-flex align-items-center justify-content-center">
                                ارسال
                            </button>
                        </div>
                        @elseif ($q['type'] === 'checkbox')
                        <button id="send-answer" wire:click="saveAnswer"
                            class="btn view-all mt-3 w-100">إرسال</button>
                        @endif
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
</div>

<script>
    document.addEventListener("livewire:init", () => {

        Livewire.on("scroll-bottom", () => {
            const messagesContainer = document.getElementById("chat-messages");
            if (messagesContainer) {

                setTimeout(() => {
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }, 50);
            }
        });
    });

    document.addEventListener('show.bs.modal', function() {
        document.body.style.paddingRight = "0px";
    });
</script>
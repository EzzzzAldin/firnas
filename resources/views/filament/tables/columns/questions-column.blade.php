@php
    $questions = $getState(); // القيمة من العمود (array)
@endphp

@if (is_array($questions) && count($questions))
    <div class="space-y-2">
        @foreach ($questions as $q)
            <div class="border rounded p-2 bg-gray-50">
                <strong class="block text-gray-800">{{ $q['question'] ?? '—' }}</strong>

                @if (isset($q['answer']['chickbox']) && is_array($q['answer']['chickbox']))
                    <ul class="list-disc ms-4 text-gray-700">
                        @foreach ($q['answer']['chickbox'] as $ans)
                            <li>{{ $ans }}</li>
                        @endforeach
                    </ul>
                @else
                    <span class="text-gray-600">{{ $q['answer'] ?? '—' }}</span>
                @endif
            </div>
        @endforeach
    </div>
@else
    <em class="text-gray-500">لا توجد بيانات</em>
@endif

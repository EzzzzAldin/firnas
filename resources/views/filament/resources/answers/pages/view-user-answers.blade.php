<x-filament::page>
    <h2 class="text-2xl font-bold mb-4">
        Answers for User: <span class="text-primary-600">{{ $user->name ?? 'Unknown' }}</span>
        @if ($user)
            <div class="text-sm text-gray-600 mt-1">Phone: {{ $user->phone }}</div>
        @endif
    </h2>

    {{ $this->table }}
</x-filament::page>

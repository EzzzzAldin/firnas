<div>
    <div class="filter-wrapper mt-5">
        <div class="filter-exercise">
            @foreach ($categories as $cat)
                <button class="filter-btn {{ $selectedCategory === $cat ? 'active' : '' }}"
                    wire:click="$set('selectedCategory', '{{ $cat }}')">
                    {{ $cat }}
                </button>
            @endforeach
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            @foreach ($filteredProjects as $index => $project)
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card custom-portfolio-card h-auto shadow-sm border-0">
                        <div class="img-box">
                            <img src="{{ asset('assets/imgs/' . $project['main_image']) }}"
                                class="card-img-top object-fit-contain" alt="..." />
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title bold-text">{{ $project['client'] }}</h5>
                            <p class="card-text">
                                {{ Str::words($project['description'], 4, '...') }}
                            </p>
                            <h6>{{ $project['category'] }}</h6>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <h6 class="">{{ $project['sub-category'] }}</h6>
                                <div class="d-flex align-items-center">
                                    @if (isset($project['flags']) && !empty($project['flags']))
                                        @foreach ($project['flags'] as $flag)
                                            <img src="{{ asset('assets/imgs/' . $flag) }}" alt="flag" width="24"
                                                height="16" class="ms-2">
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <a href="{{ route('portfolio.details', $project['id']) }}"
                                class="btn btn-sm btn-outline-dark btn-read mt-auto align-self-start">مشاهدة</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

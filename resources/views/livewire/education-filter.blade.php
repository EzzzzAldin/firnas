<div>
    <div class="filter-wrapper mt-1">
        <div class="filter-exercise">
            <button wire:click="setCategory('All')"
                class="filter-btn {{ $category === 'All' ? 'active' : '' }}">All</button>
            <button wire:click="setCategory('Branding')"
                class="filter-btn {{ $category === 'Branding' ? 'active' : '' }}">Branding</button>
            <button wire:click="setCategory('Marketing')"
                class="filter-btn {{ $category === 'Marketing' ? 'active' : '' }}">Marketing</button>
            <button wire:click="setCategory('Software')"
                class="filter-btn {{ $category === 'Software' ? 'active' : '' }}">Software</button>
        </div>
    </div>

    <div class="container py-4 mt-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-3 mt-5 custom-card-wrapper">
                    <div class="custom-card">
                        <img src="{{ asset($book['image']) }}" alt="Image" />
                        <div class="category-text">{{ $book['category'] }}</div>
                        <div class="card-title bold-text mt-3">{{ $book['title'] }}</div>
                        <div class="card-footer-custom mt-4">
                            <a href="{{ asset($book['pdf']) }}" target="_blank"
                                class="btn btn-sm btn-outline-dark btn-read">Read</a>
                            <a href="{{ asset($book['pdf']) }}" download>
                                <i class="fa-solid fa-cloud-arrow-down icon-bounce"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

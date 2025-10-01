<section class="eduction" data-aos="fade-down">
    <h2 class="title-main text-center">Eduction</h2>
    <p class="text-center mt-3">
        Discover our hand-picked marketing books, guides, and resources — ready
        to read or download for free.
    </p>



    <div class="container position-relative mt-5">
        <button id="prevBtn" class="slider-arrow left-arrow">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button id="nextBtn" class="slider-arrow right-arrow">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="slider-container overflow-hidden">
            <div class="slider-track d-flex" id="sliderTrack">
                @foreach ($books ?? [] as $book)
                    <div class="slide-card px-2">
                        <div class="custom-card-wrapper">
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
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('education.details') }}" class="view-all btn btn-outline-dark px-4 py-2">
                View All
            </a>
        </div>
    </div>

</section>


<script>
    const track = document.getElementById('sliderTrack');
    const slides = document.querySelectorAll('.slide-card');
    const totalSlides = slides.length;
    const slideWidth = slides[0].offsetWidth;
    let currentIndex = 0;

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentIndex < totalSlides - 4) {
            currentIndex++;
            updateSlider();
        }
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
    });

    function updateSlider() {
        const offset = -currentIndex * slideWidth;
        track.style.transform = `translateX(${offset}px)`;
    }
    window.addEventListener('resize', updateSlider);
</script>

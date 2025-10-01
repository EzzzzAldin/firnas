<section class="blogs" data-aos="fade-right">
    <h2 class="title-main text-center">
        Read Our Latest News & Blog Get Every Update
    </h2>

    <div class="container py-4 mt-3">
        <div class="row justify-content-center">

            @php
                $blogs = [
                    ['img' => 'Rectangle 1317.png'],
                    ['img' => 'Rectangle 1317.png'],
                    ['img' => 'Rectangle 1318.png'],
                    ['img' => 'Rectangle 1317.png'],
                ];
            @endphp

            @foreach ($blogs as $index => $blog)
                <div class="col-12 col-md-2 mt-5 custom-card-wrapper"
                    data-aos="{{ $index % 2 === 0 ? 'fade-up' : 'fade-down' }}">
                    <div class="custom-card">
                        <img src="{{ asset('assets/imgs/' . $blog['img']) }}" alt="Image" />
                        <div class="container-card">
                            <div class="category-text">Branding</div>
                            <a href="{{ url('/blogs-details/1') }}"
                                class="card-title bold-text mt-3 d-block text-decoration-none">
                                Integer Maecenas Eget Viverra
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Add empty column as spacer (like original col-1) --}}
                @if ($loop->iteration < count($blogs))
                    <div class="col-1 d-none d-md-block"></div>
                @endif
            @endforeach

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ url('blogs') }}" class="view-all btn btn-outline-dark px-4 py-2">
                    View All
                </a>
            </div>
        </div>
    </div>
</section>

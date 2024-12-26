    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach ($heroes as $key => $hero)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <!-- Menampilkan gambar hero dari database -->
                    <img src="{{ asset('storage/' . $hero->hero_image) }}" alt="Hero Image">
                    <div class="carousel-container">
                        <h2>{{ ucwords(strtolower($hero->title_hero)) }}</h2>
                        <p>{{ ucwords(strtolower($hero->description)) }}</p>
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach
            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

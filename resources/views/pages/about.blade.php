@extends('layouts.app')

@section('title', 'About Us - Sipi Falls')

@section('content')
<!-- Header Section -->
<section class="reveal" style="background: linear-gradient(135deg, #ffffff 0%, #228B22 30%); color: #ffffff; padding: 4rem 0;">
    <div class="container-fluid px-4">
        <h2 class="text-center" style="font-family: 'Montserrat', sans-serif; font-size: 3rem; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            Every waterfall has a story — <br><span style="font-style: italic; color: #E8B923;">and ours begins at Sipi!</span>
        </h2>
        <hr style="border-top: 5px solid #6FCF97; width: 60%; margin: 1rem auto; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
        <p class="lead text-center" style="font-family: 'Montserrat', sans-serif; font-size: 1.2rem; color: #ffffff;">
            Flowing from Mount Elgon's heart, Sipi's three cascades inspire sustainable adventures and Sabiny culture. Discover their timeless legacy.
        </p>
        <div class="text-center mt-4">
            <a href="#story-heading" class="btn btn-lg shadow-sm" role="button" aria-label="Learn more about Sipi Falls' story" 
                style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer; transition: all 0.3s ease; font-family: 'Montserrat', sans-serif;"
                onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
                onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
                Discover Our Story
            </a>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section class="py-5 reveal" style="background: linear-gradient(135deg, #ffffff 0%, #d1e7dd 100%);">
    <div class="container-fluid px-4">
        <h2 class="text-center mb-5 fw-bold" style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
            Discover the Legacy of Sipi Falls
        </h2>
        <div class="row g-4">
            <!-- Our Story -->
            <div class="col-md-6 history-section" 
                 style="background-image: url({{ asset('images/cave.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 1rem 1rem; border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10); position: relative; overflow: hidden;" 
                 role="region" 
                 aria-labelledby="story-heading" 
                 aria-describedby="story-desc">
                <!-- Blur overlay -->
                <div style="position: absolute; inset: 0; background: inherit; background-size: cover; background-position: center; filter: blur(6px) brightness(0.45); transform: scale(1.03); z-index: 0;"></div>
                
                <!-- Content -->
                <div style="position: relative; z-index: 1;">
                    <h2 id="story-heading" class="fs-3" style="color: #ffffff; font-family: 'Montserrat', sans-serif; font-weight: 700; letter-spacing: 1px; margin-bottom: 1.5rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                        Our Story: Legends and History
                    </h2>
                    <p id="story-desc" style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                        On Mount Elgon's emerald slopes, Sipi Falls was born—three wild sisters cascading like poetry,
                        their waters whispering tales of ancient wonder. The name "Sipi" honors a fever-healing herb
                        cherished by the Sabiny people, a name British explorers etched into maps, unable to capture its magic.
                    </p>
                    <hr style="border-top: 2px solid #6FCF97; width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
                    <p style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                        Here, moments come alive—climbing cliffs with your heart racing, sipping coffee warmed by the 
                        earth, or standing before the falls, feeling timeless.
                        Sipi is where legends are felt, not just told, inviting you to join its story.
                    </p>
                    <hr style="border-top: 2px solid #6FCF97; width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
                    <p style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                        Sipi Falls is not just a destination; it's a journey into the heart of nature and culture. 
                        Join us at Sipi Falls, where every drop of water carries a story, and every visit becomes part of our living legend.
                    </p>
                </div>
            </div>

            <!-- Mission & Vision Cards -->
            <div class="col-md-6 d-flex flex-column gap-4">
                <!-- Mission Card -->
                <div class="card shadow-sm rounded-4" 
                     style="background: #ffffff; border-radius: 1.2rem; border: 2px solid #6FCF97; padding: 1.5rem;" 
                     role="region" 
                     aria-labelledby="mission-heading">
                    <h2 id="mission-heading" class="card-title fs-3" style="color: #228B22; font-family: 'Montserrat', sans-serif; font-weight: 700;">
                        <i class="fas fa-bullseye me-2" style="color: #228B22;"></i> Mission
                    </h2>
                    <p class="card-text" style="font-size: 1.18rem; color: #333333; line-height: 1.7; margin-bottom: 1rem;">
                        To share Sipi Falls' natural beauty and cultural richness with the world, offering authentic experiences while supporting the Sabiny community through sustainable tourism.
                    </p>
                    <p class="card-text small" style="font-size: 1rem; color: #333333; line-height: 1.6;">
                        We partner with local guides and artisans to create eco-friendly adventures that uplift the community and preserve the environment.
                    </p>
                </div>
                
                <!-- Vision Card -->
                <div class="card shadow-sm rounded-4" 
                     style="background: #ffffff; border-radius: 1.2rem; border: 2px solid #6FCF97; padding: 1.5rem;" 
                     role="region" 
                     aria-labelledby="vision-heading">
                    <h2 id="vision-heading" class="card-title fs-3" style="color: #228B22; font-family: 'Montserrat', sans-serif; font-weight: 700;">
                        <i class="fas fa-eye me-2" style="color: #228B22;"></i> Vision
                    </h2>
                    <p class="card-text" style="font-size: 1.18rem; color: #333333; line-height: 1.7; margin-bottom: 1rem;">
                        To be East Africa's leading eco-friendly adventure hub, preserving Mount Elgon's wonders for future generations while empowering our community.
                    </p>
                    <p class="card-text small" style="font-size: 1rem; color: #333333; line-height: 1.6;">
                        We aim to inspire global travelers with sustainable practices, showcasing Sipi's beauty while fostering economic growth for locals.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Tour Guide Team with Hover Overlay -->
  <section class="py-5 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">Meet Our Tour Guides</h2>
      <div class="row g-4 justify-content-center">
        @forelse($tourGuides as $guide)
        <div class="col-md-4">
          <div class="card h-100 shadow-sm rounded-4 text-center p-3 team-card position-relative overflow-hidden" style="border: none; background: var(--neutral-offwhite); box-shadow: 0 2px 16px rgba(34,139,34,0.10);">
            @if($guide->photo)
            <img src="{{ asset($guide->photo) }}" alt="{{ $guide->name }}, {{ $guide->title }} at Sipi Falls" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-green);" loading="lazy">
            @else
            <img src="{{ asset('images/tourguide1.jpg') }}" alt="{{ $guide->name }}, {{ $guide->title }} at Sipi Falls" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-green);" loading="lazy">
            @endif
            <h4 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; margin-bottom: 0.5rem;">{{ $guide->name }}</h4>
            <p class="text-muted small mb-2">{{ $guide->title }} • {{ $guide->years_experience }} years experience</p>
            <p style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6; margin-bottom: 1rem;">{{ $guide->bio }}</p>
            @if($guide->phone || $guide->email)
            <div class="team-overlay d-flex flex-column justify-content-center align-items-center" tabindex="0" aria-label="Connect with {{ $guide->name }}">
              <span class="fw-bold mb-2" style="color: var(--neutral-gray);">Connect:</span>
              <div>
                @if($guide->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $guide->phone) }}" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="{{ $guide->name }}'s WhatsApp"><i class="fab fa-whatsapp"></i></a>
                @endif
                @if($guide->email)
                <a href="mailto:{{ $guide->email }}" class="fs-4" style="color: var(--secondary-teal);" aria-label="{{ $guide->name }}'s Email"><i class="fas fa-envelope"></i></a>
                @endif
              </div>
            </div>
            @endif
            <div class="text-center mt-2">
              <a href="{{ route('travelguide') }}#book-tour" class="btn clickable-btn shadow-sm" role="button" aria-label="Book a tour with {{ $guide->name }}"
                style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal); font-size: 0.9rem;">
                Book with {{ $guide->name }}
              </a>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p style="color: var(--neutral-gray); font-size: 1.1rem;">No tour guides available at the moment.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Video Section -->
  <section class="video-section reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <div class="video-wrapper" style="background: var(--neutral-offwhite); border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10); padding: 2.5rem 2rem; max-width: 900px; margin: 0 auto;" role="region" aria-label="Video showcasing Sipi Falls">
        <h2 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 2.5rem; letter-spacing: 1px; margin-bottom: 1.5rem;">Watch Our Story</h2>
        <p style="font-size: 1.13rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">Experience the magic of Sipi Falls through this captivating video.</p>
        <div class="video-container" style="position: relative; width: 100%; max-width: 100%; height: 0; padding-bottom: 56.25%; border-radius: 0.7rem; overflow: hidden; background: var(--neutral-gray);">
          <video src="../images/banner.mp4" controls autoplay muted loop poster="../images/banner.jpg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;" aria-label="Video tour of Sipi Falls' waterfalls and Sabiny culture">
            <p>Your browser does not support the video tag. View a <a href="../images/sipi-falls-still.jpg" style="color: var(--accent-gold);">still image</a> of Sipi Falls instead.</p>
          </video>
        </div>
        <div class="text-center mt-3">
          <a href="../pages/travelguide.html#activities" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Explore activities at Sipi Falls"
            style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
            Explore Activities
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection

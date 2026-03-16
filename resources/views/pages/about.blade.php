@extends('layouts.app')

@section('title', 'About Us - Sipi Falls')

@section('content')
  <!-- Header Section -->
  <section class="reveal" style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('images/BANNER.jpg') }}') center/cover no-repeat; background-attachment: fixed; color: white; padding: 6rem 0;">
      <div class="container-fluid px-4">
          <h2 class="text-center" style="font-family: var(--font-display); font-size: 3rem; font-weight: 800; color: white;">
              Every waterfall has a story — <br><span style="font-style: italic; color: var(--accent-gold);">and ours begins at Sipi!</span>
          </h2>
          <hr style="border: none; border-top: 2px solid var(--accent-gold); width: 60%; margin: 1.5rem auto; opacity: 0.6;">
          <p class="lead text-center" style="font-family: var(--font-body); font-size: 1.2rem; color: #ffffff;">
              Flowing from Mount Elgon's heart, Sipi's three cascades inspire sustainable adventures and Sabiny culture. Discover their timeless legacy.
          </p>
          <div class="text-center mt-4">
              <a href="#story-heading" class="btn btn-lg shadow-sm" role="button" aria-label="Learn more about Sipi Falls' story" 
                  style="background-color: transparent; color: white; border: 2px solid white; padding: 0.85rem 2.5rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; text-decoration: none; transition: all 0.3s; cursor: pointer;"
                  onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white'; this.style.color='white';">
                  Discover Our Story
              </a>
          </div>
      </div>
  </section>

  <!-- Legacy Section -->
  <section class="py-5 reveal" style="background: var(--neutral-light);">
      <div class="container-fluid px-4">
          <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">
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
                      <h2 id="story-heading" class="fs-3" style="color: #ffffff; font-family: var(--font-display); font-weight: 700; letter-spacing: 1px; margin-bottom: 1.5rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                          Our Story: Legends and History
                      </h2>
                      <p id="story-desc" style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                          On Mount Elgon's emerald slopes, Sipi Falls was born—three wild sisters cascading like poetry,
                          their waters whispering tales of ancient wonder. The name "Sipi" honors a fever-healing herb
                          cherished by the Sabiny people, a name British explorers etched into maps, unable to capture its magic.
                      </p>
                      <hr style="border-top: 1px solid rgba(255,255,255,0.3); width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
                      <p style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                          Here, moments come alive—climbing cliffs with your heart racing, sipping coffee warmed by the 
                          earth, or standing before the falls, feeling timeless.
                          Sipi is where legends are felt, not just told, inviting you to join its story.
                      </p>
                      <hr style="border-top: 1px solid rgba(255,255,255,0.3); width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
                      <p style="font-size: 1.18rem; color: #ffffff; line-height: 1.7; margin-bottom: 1rem; text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);">
                          Sipi Falls is not just a destination; it's a journey into the heart of nature and culture. 
                          Join us at Sipi Falls, where every drop of water carries a story, and every visit becomes part of our living legend.
                      </p>
                  </div>
              </div>

              <!-- Mission & Vision Cards -->
              <div class="col-md-6 d-flex flex-column gap-4">
                  <!-- Mission Card -->
                  <div class="card shadow-sm rounded-4 reveal-left" 
                      style="background: #ffffff; border-radius: 0.375rem; border: none; border-top: 4px solid var(--accent-gold); padding: 1.5rem;" 
                      role="region" 
                      aria-labelledby="mission-heading">
                      <h2 id="mission-heading" class="card-title fs-3" style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700;">
                          <i class="fas fa-bullseye me-2" style="color: var(--accent-gold);"></i> Mission
                      </h2>
                      <p class="card-text" style="font-size: 1.18rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">
                          To share Sipi Falls' natural beauty and cultural richness with the world, offering authentic experiences while supporting the Sabiny community through sustainable tourism.
                      </p>
                      <p class="card-text small" style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6;">
                          We partner with local guides and artisans to create eco-friendly adventures that uplift the community and preserve the environment.
                      </p>
                  </div>
                  
                  <!-- Vision Card -->
                  <div class="card shadow-sm rounded-4 reveal-right" 
                      style="background: #ffffff; border-radius: 0.375rem; border: none; border-top: 4px solid var(--accent-gold); padding: 1.5rem;" 
                      role="region" 
                      aria-labelledby="vision-heading">
                      <h2 id="vision-heading" class="card-title fs-3" style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700;">
                          <i class="fas fa-eye me-2" style="color: var(--accent-gold);"></i> Vision
                      </h2>
                      <p class="card-text" style="font-size: 1.18rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">
                          To be East Africa's leading eco-friendly adventure hub, preserving Mount Elgon's wonders for future generations while empowering our community.
                      </p>
                      <p class="card-text small" style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6;">
                          We aim to inspire global travelers with sustainable practices, showcasing Sipi's beauty while fostering economic growth for locals.
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </section>

<!-- Tour Guide Team — Card Grid Layout -->
<section class="reveal py-5" style="background: var(--neutral-light); padding-top: 1.5rem !important; padding-bottom: 2rem !important;">
    <div class="container">
        <p class="text-center" style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 0.75rem;">The People Behind The Experience</p>
        <h2 class="text-center mb-5" style="color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">Meet Our Tour Guides</h2>

        <div class="row g-4">
            @forelse($tourGuides as $guide)
            <div class="col-md-4">
                <div style="background: white; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%;"
                     onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)';">

                    <!-- Top color bar -->
                    <div style="height: 4px; background: var(--accent-gold);"></div>

                    <div style="padding: 1.25rem; text-align: center;">
                        <!-- Photo -->
                        <div style="margin-bottom: 0.75rem;">
                            @if($guide->photo)
                            <img src="{{ asset($guide->photo) }}"
                                 alt="{{ $guide->name }}, {{ $guide->title }} at Sipi Falls"
                                 style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--accent-gold); box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                                 loading="lazy">
                            @else
                            <img src="{{ asset('images/tourguide1.jpg') }}"
                                 alt="{{ $guide->name }}, {{ $guide->title }} at Sipi Falls"
                                 style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--accent-gold); box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                                 loading="lazy">
                            @endif
                        </div>

                        <!-- Name -->
                        <h4 style="color: var(--primary-green); font-family: var(--font-display); font-size: 1.3rem; font-weight: 700; margin-bottom: 0.25rem;">{{ $guide->name }}</h4>

                        <!-- Title & Experience -->
                        <p style="color: var(--accent-gold); font-family: var(--font-body); font-size: 0.8rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.25rem;">{{ $guide->title }}</p>
                        <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.8rem; opacity: 0.6; margin-bottom: 0.5rem;">{{ $guide->years_experience }} years experience</p>

                        <!-- Divider -->
                        <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0 auto 0.5rem; opacity: 0.5;"></div>

                        <!-- Bio -->
                        <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.85rem; line-height: 1.5; margin-bottom: 0.75rem;">{{ $guide->bio }}</p>

                        <!-- Contact Icons -->
                        @if($guide->phone || $guide->email)
                        <div style="display: flex; gap: 0.75rem; justify-content: center; margin-bottom: 0.75rem;">
                            @if($guide->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $guide->phone) }}"
                               style="color: var(--accent-gold); font-size: 1.4rem; text-decoration: none; transition: transform 0.2s;"
                               aria-label="{{ $guide->name }}'s WhatsApp"
                               onmouseover="this.style.transform='scale(1.2)';"
                               onmouseout="this.style.transform='scale(1)';">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            @endif
                            @if($guide->email)
                            <a href="mailto:{{ $guide->email }}"
                               style="color: var(--accent-gold); font-size: 1.4rem; text-decoration: none; transition: transform 0.2s;"
                               aria-label="{{ $guide->name }}'s Email"
                               onmouseover="this.style.transform='scale(1.2)';"
                               onmouseout="this.style.transform='scale(1)';">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                        @endif

                        <!-- Book Button -->
                        <a href="{{ route('travelguide') }}#book-tour"
                           role="button"
                           aria-label="Book a tour with {{ $guide->name }}"
                           style="display: inline-block; background-color: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); padding: 0.6rem 1.5rem; font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; border-radius: 0.25rem; transition: all 0.3s; text-decoration: none; width: 100%;"
                           onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                           onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='var(--primary-green)'; this.style.color='var(--primary-green)';">
                            Book with {{ $guide->name }}
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p style="color: var(--neutral-gray); font-size: 1.1rem; font-family: var(--font-body);">No tour guides available at the moment. Add guides from the admin panel.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

  <!-- Video Section -->
  <section class="video-section reveal py-3" style="background: var(--neutral-light); position: relative; z-index: 1;">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <div class="video-wrapper" style="background: var(--neutral-offwhite); border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10); padding: 1.5rem; max-width: 750px; margin: 0 auto;" role="region" aria-label="Video showcasing Sipi Falls">
        <h2 style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 1.8rem; letter-spacing: 1px; margin-bottom: 0.75rem;">Watch Our Story</h2>
        <p style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 0.75rem;">Experience the magic of Sipi Falls through this captivating video.</p>
        <div class="video-container" style="position: relative; width: 100%; max-width: 100%; height: 0; padding-bottom: 56.25%; border-radius: 0.7rem; overflow: hidden; background: var(--neutral-gray);">
          <video src="{{ asset('images/VID-20250305-WA0000.mp4') }}" controls autoplay muted loop style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;" aria-label="Video tour of Sipi Falls' waterfalls and Sabiny culture">
            <p>Your browser does not support the video tag.</p>
          </video>
        </div>
        <div class="text-center mt-3">
          <a href="{{ route('travelguide') }}#activities" role="button" aria-label="Explore activities at Sipi Falls"
            style="background-color: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); padding: 0.6rem 2rem; font-family: var(--font-body); font-weight: 600; border-radius: 0.25rem; transition: all 0.3s; text-decoration: none;"
            onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
            onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='var(--primary-green)'; this.style.color='var(--primary-green)';">
            Explore Activities
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection

@extends('layouts.app')

@section('title', 'Sipi Falls - Keep Sipping!!')

@section('content')
    <!-- Hero Section - Video Background -->
    <section class="relative h-screen overflow-hidden w-full reveal">
        <!-- Video Background -->
        <div class="absolute inset-0 z-0">
            <video 
                autoplay 
                loop 
                muted 
                playsinline
                class="absolute inset-0 w-full h-full object-cover"
                aria-label="Sipi Falls video background">
                <source src="{{ asset('images/banner.mp4') }}" type="video/mp4">
                <!-- Fallback image if video doesn't load -->
                <img src="{{ asset('images/BANNER.jpg') }}" alt="Sipi Falls" class="w-full h-full object-cover">
            </video>
            <!-- Dark overlay for better text readability -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        
        <!-- Hero Content Overlay -->
        <div class="absolute inset-0 flex items-center justify-center z-10 p-8 max-w-[90%] mx-auto">
            <div class="text-center space-y-6">
                <!-- Mood Setter -->
                <p class="text-[var(--accent-gold)] font-light text-lg md:text-xl tracking-widest uppercase drop-shadow-lg" 
                style="font-family: var(--font-body);">
                    In Nature, Nothing is perfect,
                </p>
                
                <!-- Hero Statement -->
                <h1 class="text-white font-bold text-6xl md:text-7xl lg:text-8xl tracking-wide drop-shadow-xl" 
                    style="font-family: var(--font-display);">
                    And Everything Is Perfect.
                </h1>
            </div>
        </div>

        <!-- Scroll Indicator — pinned to bottom of hero -->
        <div class="absolute bottom-8 left-0 right-0 z-10" style="display: flex; flex-direction: column; align-items: center; gap: 0.5rem; opacity: 0.6;">
            <span style="font-family: var(--font-body); font-size: 0.65rem; letter-spacing: 0.3em; color: white; text-transform: uppercase;">Scroll to explore</span>
            <div style="width: 1px; height: 40px; background: linear-gradient(180deg, white, transparent);"></div>
        </div>
    </section>

    <!-- Description Section - Fixed with working styles -->
    <section class="reveal" style="background-color: #ffffff; padding: 2.5rem 0;">
        <div class="container mx-auto px-4 py-2">
            <!-- Section Heading -->
            <h2 class="text-center mb-8 font-bold font-sans" 
                style="font-size: 3rem; color: var(--primary-green); letter-spacing: 1px; font-family: var(--font-display);">
                Where Waters Roar and Wild Hearts Soar!
            </h2>
            
            <!-- Cards Container -->
            <div class="flex flex-col lg:flex-row justify-center items-stretch gap-6 max-w-6xl mx-auto">
                <!-- Timeline Card (Left) -->
                <div class="flex-1 flex reveal-left">
                    <div class="w-full p-6 rounded-2xl" style="border-left: 3px solid var(--accent-gold, #E8B923); padding-left: 1.5rem;">
                        <h3 class="mb-6 font-bold font-sans" 
                            style="font-size: 1.5rem; color: var(--primary-green); font-family: var(--font-display);">
                            Why Visit Sipi Falls?
                        </h3>
                        
                        <!-- Custom Timeline -->
                        <div class="relative ml-6 pl-6">
                            <!-- Timeline Line -->
                            <div class="absolute w-1 rounded-full" 
                                style="left: 0.5rem; top: 0.5rem; bottom: 0.5rem; background: var(--accent-gold, #E8B923); opacity: 0.3;"></div>
                            
                            <!-- Timeline Items -->
                            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                                <div class="relative flex items-start" style="min-height: 40px;">
                                    <!-- Timeline Dot -->
                                    <div class="absolute rounded-full border-3" 
                                        style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                    <!-- Content -->
                                    <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                        Experience three breathtaking waterfalls cascading down Mount Elgon
                                    </span>
                                </div>
                                
                                <div class="relative flex items-start" style="min-height: 40px;">
                                    <div class="absolute rounded-full" 
                                        style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                    <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                        Hike scenic mountain trails with stunning panoramic views
                                    </span>
                                </div>
                                
                                <div class="relative flex items-start" style="min-height: 40px;">
                                    <div class="absolute rounded-full" 
                                        style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                    <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                        Immerse yourself in the rich culture of the Sabiny people
                                    </span>
                                </div>
                                
                                <div class="relative flex items-start" style="min-height: 40px;">
                                    <div class="absolute rounded-full" 
                                        style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                    <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                        Abseil 100m down East Africa's most thrilling waterfall
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image Card (Right) -->
                <div class="flex-1 flex reveal-right">
                    <div class="w-full rounded-none shadow-lg overflow-hidden" 
                        style="min-height: 300px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                        <div class="w-full h-full rounded-none" 
                            style="background: url('{{ asset('images/BANNER.jpg') }}') no-repeat center center; background-size: cover; min-height: 300px;"
                            role="img" 
                            aria-label="Scenic view of Sipi Falls">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Masonry Gallery Section -->
    <section class="reveal" style="background: #1a1a1a; padding: 3rem 0;">
        <div class="container">
            <!-- Section Header -->
            <p class="text-center" style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 0.75rem;">Through The Lens</p>
            <h2 class="text-center" style="font-family: var(--font-display); color: white; font-size: 2.75rem; margin-bottom: 0.5rem;">Sipi Falls in Pictures</h2>
            <p class="text-center" style="font-family: var(--font-body); color: rgba(255,255,255,0.5); font-size: 1rem; margin-bottom: 3rem;">Every image tells a story. Come write yours.</p>

            <!-- Masonry Grid -->
            <div id="masonry-gallery" style="columns: 3; column-gap: 0.5rem;">

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/falls/waterfall-base.jpg') }}', 'Sipi Main Falls — 100m drop')">
                    <img src="{{ asset('images/gallery/falls/waterfall-base.jpg') }}" alt="Sipi Main Falls" loading="lazy">
                    <div class="gallery-overlay"><span>Sipi Main Falls — 100m drop</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/mountain/sunset-toast.jpg') }}', 'Golden hour at the summit')">
                    <img src="{{ asset('images/gallery/mountain/sunset-toast.jpg') }}" alt="Golden hour sunset" loading="lazy">
                    <div class="gallery-overlay"><span>Golden hour at the summit</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/adventure/abseil-freedom.jpg') }}', 'Abseiling the main falls')">
                    <img src="{{ asset('images/gallery/adventure/abseil-freedom.jpg') }}" alt="Abseiling Sipi Falls" loading="lazy">
                    <div class="gallery-overlay"><span>Abseiling the main falls</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/falls/waterfall-rainbow.jpg') }}', 'Rainbow over Sipi Falls')">
                    <img src="{{ asset('images/gallery/falls/waterfall-rainbow.jpg') }}" alt="Rainbow over Sipi Falls" loading="lazy">
                    <div class="gallery-overlay"><span>Rainbow over Sipi Falls</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/adventure/rock-climbing.jpg') }}', 'Rock climbing adventure')">
                    <img src="{{ asset('images/gallery/adventure/rock-climbing.jpg') }}" alt="Rock climbing Sipi Falls" loading="lazy">
                    <div class="gallery-overlay"><span>Rock climbing adventure</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/mountain/sunset-friends.jpg') }}', 'Sunset views from Mount Elgon')">
                    <img src="{{ asset('images/gallery/mountain/sunset-friends.jpg') }}" alt="Sunset Mount Elgon" loading="lazy">
                    <div class="gallery-overlay"><span>Sunset views from Mount Elgon</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/falls/waterfall-hikers.jpg') }}', 'Hiking to the base of the falls')">
                    <img src="{{ asset('images/gallery/falls/waterfall-hikers.jpg') }}" alt="Hikers at Sipi Falls" loading="lazy">
                    <div class="gallery-overlay"><span>Hiking to the base of the falls</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/mountain/mt-elgon.jpg') }}', 'Mount Elgon peak')">
                    <img src="{{ asset('images/gallery/mountain/mt-elgon.jpg') }}" alt="Mount Elgon peak" loading="lazy">
                    <div class="gallery-overlay"><span>Mount Elgon peak</span></div>
                </div>

                <div class="gallery-item" onclick="openLightbox('{{ asset('images/gallery/falls/BANNER.jpg') }}', 'The triple falls of Sipi')">
                    <img src="{{ asset('images/gallery/falls/BANNER.jpg') }}" alt="Triple falls Sipi" loading="lazy">
                    <div class="gallery-overlay"><span>The triple falls of Sipi</span></div>
                </div>

            </div>

            <!-- View All Button -->
            <div class="text-center mt-5">
                <a href="{{ route('travelguide') }}" style="font-family: var(--font-body); font-size: 0.875rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; color: white; border: 2px solid white; padding: 0.875rem 2.5rem; text-decoration: none; display: inline-block; transition: all 0.3s; border-radius: 0.25rem;"
                onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                onmouseout="this.style.background='transparent'; this.style.borderColor='white'; this.style.color='white';">
                    Explore Full Gallery
                </a>
            </div>
        </div>

        <!-- Lightbox -->
        <div id="lightbox" onclick="if(event.target===this) closeLightbox()" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.95); z-index: 9999; align-items: center; justify-content: center; flex-direction: column;">
            <button onclick="closeLightbox()" style="position: absolute; top: 1.5rem; right: 1.5rem; background: none; border: none; color: white; font-size: 2rem; cursor: pointer; line-height: 1;">✕</button>
            <img id="lightbox-img" src="" alt="" style="max-width: 90vw; max-height: 80vh; object-fit: contain;">
            <p id="lightbox-caption" style="font-family: var(--font-body); color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-top: 1rem; letter-spacing: 0.1em;"></p>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="reveal" style="background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url('{{ asset('images/BANNER.jpg') }}') center/cover no-repeat fixed; padding: 5rem 0;">
        <div class="container">
            <!-- Section Label -->
            <p class="text-center mb-5" style="font-family: var(--font-body); font-size: var(--text-sm); letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); opacity: 0.9;">
                Sipi Falls in Numbers
            </p>

            <div class="row text-center g-4">
                <!-- Stat 1 -->
                <div class="col-6 col-md-3">
                    <div style="padding: 1.5rem;">
                        <h2 class="counter" data-target="3" style="font-family: var(--font-display); font-size: 4rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.5rem;">0</h2>
                        <div style="width: 40px; height: 2px; background: var(--accent-gold); margin: 0.75rem auto; opacity: 0.5;"></div>
                        <p style="font-family: var(--font-body); font-size: var(--text-sm); letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.8); margin: 0;">Majestic Waterfalls</p>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="col-6 col-md-3">
                    <div style="padding: 1.5rem;">
                        <h2 class="counter" data-target="100" data-suffix="m" style="font-family: var(--font-display); font-size: 4rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.5rem;">0</h2>
                        <div style="width: 40px; height: 2px; background: var(--accent-gold); margin: 0.75rem auto; opacity: 0.5;"></div>
                        <p style="font-family: var(--font-body); font-size: var(--text-sm); letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.8); margin: 0;">Main Fall Height</p>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="col-6 col-md-3">
                    <div style="padding: 1.5rem;">
                        <h2 class="counter" data-target="300" data-suffix="+" style="font-family: var(--font-display); font-size: 4rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.5rem;">0</h2>
                        <div style="width: 40px; height: 2px; background: var(--accent-gold); margin: 0.75rem auto; opacity: 0.5;"></div>
                        <p style="font-family: var(--font-body); font-size: var(--text-sm); letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.8); margin: 0;">Bird Species</p>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="col-6 col-md-3">
                    <div style="padding: 1.5rem;">
                        <h2 class="counter" data-target="5000" data-suffix="+" style="font-family: var(--font-display); font-size: 4rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.5rem;">0</h2>
                        <div style="width: 40px; height: 2px; background: var(--accent-gold); margin: 0.75rem auto; opacity: 0.5;"></div>
                        <p style="font-family: var(--font-body); font-size: var(--text-sm); letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.8); margin: 0;">Happy Adventurers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="reveal" style="background: linear-gradient(rgba(0,0,0,0.72), rgba(0,0,0,0.72)), url('{{ asset('images/gallery/falls/waterfall-base.jpg') }}') center/cover no-repeat fixed; padding: 4rem 0;">
        <div class="container text-center">
            <!-- Label -->
            <p style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 1rem;">Your Adventure Awaits</p>

            <!-- Heading -->
            <h2 style="font-family: var(--font-display); color: white; font-size: 3rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
                Ready to Experience<br>
                <span style="color: var(--accent-gold); font-style: italic;">Sipi Falls?</span>
            </h2>

            <!-- Subtext -->
            <p style="font-family: var(--font-body); color: rgba(255,255,255,0.7); font-size: 1rem; max-width: 500px; margin: 0 auto 2.5rem; line-height: 1.8;">
                Three magnificent waterfalls. Endless adventures. One unforgettable destination in the heart of Uganda.
            </p>

            <!-- Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('travelguide') }}#book-tour"
                style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: var(--primary-green); color: white; border: 2px solid var(--primary-green); padding: 1rem 2.5rem; text-decoration: none; display: inline-block; transition: all 0.3s; border-radius: 0.25rem;"
                onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                onmouseout="this.style.background='var(--primary-green)'; this.style.borderColor='var(--primary-green)'; this.style.color='white';">
                    Plan My Trip
                </a>
                <a href="{{ route('travelguide') }}"
                style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: transparent; color: white; border: 2px solid white; padding: 1rem 2.5rem; text-decoration: none; display: inline-block; transition: all 0.3s; border-radius: 0.25rem;"
                onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                onmouseout="this.style.background='transparent'; this.style.borderColor='white'; this.style.color='white';">
                    View Travel Guide
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="container-fluid py-4 reveal" style="background: #F5F6F9;">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">
                Hear From Our Adventurers
            </h2>
            
            <!-- Testimonial Carousel Container -->
            <div style="position: relative; max-width: 1200px; margin: 0 auto;">
                <!-- Previous Arrow -->
                <button onclick="moveTestimonialCarousel(-1)" 
                        class="testimonial-arrow testimonial-arrow-prev" 
                        aria-label="Previous testimonials"
                        style="position: absolute; left: -60px; top: 50%; transform: translateY(-50%); background: var(--primary-green); color: white; border: none; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: all 0.3s; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                        onmouseover="this.style.background='var(--accent-gold)'; this.style.transform='translateY(-50%) scale(1.1)';"
                        onmouseout="this.style.background='var(--primary-green)'; this.style.transform='translateY(-50%) scale(1)';">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <!-- Carousel Track -->
                <div class="testimonial-carousel-track" style="overflow: hidden;">
                    <div class="testimonial-carousel-inner" style="display: flex; transition: transform 0.5s ease;">
                        @forelse($testimonials as $testimonial)
                        <!-- Testimonial Card -->
                        <div class="testimonial-slide" style="min-width: 50%; padding: 0 15px; box-sizing: border-box;">
                            <div class="card h-100 shadow-lg border-0 p-4 testimonial-card" style="background: #ffffff; border-left: 4px solid var(--accent-gold, #E8B923); border-radius: 0.5rem; text-align: left; padding: 2rem;">
                                <!-- Decorative Quote Mark -->
                                <div style="font-size: 4rem; line-height: 0.5; color: var(--accent-gold, #E8B923); font-family: Georgia, serif; margin-bottom: 1rem;">"</div>
                                
                                <!-- Quote Text -->
                                <p class="mb-0" style="color: var(--neutral-gray); font-size: 1rem; line-height: 1.8; font-style: italic;">
                                    {{ $testimonial->message }}
                                </p>
                                
                                <!-- Star Rating -->
                                <div class="mb-2 text-warning mt-3" role="img" aria-label="{{ $testimonial->rating }} star rating" style="text-align: left;">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                
                                <!-- Avatar + Name Row -->
                                <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem;">
                                    @php
                                        // Get initials from name
                                        $nameParts = explode(' ', $testimonial->name);
                                        $initials = '';
                                        foreach($nameParts as $part) {
                                            $initials .= strtoupper(substr($part, 0, 1));
                                            if(strlen($initials) >= 2) break;
                                        }
                                        // Generate color based on name
                                        $colors = ['#1a6b1a', '#c9951a', '#2d8b2d', '#e8b923', '#228B22'];
                                        $colorIndex = ord($testimonial->name[0]) % count($colors);
                                        $bgColor = $colors[$colorIndex];
                                    @endphp
                                    <div style="width: 50px; height: 50px; border-radius: 50%; background: {{ $bgColor }}; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.2rem; font-family: var(--font-body); flex-shrink: 0;">
                                        {{ $initials }}
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: var(--primary-green); font-family: var(--font-body);">{{ $testimonial->name }}</div>
                                        <div style="font-size: 0.8rem; color: #888; font-family: var(--font-body);">{{ $testimonial->country }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Default Testimonial if none in database -->
                        <div class="testimonial-slide" style="min-width: 50%; padding: 0 15px; box-sizing: border-box;">
                            <div class="card h-100 shadow-lg border-0 p-4 testimonial-card" style="background: #ffffff; border-left: 4px solid var(--accent-gold, #E8B923); border-radius: 0.5rem; text-align: left; padding: 2rem;">
                                <!-- Decorative Quote Mark -->
                                <div style="font-size: 4rem; line-height: 0.5; color: var(--accent-gold, #E8B923); font-family: Georgia, serif; margin-bottom: 1rem;">"</div>
                                
                                <!-- Quote Text -->
                                <p class="mb-0" style="color: var(--neutral-gray); font-size: 1rem; line-height: 1.8; font-style: italic;">
                                    Add testimonials from the admin panel to showcase visitor experiences!
                                </p>
                                
                                <!-- Star Rating -->
                                <div class="mb-2 text-warning mt-3" role="img" aria-label="5 star rating" style="text-align: left;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                
                                <!-- Avatar + Name Row -->
                                <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem;">
                                    <div style="width: 50px; height: 50px; border-radius: 50%; background: var(--primary-green); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.2rem; font-family: var(--font-body); flex-shrink: 0;">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: var(--primary-green); font-family: var(--font-body);">Our Visitors</div>
                                        <div style="font-size: 0.8rem; color: #888; font-family: var(--font-body);">Worldwide</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                
                <!-- Next Arrow -->
                <button onclick="moveTestimonialCarousel(1)" 
                        class="testimonial-arrow testimonial-arrow-next" 
                        aria-label="Next testimonials"
                        style="position: absolute; right: -60px; top: 50%; transform: translateY(-50%); background: var(--primary-green); color: white; border: none; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: all 0.3s; box-shadow: 0 4px 12px rgba(0,0,0,0.15);"
                        onmouseover="this.style.background='var(--accent-gold)'; this.style.transform='translateY(-50%) scale(1.1)';"
                        onmouseout="this.style.background='var(--primary-green)'; this.style.transform='translateY(-50%) scale(1)';">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Share Your Experience Button -->
    <div class="text-center py-4" style="background: #F5F6F9;">
        <button onclick="document.getElementById('testimonialModal').style.display='flex'; document.body.style.overflow='hidden';"
                style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); padding: 0.875rem 2.5rem; cursor: pointer; transition: all 0.3s; border-radius: 0.25rem;"
                onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                onmouseout="this.style.background='transparent'; this.style.borderColor='var(--primary-green)'; this.style.color='var(--primary-green)';">
            <i class="fas fa-pen" style="margin-right: 0.5rem;"></i> Share Your Experience
        </button>
        @if(session('testimonial_success'))
        <script>
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.getElementById('testimonialModal').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }, 300);
            });
        </script>
        @endif
    </div>

    <!-- Testimonial Submission Modal -->
    <div id="testimonialModal"
         onclick="if(event.target===this){ this.style.display='none'; document.body.style.overflow=''; }"
         style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 9999; align-items: center; justify-content: center; padding: 1rem;">
        <div style="background: white; border-radius: 0.5rem; border-top: 4px solid var(--accent-gold); width: 100%; max-width: 580px; max-height: 90vh; overflow-y: auto; position: relative;">

            <!-- Modal Header -->
            <div style="background: var(--primary-green); padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between;">
                <h5 style="font-family: var(--font-display); color: white; margin: 0; font-size: 1.3rem;">Share Your Sipi Falls Experience</h5>
                <button onclick="document.getElementById('testimonialModal').style.display='none'; document.body.style.overflow='';"
                        style="background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.6); color: white; font-size: 1.25rem; width: 2.2rem; height: 2.2rem; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                    &times;
                </button>
            </div>

            <!-- Modal Body -->
            <div style="padding: 2rem;">

                @if(session('testimonial_success'))
                <div style="text-align: center; padding: 2rem 1rem;">
                    <div style="width: 70px; height: 70px; background: rgba(26,107,26,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-check-circle" style="color: var(--primary-green); font-size: 2.5rem;"></i>
                    </div>
                    <h4 style="font-family: var(--font-display); color: var(--primary-green); margin-bottom: 0.5rem;">Thank You!</h4>
                    <p style="font-family: var(--font-body); color: var(--neutral-gray); margin-bottom: 1.5rem; line-height: 1.7;">Your experience has been successfully submitted! It will appear on our site after a quick review by our team.</p>
                    <button onclick="document.getElementById('testimonialModal').style.display='none'; document.body.style.overflow='';"
                            style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: var(--primary-green); color: white; border: none; padding: 0.75rem 2rem; cursor: pointer; transition: all 0.3s; border-radius: 0.25rem;"
                            onmouseover="this.style.background='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                            onmouseout="this.style.background='var(--primary-green)'; this.style.color='white';">
                        Close
                    </button>
                </div>
                @else

                <form action="{{ route('testimonial.submit') }}" method="POST">
                    @csrf

                    <!-- Name & Country -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem; display: block;">Your Name *</label>
                            <input type="text" name="name" required placeholder="John Doe"
                                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.375rem; font-family: var(--font-body); color: var(--neutral-gray);"
                                   onfocus="this.style.borderColor='var(--primary-green)';"
                                   onblur="this.style.borderColor='#e0e0e0';">
                        </div>
                        <div class="col-md-6">
                            <label style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem; display: block;">Country *</label>
                            <input type="text" name="country" required placeholder="United Kingdom"
                                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.375rem; font-family: var(--font-body); color: var(--neutral-gray);"
                                   onfocus="this.style.borderColor='var(--primary-green)';"
                                   onblur="this.style.borderColor='#e0e0e0';">
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="mb-3">
                        <label style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem; display: block;">Your Rating *</label>
                        <div style="display: flex; gap: 0.5rem;" id="star-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-btn" data-value="{{ $i }}"
                                    style="background: none; border: none; font-size: 2rem; color: #e0e0e0; cursor: pointer; transition: color 0.2s; padding: 0;">
                                ★
                            </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-value" value="5">
                    </div>

                    <!-- Visit Date -->
                    <div class="mb-3">
                        <label style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem; display: block;">When did you visit?</label>
                        <input type="date" name="visit_date"
                               style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.375rem; font-family: var(--font-body); color: var(--neutral-gray);"
                               onfocus="this.style.borderColor='var(--primary-green)';"
                               onblur="this.style.borderColor='#e0e0e0';">
                    </div>

                    <!-- Message -->
                    <div class="mb-4">
                        <label style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem; display: block;">Your Experience *</label>
                        <textarea name="message" required rows="4" placeholder="Tell us about your Sipi Falls experience..."
                                  style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.375rem; font-family: var(--font-body); color: var(--neutral-gray); resize: vertical;"
                                  onfocus="this.style.borderColor='var(--primary-green)';"
                                  onblur="this.style.borderColor='#e0e0e0';"></textarea>
                        <p style="font-family: var(--font-body); font-size: 0.75rem; color: var(--neutral-gray); opacity: 0.6; margin-top: 0.25rem;">Minimum 20 characters</p>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                            style="width: 100%; background: var(--primary-green); color: white; border: none; padding: 1rem; font-family: var(--font-body); font-size: 0.9rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; border-radius: 0.375rem; cursor: pointer; transition: all 0.3s;"
                            onmouseover="this.style.background='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                            onmouseout="this.style.background='var(--primary-green)'; this.style.color='white';">
                        <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i> Submit My Review
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>

@endsection

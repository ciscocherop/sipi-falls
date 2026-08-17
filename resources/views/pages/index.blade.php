@extends('layouts.app')

@push('seo')
<title>Sipi Falls Uganda — Waterfalls, Adventure & Coffee Tours</title>
<meta property="og:title" content="Sipi Falls Uganda — Waterfalls, Adventure & Coffee Tours">
<meta property="og:description" content="Discover three breathtaking waterfalls, abseil 100m cliffs, explore coffee farms and immerse yourself in Sabiny culture. Book your Sipi Falls adventure today.">
<meta property="og:url" content="{{ url('/') }}">
<meta name="twitter:title" content="Sipi Falls Uganda — Waterfalls, Adventure & Coffee Tours">
<meta name="twitter:description" content="Discover three breathtaking waterfalls, abseil 100m cliffs, explore coffee farms and immerse yourself in Sabiny culture.">
@endpush

@section('title', 'Sipi Falls - Keep Sipping!!')

@push('styles')
<style>
/* =============================================
   HOME PAGE — RESPONSIVE HERO STYLES
   ============================================= */

/* The overlay div that holds hero text — padding-top clears the fixed navbar */
.hero-overlay-content {
    /* navbar ~60px + 1rem margin-top (~16px) + 14px breathing = 90px */
    padding-top: 90px;
    padding-bottom: 2rem;
    /* align-items: center is set inline — padding-top shifts the centering zone down */
}

/* Hero heading — scales fluidly, never overridden by global h1 rule */
.hero-heading {
    font-size: clamp(1.6rem, 4.5vw, 3.25rem) !important;
    line-height: 1.15 !important;
    color: white !important;
    margin: 0 !important;
}

/* Hero subtext */
.hero-subtext {
    font-size: clamp(0.875rem, 2.2vw, 1.05rem);
    line-height: 1.7;
    color: rgba(255,255,255,0.9);
    margin: 0;
}

/* CTA row — always side by side */
.hero-cta-row {
    display: flex;
    flex-direction: row;
    gap: 0.75rem;
    padding-top: 0.5rem;
}

.hero-btn-primary,
.hero-btn-secondary {
    font-family: var(--font-primary);
    font-weight: 700;
    font-size: 0.875rem;
    text-decoration: none;
    padding: 0.7rem 1.25rem;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.35rem;
    transition: all 0.25s;
    white-space: nowrap;
    flex: 1;
    text-align: center;
}

.hero-btn-primary {
    background: var(--accent-gold);
    color: #1a1a0a;
    border: 2px solid var(--accent-gold);
}

.hero-btn-secondary {
    background: transparent;
    color: white;
    border: 2px solid rgba(255,255,255,0.65);
}

/* Stat cards grid */
.hero-stat-cards-wrap {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.6rem;
    flex-shrink: 0;
    width: 100%;
}

.hero-stat-card-item {
    min-width: 0;
}

/* Scroll hint */
.hero-scroll-hint {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
    opacity: 0.6;
}

/* =============================================
   TESTIMONIALS ARROWS — inside container on small screens
   ============================================= */
@media (max-width: 900px) {
    .testimonial-arrow-prev { left: 0 !important; }
    .testimonial-arrow-next { right: 0 !important; }
}

/* =============================================
   MOBILE — phones (≤ 480px)
   ============================================= */
@media (max-width: 480px) {
    .hero-overlay-content {
        padding-top: 75px;
    }

    .hero-scroll-hint {
        display: none !important;
    }

    .hero-btn-primary,
    .hero-btn-secondary {
        font-size: 0.78rem;
        padding: 0.6rem 0.7rem;
    }

    .hero-stat-cards-wrap {
        grid-template-columns: 1fr 1fr;
    }

    .hero-stat-card-item p:first-child {
        font-size: 1.05rem !important;
    }
}

/* =============================================
   DESKTOP (≥ 1024px) — stat cards single column
   ============================================= */
@media (min-width: 1024px) {
    .hero-stat-cards-wrap {
        grid-template-columns: 1fr;
        width: 200px;
    }

    .hero-btn-primary,
    .hero-btn-secondary {
        flex: none;
        font-size: 0.95rem;
        padding: 0.75rem 1.75rem;
    }

    .hero-overlay-content {
        padding-top: 95px;
    }
}
</style>
@endpush

@section('content')
    <section id="hero-section" class="relative overflow-hidden w-full reveal" style="min-height: 100svh;">
        <!-- Image Background -->
        <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('/images/Sipi-Falls.jpg');">
            <img src="/images/Sipi-Falls.jpg" alt="Sipi Falls" class="sr-only">
            <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(120,80,0,0.55) 0%, rgba(20,50,10,0.35) 50%, rgba(10,35,10,0.55) 100%);"></div>
        </div>

        <!-- Hero Content Overlay -->
        <div class="absolute inset-0 flex z-10 hero-overlay-content" style="align-items: center;">
            <div class="w-full max-w-7xl mx-auto" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 2rem; padding: 0 1.25rem;">

                <!-- Left: Text content -->
                <div style="flex: 1 1 300px; max-width: 640px; display: flex; flex-direction: column; gap: 1.25rem;">

                    <!-- Eastern Uganda pill -->
                    <div style="display: flex; align-items: center; max-width: 340px;">
                        <span style="background: rgba(100,70,0,0.55); color: rgba(255,255,255,0.95); font-family: var(--font-primary); font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; padding: 0.3rem 1rem; border-radius: 999px; white-space: nowrap; flex-shrink: 0; border: 1px solid rgba(255,200,50,0.35);">
                            Eastern Uganda
                        </span>
                        <div style="flex: 1; height: 1px; background: linear-gradient(to right, rgba(255,200,50,0.5), transparent); margin-left: 0.75rem;"></div>
                    </div>

                    <!-- Hero Statement -->
                    <h1 class="text-white font-bold leading-tight drop-shadow-xl hero-heading"
                        style="font-family: var(--font-primary); margin: 0;">
                        Where Waterfalls, Coffee Trails, and Cliffs Meet Adventure
                    </h1>

                    <!-- Supporting paragraph -->
                    <p class="text-white/90 hero-subtext" style="font-family: var(--font-primary); margin: 0;">
                        Plan your Sipi Falls experience with guided hikes, abseiling thrills, and unforgettable mountain views.
                    </p>

                    <!-- CTA buttons — side-by-side on all screens -->
                    <div class="hero-cta-row">
                        <a href="/travelguide" class="hero-btn-primary"
                           onmouseover="this.style.background='#fff'; this.style.color='#1a1a0a'; this.style.borderColor='#fff';"
                           onmouseout="this.style.background='var(--accent-gold)'; this.style.color='#1a1a0a'; this.style.borderColor='var(--accent-gold)';">
                            🏞️ Explore Activities
                        </a>
                        <a href="/contact" class="hero-btn-secondary"
                           onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.borderColor='white';"
                           onmouseout="this.style.background='transparent'; this.style.borderColor='rgba(255,255,255,0.7)';">
                            🧭 Talk to a Guide
                        </a>
                    </div>
                </div>

                <!-- Right: Stat cards — 2-column grid on mobile, column on desktop -->
                <div class="hero-stat-cards-wrap">
                    <div class="hero-stat-card-item" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.3); border-radius: 10px; padding: 0.85rem 1.25rem;">
                        <p style="color: var(--accent-gold); font-family: var(--font-primary); font-size: 1.35rem; font-weight: 700; line-height: 1; margin: 0 0 0.25rem;">3</p>
                        <p style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 0.75rem; margin: 0; font-weight: 400;">Waterfall levels</p>
                    </div>
                    <div class="hero-stat-card-item" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.3); border-radius: 10px; padding: 0.85rem 1.25rem;">
                        <p style="color: var(--accent-gold); font-family: var(--font-primary); font-size: 1.35rem; font-weight: 700; line-height: 1; margin: 0 0 0.25rem;">4.5h</p>
                        <p style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 0.75rem; margin: 0; font-weight: 400;">Guided trail loop</p>
                    </div>
                    <div class="hero-stat-card-item" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.3); border-radius: 10px; padding: 0.85rem 1.25rem;">
                        <p style="color: var(--accent-gold); font-family: var(--font-primary); font-size: 1.35rem; font-weight: 700; line-height: 1; margin: 0 0 0.25rem;">100m</p>
                        <p style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 0.75rem; margin: 0; font-weight: 400;">Main waterfall drop</p>
                    </div>
                    <div class="hero-stat-card-item" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.18); border: 1px solid rgba(255,255,255,0.3); border-radius: 10px; padding: 0.85rem 1.25rem;">
                        <p style="color: var(--accent-gold); font-family: var(--font-primary); font-size: 1.35rem; font-weight: 700; line-height: 1; margin: 0 0 0.25rem;">1,775m</p>
                        <p style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 0.75rem; margin: 0; font-weight: 400;">Mt. Elgon slopes</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 left-0 right-0 z-10 hero-scroll-hint" style="display: flex; flex-direction: column; align-items: center; gap: 0.5rem; opacity: 0.6;">
            <span style="font-family: var(--font-primary); font-size: 0.65rem; letter-spacing: 0.3em; color: white; text-transform: uppercase;">Scroll to explore</span>
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

    <!-- =====================================================
         TESTIMONIALS SECTION — Modern redesign
         3-up desktop · 1-up mobile · truncated text · dots nav
         ===================================================== -->
    <section id="reviews" class="reveal" style="background: #F5F6F9; padding: 4rem 0 2rem;">
        <div class="container">

            <!-- Section header -->
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <p style="font-family: var(--font-body); font-size: 0.72rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 0.5rem;">What People Say</p>
                <h2 style="font-family: var(--font-display); color: var(--primary-green); font-size: clamp(1.6rem, 4vw, 2.5rem); font-weight: 700; margin-bottom: 0.5rem;">Hear From Our Adventurers</h2>
                <p style="font-family: var(--font-body); color: #888; font-size: 0.95rem; max-width: 480px; margin: 0 auto;">Real stories from real visitors who explored Sipi Falls.</p>
            </div>

            <!-- Carousel wrapper -->
            <div style="position: relative; overflow: hidden;" id="tCarouselWrap">
                <div id="tCarouselInner" style="display: flex; transition: transform 0.45s cubic-bezier(0.4,0,0.2,1); will-change: transform;">

                    @php $tIdx = 0; @endphp
                    @forelse($testimonials as $testimonial)
                    @php
                        $nameParts = explode(' ', $testimonial->name);
                        $initials  = '';
                        foreach($nameParts as $p){ $initials .= strtoupper(substr($p,0,1)); if(strlen($initials)>=2) break; }
                        $palette   = ['#1a6b1a','#c9951a','#2d8b2d','#1a5276','#6c3483'];
                        $bg        = $palette[ord($testimonial->name[0]) % count($palette)];
                        $msgShort  = mb_strlen($testimonial->message) > 160
                                     ? mb_substr($testimonial->message, 0, 160) . '…'
                                     : $testimonial->message;
                        $hasMore   = mb_strlen($testimonial->message) > 160;
                    @endphp

                    <!-- Single slide -->
                    <div class="t-slide" style="flex-shrink: 0; padding: 0 10px; box-sizing: border-box;">
                        <div class="t-card" style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 2px 16px rgba(0,0,0,0.07); border: 1px solid #ebebeb; display: flex; flex-direction: column; height: 100%; min-height: 260px;">

                            <!-- Top row: avatar + name + stars -->
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 1rem;">
                                <div style="width: 46px; height: 46px; border-radius: 50%; background: {{ $bg }}; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1rem; font-family: var(--font-body); flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                    {{ $initials }}
                                </div>
                                <div style="flex: 1; min-width: 0;">
                                    <div style="font-weight: 700; color: var(--neutral-dark); font-family: var(--font-body); font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $testimonial->name }}</div>
                                    <div style="font-size: 0.75rem; color: #aaa; font-family: var(--font-body);">{{ $testimonial->country }}</div>
                                </div>
                                <!-- Stars flush right -->
                                <div style="display: flex; gap: 2px; flex-shrink: 0;" role="img" aria-label="{{ $testimonial->rating }} star rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="{{ $i <= $testimonial->rating ? 'fas' : 'far' }} fa-star" style="color: var(--accent-gold); font-size: 0.75rem;"></i>
                                    @endfor
                                </div>
                            </div>

                            <!-- Quote body — inline opening mark -->
                            <div style="flex: 1;">
                                <p class="t-body-text" style="font-family: var(--font-body); font-size: 0.9rem; color: #555; line-height: 1.75; margin: 0; font-style: italic;">
                                    <span style="color: var(--accent-gold); font-family: Georgia, serif; font-size: 1.6rem; line-height: 0; vertical-align: -0.4rem; margin-right: 2px;">"</span>{{ $msgShort }}<span style="color: var(--accent-gold); font-family: Georgia, serif; font-size: 1.6rem; line-height: 0; vertical-align: -0.4rem; margin-left: 2px;">"</span>
                                </p>
                                @if($hasMore)
                                <p class="t-full-text" style="display: none; font-family: var(--font-body); font-size: 0.9rem; color: #555; line-height: 1.75; margin: 0; font-style: italic;">
                                    <span style="color: var(--accent-gold); font-family: Georgia, serif; font-size: 1.6rem; line-height: 0; vertical-align: -0.4rem; margin-right: 2px;">"</span>{{ $testimonial->message }}<span style="color: var(--accent-gold); font-family: Georgia, serif; font-size: 1.6rem; line-height: 0; vertical-align: -0.4rem; margin-left: 2px;">"</span>
                                </p>
                                <button onclick="tToggleExpand(this)"
                                        style="margin-top: 0.5rem; background: none; border: none; padding: 0; font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--primary-green); cursor: pointer; text-decoration: underline; text-underline-offset: 2px;">
                                    Read more
                                </button>
                                @endif
                            </div>

                            <!-- Visit date if available -->
                            @if($testimonial->visit_date)
                            <div style="margin-top: 1rem; padding-top: 0.75rem; border-top: 1px solid #f0f0f0;">
                                <span style="font-family: var(--font-body); font-size: 0.72rem; color: #bbb; letter-spacing: 0.05em;">
                                    <i class="fas fa-calendar-alt" style="margin-right: 4px;"></i>
                                    Visited {{ \Carbon\Carbon::parse($testimonial->visit_date)->format('M Y') }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @php $tIdx++; @endphp

                    @empty
                    <!-- Fallback when no testimonials -->
                    <div class="t-slide" style="flex-shrink: 0; padding: 0 10px; box-sizing: border-box;">
                        <div class="t-card" style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 2px 16px rgba(0,0,0,0.07); border: 1px solid #ebebeb; display: flex; flex-direction: column; min-height: 220px; align-items: center; justify-content: center; text-align: center;">
                            <i class="fas fa-star" style="color: var(--accent-gold); font-size: 2rem; margin-bottom: 1rem;"></i>
                            <p style="font-family: var(--font-body); color: #aaa; font-size: 0.9rem; font-style: italic; margin: 0;">Be the first to share your Sipi Falls adventure!</p>
                        </div>
                    </div>
                    @endforelse

                </div><!-- /tCarouselInner -->
            </div><!-- /tCarouselWrap -->

            <!-- Controls: prev · dots · next — centred below cards -->
            <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; margin-top: 1.75rem;">

                <!-- Prev -->
                <button onclick="tMove(-1)" aria-label="Previous"
                        style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 2px solid var(--primary-green); color: var(--primary-green); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.25s; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"
                        onmouseover="this.style.background='var(--primary-green)'; this.style.color='white';"
                        onmouseout="this.style.background='white'; this.style.color='var(--primary-green)';">
                    <i class="fas fa-chevron-left" style="font-size: 0.8rem;"></i>
                </button>

                <!-- Dots -->
                <div id="tDots" style="display: flex; gap: 6px; align-items: center;"></div>

                <!-- Next -->
                <button onclick="tMove(1)" aria-label="Next"
                        style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-green); border: 2px solid var(--primary-green); color: white; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.25s; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.08);"
                        onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)';"
                        onmouseout="this.style.background='var(--primary-green)'; this.style.borderColor='var(--primary-green)';">
                    <i class="fas fa-chevron-right" style="font-size: 0.8rem;"></i>
                </button>
            </div>

            <!-- Share Your Experience CTA -->
            <div style="text-align: center; margin-top: 2rem; padding-bottom: 1rem;">
                <button onclick="document.getElementById('testimonialModal').style.display='flex'; document.body.style.overflow='hidden';"
                        class="tShareBtn"
                        style="font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; background: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); cursor: pointer; transition: all 0.25s; display: inline-flex; align-items: center; gap: 0.5rem;"
                        onmouseover="this.style.background='var(--primary-green)'; this.style.color='white';"
                        onmouseout="this.style.background='transparent'; this.style.color='var(--primary-green)';">
                    <i class="fas fa-pen"></i> <span>Share Your Experience</span>
                </button>
                @if(session('testimonial_success'))
                <script>
                    window.addEventListener('load', function() {
                        setTimeout(function() {
                            // Don't auto-open modal on success — show toast instead
                        }, 300);
                    });
                </script>
                @endif
            </div>

        </div><!-- /container -->
    </section>

    <!-- =====================================================
         SUCCESS TOAST — shown when review submitted
         ===================================================== -->
    @if(session('testimonial_success'))
    <div id="tSuccessToast"
         style="position: fixed; top: 80px; left: 50%; transform: translateX(-50%); z-index: 10000;
                background: #fff; border-left: 4px solid var(--primary-green); border-radius: 10px;
                padding: 1rem 1.5rem; box-shadow: 0 8px 32px rgba(0,0,0,0.18);
                display: flex; align-items: center; gap: 0.85rem; max-width: 92vw; width: 420px;
                animation: toastSlideIn 0.4s ease;">
        <div style="width: 38px; height: 38px; border-radius: 50%; background: rgba(26,107,26,0.1); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <i class="fas fa-check-circle" style="color: var(--primary-green); font-size: 1.2rem;"></i>
        </div>
        <div style="flex: 1; min-width: 0;">
            <p style="font-family: var(--font-body); font-weight: 700; color: var(--neutral-dark); margin: 0; font-size: 0.875rem;">Review submitted!</p>
            <p style="font-family: var(--font-body); color: #888; margin: 0; font-size: 0.78rem; line-height: 1.5;">Thanks — it'll appear after our team approves it.</p>
        </div>
        <button onclick="document.getElementById('tSuccessToast').remove();"
                style="background: none; border: none; color: #bbb; font-size: 1.1rem; cursor: pointer; flex-shrink: 0; padding: 0; line-height: 1;">✕</button>
    </div>
    <style>
        @keyframes toastSlideIn {
            from { opacity: 0; transform: translateX(-50%) translateY(-16px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
    </style>
    <script>
        // Auto-dismiss toast after 6 seconds
        setTimeout(function() {
            var t = document.getElementById('tSuccessToast');
            if (t) { t.style.transition = 'opacity 0.4s'; t.style.opacity = '0'; setTimeout(function(){ t && t.remove(); }, 400); }
        }, 6000);

        // Scroll to reviews section smoothly on load
        window.addEventListener('load', function () {
            var el = document.getElementById('reviews');
            if (el) {
                setTimeout(function () {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 150);
            }
        });
    </script>
    @endif

    <!-- =====================================================
         TESTIMONIAL SUBMISSION MODAL
         ===================================================== -->
    <div id="testimonialModal"
         onclick="if(event.target===this){ closeTModal(); }"
         style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.65);
                z-index: 9999; align-items: flex-start; justify-content: center;
                padding: 1rem; overflow-y: auto; backdrop-filter: blur(4px);">
        <div style="background: white; border-radius: 14px; border-top: 4px solid var(--accent-gold);
                    width: 100%; max-width: 540px; margin: auto; position: relative;
                    box-shadow: 0 24px 64px rgba(0,0,0,0.25);">

            <!-- Modal Header -->
            <div style="background: var(--primary-green); padding: 1rem 1.25rem; border-radius: 10px 10px 0 0;
                        display: flex; align-items: center; justify-content: space-between; gap: 0.75rem;">
                <div>
                    <h5 style="font-family: var(--font-display); color: white; margin: 0; font-size: 1.05rem;">Share Your Experience</h5>
                    <p style="font-family: var(--font-body); color: rgba(255,255,255,0.65); font-size: 0.72rem; margin: 0;">Your story inspires others to visit Sipi Falls</p>
                </div>
                <button onclick="closeTModal();"
                        style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3);
                               color: white; font-size: 1.1rem; width: 32px; height: 32px; border-radius: 50%;
                               cursor: pointer; display: flex; align-items: center; justify-content: center;
                               flex-shrink: 0; transition: background 0.2s;"
                        onmouseover="this.style.background='rgba(255,255,255,0.3)';"
                        onmouseout="this.style.background='rgba(255,255,255,0.15)';">✕</button>
            </div>

            <!-- Modal Body -->
            <div style="padding: 1.5rem 1.25rem;">
                <form action="{{ route('testimonial.submit') }}" method="POST">
                    @csrf
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; margin-bottom: 0.85rem;">
                        <div>
                            <label style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.35rem; display: block;">Name *</label>
                            <input type="text" name="name" required placeholder="Jane Doe"
                                   style="width: 100%; padding: 0.6rem 0.85rem; border: 1.5px solid #e0e0e0; border-radius: 8px; font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); outline: none; box-sizing: border-box;"
                                   onfocus="this.style.borderColor='var(--primary-green)';"
                                   onblur="this.style.borderColor='#e0e0e0';">
                        </div>
                        <div>
                            <label style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.35rem; display: block;">Country *</label>
                            <input type="text" name="country" required placeholder="Uganda"
                                   style="width: 100%; padding: 0.6rem 0.85rem; border: 1.5px solid #e0e0e0; border-radius: 8px; font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); outline: none; box-sizing: border-box;"
                                   onfocus="this.style.borderColor='var(--primary-green)';"
                                   onblur="this.style.borderColor='#e0e0e0';">
                        </div>
                    </div>

                    <div style="margin-bottom: 0.85rem;">
                        <label style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.35rem; display: block;">Rating *</label>
                        <div style="display: flex; gap: 0.3rem;" id="star-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-btn" data-value="{{ $i }}"
                                    style="background: none; border: none; font-size: 1.6rem; color: #e0e0e0; cursor: pointer; padding: 0; transition: color 0.15s; line-height: 1;">★</button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-value" value="5">
                    </div>

                    <div style="margin-bottom: 0.85rem;">
                        <label style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.35rem; display: block;">Visit Date</label>
                        <input type="date" name="visit_date"
                               style="width: 100%; padding: 0.6rem 0.85rem; border: 1.5px solid #e0e0e0; border-radius: 8px; font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); outline: none; box-sizing: border-box;"
                               onfocus="this.style.borderColor='var(--primary-green)';"
                               onblur="this.style.borderColor='#e0e0e0';">
                    </div>

                    <div style="margin-bottom: 1.1rem;">
                        <label style="font-family: var(--font-body); font-size: 0.78rem; font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.35rem; display: block;">Your Experience *</label>
                        <textarea name="message" required rows="4" placeholder="Tell us about your adventure at Sipi Falls…"
                                  style="width: 100%; padding: 0.6rem 0.85rem; border: 1.5px solid #e0e0e0; border-radius: 8px; font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); resize: vertical; outline: none; box-sizing: border-box;"
                                  onfocus="this.style.borderColor='var(--primary-green)';"
                                  onblur="this.style.borderColor='#e0e0e0';"></textarea>
                        <p style="font-family: var(--font-body); font-size: 0.7rem; color: #bbb; margin: 0.2rem 0 0;">Minimum 20 characters</p>
                    </div>

                    <button type="submit"
                            style="width: 100%; background: var(--primary-green); color: white; border: none;
                                   padding: 0.8rem; font-family: var(--font-body); font-size: 0.875rem;
                                   font-weight: 700; letter-spacing: 0.06em; text-transform: uppercase;
                                   border-radius: 8px; cursor: pointer; transition: all 0.25s;"
                            onmouseover="this.style.background='var(--accent-gold)'; this.style.color='#1a1a0a';"
                            onmouseout="this.style.background='var(--primary-green)'; this.style.color='white';">
                        <i class="fas fa-paper-plane" style="margin-right: 0.4rem;"></i> Submit My Review
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

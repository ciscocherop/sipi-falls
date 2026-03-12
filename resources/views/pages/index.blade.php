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
            
            <!-- CTA Button -->
            <div class="pt-4">
                <a href="{{ route('about') }}" 
                   class="inline-block px-10 py-4 font-semibold text-base tracking-widest uppercase transition-all duration-300"
                   style="background-color: transparent; color: white; border: 2px solid white; font-family: var(--font-body); text-decoration: none; letter-spacing: 0.15em;"
                   onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-gray)';"
                   onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white'; this.style.color='white';"
                   role="button" 
                   aria-label="Start your adventure at Sipi Falls">
                    Explore Sipi Falls
                </a>
            </div>
            
            <!-- Scroll Indicator -->
            <div style="margin-top: 3rem; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; opacity: 0.6;">
                <span style="font-family: var(--font-body); font-size: 0.65rem; letter-spacing: 0.3em; color: white; text-transform: uppercase;">Scroll to explore</span>
                <div style="width: 1px; height: 40px; background: linear-gradient(180deg, white, transparent);"></div>
            </div>
        </div>
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
                                    Experience the breathtaking triple waterfall
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                    Hike through scenic mountain trails
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                    Engage with the local Sabiny culture
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: var(--accent-gold, #E8B923); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--accent-gold, #E8B923); z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: var(--neutral-gray); font-weight: 500; font-family: var(--font-body); line-height: 1.6;">
                                    Enjoy the best Thrills at the falls that heal your spine
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

<!-- Events Section - Converted with inline styles -->
<section class="container-fluid reveal py-4" style="background: #ffffff;">
    <div class="container py-2">
        <!-- Section Heading -->
        <h2 class="text-center mb-4 fw-bold" 
            style="letter-spacing: 1px; color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">
            Things to Do at the Falls
        </h2>
        
        <!-- Activities Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 reveal-children">
            <!-- Hiking Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; border-bottom: 3px solid var(--accent-gold, #E8B923);"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)'; this.querySelector('img').style.transform='scale(1.08)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'; this.querySelector('img').style.transform='scale(1)';">
                    <img src="{{ asset('images/hiking.jpg') }}" 
                         class="card-img-top" 
                         alt="Hiking at Sipi Falls" 
                         style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.5s ease;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: var(--primary-green); font-family: var(--font-body); font-size: 1.25rem;">
                            🥾 Hiking
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: var(--neutral-gray); font-family: var(--font-body); line-height: 1.6;">
                            Explore the trails to all three waterfalls with breathtaking views and encounters with nature.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Abseiling Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; border-bottom: 3px solid var(--accent-gold, #E8B923);"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)'; this.querySelector('img').style.transform='scale(1.08)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'; this.querySelector('img').style.transform='scale(1)';">
                    <img src="{{ asset('images/abseil5.jpg') }}" 
                         class="card-img-top" 
                         alt="Abseiling adventure" 
                         style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.5s ease;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: var(--primary-green); font-family: var(--font-body); font-size: 1.25rem;">
                            🧗 Abseiling
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: var(--neutral-gray); font-family: var(--font-body); line-height: 1.6;">
                            Try out the thrilling adventure of descending beside the Sipi cliff waterfall — perfect for adrenaline lovers.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Coffee Tours Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; border-bottom: 3px solid var(--accent-gold, #E8B923);"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)'; this.querySelector('img').style.transform='scale(1.08)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'; this.querySelector('img').style.transform='scale(1)';">
                    <img src="{{ asset('images/rawcofi.jpg') }}" 
                         class="card-img-top" 
                         alt="Coffee tour in Sipi" 
                         style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.5s ease;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: var(--primary-green); font-family: var(--font-body); font-size: 1.25rem;">
                            ☕ Coffee Tours
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: var(--neutral-gray); font-family: var(--font-body); line-height: 1.6;">
                            Visit local coffee farms, roast your own coffee, and taste freshly brewed coffee right from the source.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Nature Walks Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 0.5rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; border-bottom: 3px solid var(--accent-gold, #E8B923);"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)'; this.querySelector('img').style.transform='scale(1.08)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'; this.querySelector('img').style.transform='scale(1)';">
                    <img src="{{ asset('images/naturewalk.jpg') }}" 
                         class="card-img-top" 
                         alt="Nature Walk in Sipi" 
                         style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.5s ease;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: var(--primary-green); font-family: var(--font-body); font-size: 1.25rem;">
                            🌿 Nature Walks
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: var(--neutral-gray); font-family: var(--font-body); line-height: 1.6;">
                            Enjoy calming walks through lush banana plantations, forested trails, and friendly village paths.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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

<script>
let testimonialCurrentIndex = 0;
const testimonialSlidesPerView = 2;

function moveTestimonialCarousel(direction) {
    const track = document.querySelector('.testimonial-carousel-inner');
    const slides = document.querySelectorAll('.testimonial-slide');
    const totalSlides = slides.length;
    
    if (totalSlides === 0) return;
    
    // Calculate max index (how many "pages" of 2 cards we have)
    const maxIndex = Math.ceil(totalSlides / testimonialSlidesPerView) - 1;
    
    // Update index
    testimonialCurrentIndex += direction;
    
    // Loop around
    if (testimonialCurrentIndex < 0) {
        testimonialCurrentIndex = maxIndex;
    } else if (testimonialCurrentIndex > maxIndex) {
        testimonialCurrentIndex = 0;
    }
    
    // Calculate transform (move by 100% to show next 2 cards)
    const translateX = -(testimonialCurrentIndex * 100);
    track.style.transform = `translateX(${translateX}%)`;
}
</script>

<!-- Testimonials Modal -->
<div id="testimonialsModal" class="modal fade" tabindex="-1" aria-labelledby="testimonialsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content" style="border-radius: 1rem; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #228B22 0%, var(--primary-green) 100%); color: white; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h3 class="modal-title fw-bold" id="testimonialsModalLabel" style="font-family: var(--font-display);">
                    <i class="fas fa-comments me-2"></i>All Testimonials
                </h3>
                <button type="button" class="btn-close btn-close-white" onclick="closeTestimonialsModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background: #f8f9fa; max-height: 70vh; overflow-y: auto;">
                <div class="row g-4" id="allTestimonialsContainer">
                    <!-- Testimonials will be loaded here via JavaScript -->
                </div>
            </div>
            <div class="modal-footer" style="background: #ffffff; border-bottom-left-radius: 1rem; border-bottom-right-radius: 1rem;">
                <button type="button" class="btn btn-secondary" onclick="closeTestimonialsModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
// Store all testimonials data
const allTestimonials = @json(\App\Models\Testimonial::active()->ordered()->get());
const displayedCount = {{ $testimonials->count() }}; // Number of testimonials shown on page

function openTestimonialsModal() {
    const modal = document.getElementById('testimonialsModal');
    const container = document.getElementById('allTestimonialsContainer');
    
    // Clear existing content
    container.innerHTML = '';
    
    // Get only testimonials not shown on the page (skip first 3)
    const remainingTestimonials = allTestimonials.slice(displayedCount);
    
    // Check if there are additional testimonials
    if (remainingTestimonials.length === 0) {
        container.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <p class="text-muted">You've seen all our testimonials!</p>
            </div>
        `;
    } else {
        // Add remaining testimonials
        remainingTestimonials.forEach(testimonial => {
            const stars = Array.from({length: 5}, (_, i) => 
                i < testimonial.rating 
                    ? '<i class="fas fa-star"></i>' 
                    : '<i class="far fa-star"></i>'
            ).join('');
            
            const photoUrl = testimonial.photo || '{{ asset("images/group.jpg") }}';
            
            container.innerHTML += `
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-3" style="background: #ffffff;">
                        <img src="${photoUrl}" alt="${testimonial.name} at Sipi Falls" 
                             class="rounded-circle mx-auto d-block mb-2" 
                             style="width: 100px; height: 100px; object-fit: cover;" 
                             loading="lazy">
                        <h5 class="fw-bold text-center mb-1" style="color: var(--primary-green);">${testimonial.name}</h5>
                        <p class="text-muted small text-center mb-2">${testimonial.country}</p>
                        <div class="mb-2 text-warning text-center" role="img" aria-label="${testimonial.rating} star rating">
                            ${stars}
                        </div>
                        <p class="fst-italic text-center mb-0" style="color: var(--neutral-gray); font-size: 1rem;">
                            "${testimonial.message}"
                        </p>
                    </div>
                </div>
            `;
        });
    }
    
    // Show modal with Bootstrap 5 API
    modal.style.display = 'block';
    modal.classList.add('show');
    document.body.classList.add('modal-open');
    
    // Add backdrop
    const backdrop = document.createElement('div');
    backdrop.className = 'modal-backdrop fade show';
    backdrop.id = 'testimonialsBackdrop';
    document.body.appendChild(backdrop);
}

function closeTestimonialsModal() {
    const modal = document.getElementById('testimonialsModal');
    const backdrop = document.getElementById('testimonialsBackdrop');
    
    modal.style.display = 'none';
    modal.classList.remove('show');
    document.body.classList.remove('modal-open');
    
    if (backdrop) {
        backdrop.remove();
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('testimonialsModal');
    if (event.target === modal) {
        closeTestimonialsModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeTestimonialsModal();
    }
});
</script>
@endsection

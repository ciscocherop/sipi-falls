@extends('layouts.app')

@section('title', 'Sipi Falls - Keep Sipping!!')

@section('content')
<!-- Hero Section -->
<section class="herosection position-relative reveal">
    <div class="slideshow-container" role="region" aria-label="Sipi Falls slideshow">
        <img class="slide" src="{{ asset('images/BANNER.jpg') }}" alt="Scenic view of Sipi Falls waterfall" loading="lazy">
        <img class="slide" src="{{ asset('images/abseil8.jpg') }}" alt="Abseiling adventure at Sipi Falls" loading="lazy">
        <img class="slide" src="{{ asset('images/xx.jpg') }}" alt="Sipi Falls landscape" loading="lazy">
        <img class="slide" src="{{ asset('images/sipi.webp') }}" alt="Sipi Falls overview" loading="lazy">
        <img class="slide" src="{{ asset('images/dwn.jpg') }}" alt="Waterfall close-up at Sipi Falls" loading="lazy">
        <img class="slide" src="{{ asset('images/f16.jpg') }}" alt="Nature trail at Sipi Falls" loading="lazy">
        <img class="slide" src="{{ asset('images/splash.jpg') }}" alt="Water splashing at Sipi Falls" loading="lazy">
    </div>
    
    <div class="overlay-content position-absolute top-50 start-50 translate-middle text-center">
        <h5 class="fw-bold display-3" style="color: var(--accent-gold); font-family: 'Montserrat', sans-serif; letter-spacing: 2px; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);">
            In Nature, Nothing is perfect,
        </h5>
        <h1 class="fs-1 fw-bold display-3" style="color: var(--secondary-teal); font-family: 'Montserrat', sans-serif; letter-spacing: 2px; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);">
            And Everything Is Perfect.
        </h1>
        <a href="{{ route('about') }}" class="btn btn-lg px-4 shadow-sm clickable-btn" role="button" aria-label="Start your adventure at Sipi Falls" style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
            Explore Sipi Falls
        </a>
    </div>
</section>

<!-- Description Section -->
<section class="intro reveal" style="background-color: #f5f6f9; padding-top: 4rem !important; padding-bottom: 4rem !important;">
    <div class="container py-2">
        <h2 class="text-center mb-4 display-5 fw-bold" style="color: #228B22; letter-spacing: 1px;">
            Where Waters Roar and Wild Hearts Soar!
        </h2>
        <div class="row justify-content-center align-items-stretch g-4">
            <!-- Timeline Card (Left) -->
            <div class="col-12 col-md-6 d-flex">
                <div class="card shadow-lg rounded-4 w-100 p-4" style="background: #fff; box-shadow: 0 0 30px 0 rgba(255, 255, 255, 0.4), 0 2px 16px 0 #e0e0e0; min-height: 300px;">
                    <h3 class="mb-4 text-success">Why Visit Sipi Falls?</h3>
                    <ul class="timeline list-unstyled ps-0 mb-0">
                        <li class="timeline-event mb-4">
                            <div class="timeline-dot bg-success"></div>
                            <span class="timeline-content">Experience the breathtaking triple waterfall</span>
                        </li>
                        <li class="timeline-event mb-4">
                            <div class="timeline-dot bg-success"></div>
                            <span class="timeline-content">Hike through scenic mountain trails</span>
                        </li>
                        <li class="timeline-event mb-4">
                            <div class="timeline-dot bg-success"></div>
                            <span class="timeline-content">Engage with the local Sabiny culture</span>
                        </li>
                        <li class="timeline-event">
                            <div class="timeline-dot bg-success"></div>
                            <span class="timeline-content">Enjoy the best Thrills at the falls that heal your spine</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- About Card (Right) -->
            <div class="col-12 col-md-6 d-flex">
                <div class="card shadow-lg rounded-4 w-100 p-0" style="background: url('{{ asset('images/BANNER.jpg') }}') no-repeat center center; background-size: cover; box-shadow: 0 0 30px 0 rgba(255, 255, 255, 0.4), 0 2px 16px 0 #e0e0e0; min-height: 300px;" role="img" aria-label="Scenic view of Sipi Falls">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="container-fluid reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container py-2">
        <h2 class="text-success fw-bold text-center mb-3 display-5" style="letter-spacing: 1px; color: var(--primary-green); font-family: 'Montserrat', sans-serif;">
            Things to Do at the Falls
        </h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            <div class="col d-flex">
                <div class="card shadow-lg event-card h-100" style="border-radius: 1rem; overflow: hidden; border: none;">
                    <img src="{{ asset('images/hiking.jpg') }}" class="card-img-top event-img" alt="Hiking at Sipi Falls" style="width: 100%; height: 300px; object-fit: cover;" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Hiking</h5>
                        <p class="card-text">Explore the trails to all three waterfalls with breathtaking views and encounters with nature.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg event-card" style="border-radius: 1rem; overflow: hidden; border: none;">
                    <img src="{{ asset('images/abseil5.jpg') }}" class="card-img-top event-img" alt="Abseiling adventure" style="width: 100%; height: 300px; object-fit: cover;" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Abseiling</h5>
                        <p class="card-text">Try out the thrilling adventure of descending beside the Sipi cliff waterfall — perfect for adrenaline lovers.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg event-card" style="border-radius: 1rem; overflow: hidden; border: none;">
                    <img src="{{ asset('images/rawcofi.jpg') }}" class="card-img-top event-img" alt="Coffee tour in Sipi" style="width: 100%; height: 300px; object-fit: cover;" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Coffee Tours</h5>
                        <p class="card-text">Visit local coffee farms, roast your own coffee, and taste freshly brewed coffee right from the source.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg event-card nature-walk-card" style="border-radius: 1rem; overflow: hidden; border: none;">
                    <img src="{{ asset('images/naturewalk.jpg') }}" class="card-img-top event-img nature-walk-img" alt="Nature Walk in Sipi" style="width: 100%; height: 300px; object-fit: cover;" loading="lazy">
                    <div class="card-body">
                        <h5 class="card-title">Nature Walks</h5>
                        <p class="card-text">Enjoy calming walks through lush banana plantations, forested trails, and friendly village paths.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('travelguide') }}" class="btn btn-lg px-4 shadow-sm clickable-btn" role="button" aria-label="Start your adventure at Sipi Falls" style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
                Start Your Adventure
            </a>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="container-fluid py-4 reveal" style="background: var(--neutral-offwhite);">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
            Hear From Our Adventurers
        </h2>
        <div class="row text-center justify-content-center g-4">
            <!-- Testimonial 1 -->
            <div class="col-md-4">
                <div class="card h-80 shadow-lg border-0 rounded-4 p-4 testimonial-card" style="background: var(--neutral-offwhite);">
                    <img src="{{ asset('images/rock climbing.jpg') }}" alt="Sarah hiking at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    <h5 class="fw-bold" style="color: var(--primary-green);">Sarah K.</h5>
                    <div class="mb-2 text-warning" role="img" aria-label="4.5 star rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="fst-italic mb-0" style="color: var(--neutral-gray); font-size: 1.2rem;">
                        "Sipi Falls is pure magic. The view, the hike, and the local hospitality were unforgettable!"
                    </p>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="col-md-4">
                <div class="card h-80 shadow-lg border-0 rounded-4 p-4 testimonial-card" style="background: var(--neutral-offwhite);">
                    <img src="{{ asset('images/mosesg.jpg') }}" alt="Leo on a coffee tour at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    <h5 class="fw-bold" style="color: var(--primary-green);">Leo M.</h5>
                    <div class="mb-2 text-warning" role="img" aria-label="5 star rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="fst-italic mb-0" style="color: var(--neutral-gray); font-size: 1.2rem;">
                        "The coffee tour was my favorite part. I never knew how amazing fresh Ugandan coffee could be!"
                    </p>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="col-md-4">
                <div class="card h-80 shadow-lg border-0 rounded-4 p-4 testimonial-card" style="background: var(--neutral-offwhite);">
                    <img src="{{ asset('images/group.jpg') }}" alt="Rita with a group at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    <h5 class="fw-bold" style="color: var(--primary-green);">Rita T.</h5>
                    <div class="mb-2 text-warning" role="img" aria-label="4 star rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="fst-italic mb-0" style="color: var(--neutral-gray); font-size: 1.2rem;">
                        "If you're ever in Uganda, don't miss Sipi. Best decision of my trip!"
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="#" class="btn btn-lg px-4 shadow-sm clickable-btn" role="button" aria-label="Read more reviews about Sipi Falls" style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
                Read More Reviews
            </a>
        </div>
    </div>
</section>
@endsection

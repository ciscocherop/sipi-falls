@extends('layouts.app')

@section('title', 'Sipi Falls - Keep Sipping!!')

@section('content')
<!-- Hero Section - Converted to Tailwind -->
<section class="relative h-screen overflow-hidden w-full reveal" style="background-color: #228B22;">
    <!-- Slideshow Container -->
    <div class="absolute inset-0 z-0" role="region" aria-label="Sipi Falls slideshow">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/BANNER.jpg') }}" 
             alt="Scenic view of Sipi Falls waterfall" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/abseil8.jpg') }}" 
             alt="Abseiling adventure at Sipi Falls" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/xx.jpg') }}" 
             alt="Sipi Falls landscape" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/sipi.webp') }}" 
             alt="Sipi Falls overview" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/dwn.jpg') }}" 
             alt="Waterfall close-up at Sipi Falls" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/f16.jpg') }}" 
             alt="Nature trail at Sipi Falls" 
             loading="lazy">
        <img class="slide absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000 ease-in-out" 
             style="animation: kenburns 8s infinite; border-top-left-radius: 50px; border-bottom-right-radius: 50px;"
             src="{{ asset('images/splash.jpg') }}" 
             alt="Water splashing at Sipi Falls" 
             loading="lazy">
    </div>
    
    <!-- Hero Content Overlay -->
    <div class="absolute inset-0 flex items-center justify-center z-10 p-8 max-w-[90%] mx-auto">
        <div class="text-center space-y-6">
            <!-- Main Heading -->
            <h5 class="font-bold text-4xl md:text-5xl lg:text-6xl tracking-wider" 
                style="color: #E8B923; font-family: 'Montserrat', sans-serif; text-shadow: 2px 2px 8px rgba(0,0,0,0.8);">
                In Nature, Nothing is perfect,
            </h5>
            
            <!-- Sub Heading -->
            <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl tracking-wider" 
                style="color: #6FCF97; font-family: 'Montserrat', sans-serif; text-shadow: 2px 2px 8px rgba(0,0,0,0.8);">
                And Everything Is Perfect.
            </h1>
            
            <!-- CTA Button -->
            <div class="pt-4">
                <a href="{{ route('about') }}" 
                   class="inline-block font-semibold text-lg px-8 py-4 rounded-lg shadow-lg border-2 text-decoration-none"
                   style="background-color: #E8B923; color: #333333; border-color: #6FCF97; transition: all 0.3s; font-family: 'Montserrat', sans-serif;"
                   onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='white'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)';"
                   onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)';"
                   role="button" 
                   aria-label="Start your adventure at Sipi Falls">
                    Explore Sipi Falls
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Description Section - Fixed with working styles -->
<section class="reveal" style="background-color: #F5F6F9; padding: 4rem 0;">
    <div class="container mx-auto px-4 py-2">
        <!-- Section Heading -->
        <h2 class="text-center mb-8 font-bold font-sans" 
            style="font-size: 2.5rem; color: #228B22; letter-spacing: 1px; font-family: 'Montserrat', sans-serif;">
            Where Waters Roar and Wild Hearts Soar!
        </h2>
        
        <!-- Cards Container -->
        <div class="flex flex-col lg:flex-row justify-center items-stretch gap-6 max-w-6xl mx-auto">
            <!-- Timeline Card (Left) -->
            <div class="flex-1 flex">
                <div class="w-full p-6 rounded-2xl shadow-lg" 
                     style="background: #fff; min-height: 300px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h3 class="mb-6 font-bold font-sans" 
                        style="font-size: 1.5rem; color: #228B22; font-family: 'Montserrat', sans-serif;">
                        Why Visit Sipi Falls?
                    </h3>
                    
                    <!-- Custom Timeline -->
                    <div class="relative ml-6 pl-6">
                        <!-- Timeline Line -->
                        <div class="absolute w-1 rounded-full" 
                             style="left: 0.5rem; top: 0.5rem; bottom: 0.5rem; background: #d1e7dd;"></div>
                        
                        <!-- Timeline Items -->
                        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <!-- Timeline Dot -->
                                <div class="absolute rounded-full border-3" 
                                     style="left: -2rem; width: 16px; height: 16px; background: #228B22; border: 3px solid #fff; box-shadow: 0 0 0 2px #198754; z-index: 10;"></div>
                                <!-- Content -->
                                <span style="font-size: 1.125rem; color: #333; font-weight: 500; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                                    Experience the breathtaking triple waterfall
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: #228B22; border: 3px solid #fff; box-shadow: 0 0 0 2px #198754; z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: #333; font-weight: 500; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                                    Hike through scenic mountain trails
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: #228B22; border: 3px solid #fff; box-shadow: 0 0 0 2px #198754; z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: #333; font-weight: 500; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                                    Engage with the local Sabiny culture
                                </span>
                            </div>
                            
                            <div class="relative flex items-start" style="min-height: 40px;">
                                <div class="absolute rounded-full" 
                                     style="left: -2rem; width: 16px; height: 16px; background: #228B22; border: 3px solid #fff; box-shadow: 0 0 0 2px #198754; z-index: 10;"></div>
                                <span style="font-size: 1.125rem; color: #333; font-weight: 500; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                                    Enjoy the best Thrills at the falls that heal your spine
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image Card (Right) -->
            <div class="flex-1 flex">
                <div class="w-full rounded-2xl shadow-lg overflow-hidden" 
                     style="min-height: 300px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <div class="w-full h-full rounded-2xl" 
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
<section class="container-fluid reveal py-5" style="background: linear-gradient(135deg, #ffffff 0%, #d1e7dd 100%);">
    <div class="container py-2">
        <!-- Section Heading -->
        <h2 class="text-center mb-5 fw-bold" 
            style="letter-spacing: 1px; color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
            Things to Do at the Falls
        </h2>
        
        <!-- Activities Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <!-- Hiking Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 1rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                    <img src="{{ asset('images/hiking.jpg') }}" 
                         class="card-img-top" 
                         alt="Hiking at Sipi Falls" 
                         style="width: 100%; height: 250px; object-fit: cover;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                            Hiking
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: #333; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                            Explore the trails to all three waterfalls with breathtaking views and encounters with nature.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Abseiling Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 1rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                    <img src="{{ asset('images/abseil5.jpg') }}" 
                         class="card-img-top" 
                         alt="Abseiling adventure" 
                         style="width: 100%; height: 250px; object-fit: cover;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                            Abseiling
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: #333; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                            Try out the thrilling adventure of descending beside the Sipi cliff waterfall — perfect for adrenaline lovers.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Coffee Tours Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 1rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                    <img src="{{ asset('images/rawcofi.jpg') }}" 
                         class="card-img-top" 
                         alt="Coffee tour in Sipi" 
                         style="width: 100%; height: 250px; object-fit: cover;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                            Coffee Tours
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: #333; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                            Visit local coffee farms, roast your own coffee, and taste freshly brewed coffee right from the source.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Nature Walks Card -->
            <div class="col d-flex">
                <div class="card shadow-lg h-100 border-0" 
                     style="border-radius: 1rem; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.2)';"
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)';">
                    <img src="{{ asset('images/naturewalk.jpg') }}" 
                         class="card-img-top" 
                         alt="Nature Walk in Sipi" 
                         style="width: 100%; height: 250px; object-fit: cover;" 
                         loading="lazy">
                    <div class="card-body d-flex flex-column" style="background: #fff; padding: 1.5rem;">
                        <h5 class="card-title fw-bold mb-3" 
                            style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                            Nature Walks
                        </h5>
                        <p class="card-text flex-grow-1" 
                           style="color: #333; font-family: 'Montserrat', sans-serif; line-height: 1.6;">
                            Enjoy calming walks through lush banana plantations, forested trails, and friendly village paths.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA Button -->
        <div class="text-center mt-5">
            <a href="{{ route('travelguide') }}" 
               class="btn btn-lg px-5 py-3 shadow-lg text-decoration-none fw-semibold" 
               style="background-color: #E8B923; color: #333; border: 2px solid #6FCF97; border-radius: 0.5rem; font-family: 'Montserrat', sans-serif; transition: all 0.3s;"
               onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='white'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)';"
               onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)';"
               role="button" 
               aria-label="Start your adventure at Sipi Falls">
                Start Your Adventure
            </a>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="container-fluid py-4 reveal" style="background: #ffffff;">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold" style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
            Hear From Our Adventurers
        </h2>
        <div class="row text-center justify-content-center g-4">
            @forelse($testimonials as $testimonial)
            <!-- Testimonial Card -->
            <div class="col-md-4">
                <div class="card h-80 shadow-lg border-0 rounded-4 p-4 testimonial-card" style="background: #ffffff;">
                    @if($testimonial->photo)
                    <img src="{{ asset($testimonial->photo) }}" alt="{{ $testimonial->name }} at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    @else
                    <img src="{{ asset('images/group.jpg') }}" alt="{{ $testimonial->name }} at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    @endif
                    <h5 class="fw-bold" style="color: #228B22;">{{ $testimonial->name }}</h5>
                    <p class="text-muted small mb-2">{{ $testimonial->country }}</p>
                    <div class="mb-2 text-warning" role="img" aria-label="{{ $testimonial->rating }} star rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <p class="fst-italic mb-0" style="color: #333333; font-size: 1.2rem;">
                        "{{ $testimonial->message }}"
                    </p>
                </div>
            </div>
            @empty
            <!-- Default Testimonial if none in database -->
            <div class="col-md-4">
                <div class="card h-80 shadow-lg border-0 rounded-4 p-4 testimonial-card" style="background: #ffffff;">
                    <img src="{{ asset('images/group.jpg') }}" alt="Visitor at Sipi Falls" class="testimonial-img mb-2 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;" loading="lazy">
                    <h5 class="fw-bold" style="color: #228B22;">Our Visitors</h5>
                    <div class="mb-2 text-warning" role="img" aria-label="5 star rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="fst-italic mb-0" style="color: #333333; font-size: 1.2rem;">
                        "Add testimonials from the admin panel to showcase visitor experiences!"
                    </p>
                </div>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-3">
            <button onclick="openTestimonialsModal()" class="btn btn-lg px-4 shadow-sm clickable-btn" role="button" aria-label="Read more reviews about Sipi Falls" style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer;">
                Read More Reviews
            </button>
        </div>
    </div>
</section>

<!-- Testimonials Modal -->
<div id="testimonialsModal" class="modal fade" tabindex="-1" aria-labelledby="testimonialsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content" style="border-radius: 1rem; border: none;">
            <div class="modal-header" style="background: linear-gradient(135deg, #228B22 0%, #6FCF97 100%); color: white; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h3 class="modal-title fw-bold" id="testimonialsModalLabel" style="font-family: 'Montserrat', sans-serif;">
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
                        <h5 class="fw-bold text-center mb-1" style="color: #228B22;">${testimonial.name}</h5>
                        <p class="text-muted small text-center mb-2">${testimonial.country}</p>
                        <div class="mb-2 text-warning text-center" role="img" aria-label="${testimonial.rating} star rating">
                            ${stars}
                        </div>
                        <p class="fst-italic text-center mb-0" style="color: #333333; font-size: 1rem;">
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

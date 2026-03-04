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
@endsection

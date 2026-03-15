@extends('layouts.app')

@section('title', 'Travel Guide - Sipi Falls')

@section('content')

  <!-- Hero Section -->
  <section class="reveal text-center text-light d-flex align-items-center justify-content-center" 
           style="position: relative; background-image: url('{{ asset('images/water.jpg') }}'); height: 80vh; background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; width: 100%;">
    <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.55) 60%, rgba(0,0,0,0.2) 100%); z-index: 1;"></div>
    <div class="p-4 p-md-5" style="position: relative; z-index: 2;">
      <h1 class="display-3 fw-bold" style="color: #ffffff; font-family: var(--font-display); letter-spacing: 0.02em;">Your Travel Guide to Sipi Falls</h1>
      <p class="lead" style="color: #ffffff; font-family: var(--font-body);">Everything you need to know before you explore Uganda's most breathtaking natural wonder.</p>
      <a href="#travel-tips" class="btn btn-lg mt-3" role="button" aria-label="Explore the Sipi Falls travel guide"
         style="background-color: transparent; color: white; border: 2px solid white; padding: 0.85rem 2.5rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; text-decoration: none; transition: all 0.3s;"
         onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
         onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white'; this.style.color='white';">
        Explore the Guide
      </a>
    </div>
  </section>

  <!-- Quick Facts Section -->
  <section class="py-2 reveal" style="background: var(--neutral-light);">
    <section class="quick-facts container my-3">
      <section id="travel-tips" class="quick-facts container py-3 reveal" style="background: var(--neutral-light);">
        <h2 class="text-center mb-2" style="color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">Essential Tips for Your Trip</h2>
        <p class="text-center mb-4" style="font-size: 1.2rem; color: var(--neutral-gray);">Get the most out of your Sipi Falls adventure with these quick, practical tips!</p>
        
        <div class="row text-center gy-4">
         <!-- When to Visit -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Best weather, fewer crowds, the rainbow appears most at the Waterfalls!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-calendar fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">When to Visit</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_when_to_visit'] ?? 'The best time to visit Sipi Falls is during the dry seasons — January to March and August to September.' }}</p>
          </div>
          <!-- What to Wear -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Boots would also work and a rain jacket are a must for the trails!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-shoe-prints fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">What to Wear</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_what_to_wear'] ?? 'Pack sturdy hiking shoes with good grip — Sipi\'s trails can be slippery!' }}</p>
          </div>
           <!-- What to Pack -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Don't forget your camera and insect repellent!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-suitcase-rolling fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">What to Pack</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_what_to_pack'] ?? 'Bring a reusable water bottle, sunscreen, insect repellent, and a small backpack for your hikes.' }}</p>
          </div>
              <!-- Getting There -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="A 4WD is best for the rugged roads. Local guides know the way!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">Getting There</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_getting_there'] ?? 'Sipi Falls is a 4.5-hour drive from Kampala. Hire a 4WD vehicle for the rugged roads.' }}</p>
          </div>
            <!-- Where to Stay -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Book early for the best views, especially in peak season!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-hotel fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">Where to Stay</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_where_to_stay'] ?? 'Choose from budget guesthouses or scenic lodges like Sipi River Lodge and top-class resorts.' }}</p>
          </div>
              <!-- Stay Safe -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 0.375rem; border-top: 3px solid var(--accent-gold); box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Stay on marked trails and don't hike alone for safety."
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-heartbeat fa-3x mb-3" style="color: var(--accent-gold); transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: var(--primary-green);">Stay Safe</h5>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.6; color: var(--neutral-gray);">{{ $content['travelguide_stay_safe'] ?? 'Stick to marked trails, avoid hiking alone, and stay hydrated! The falls can be slippery — watch your step!' }}</p>
          </div>
        </div>

        <!-- Extra Tips Button -->
        <div class="text-center mt-4">
          <button type="button" class="btn btn-lg px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#extraTipsModal"
                  aria-label="View extra travel tips for Sipi Falls"
                  style="background-color: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); padding: 0.75rem 2.5rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; border-radius: 0.25rem; transition: all 0.3s; cursor: pointer;"
                  onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='var(--primary-green)'; this.style.color='var(--primary-green)';">
            Extra Tips
          </button>
        </div>
      </section>
    </section>
  </section>

  <!-- Extra Tips Modal -->
  <div class="modal fade" id="extraTipsModal" tabindex="-1" aria-labelledby="extraTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 92vw; width: 100%; margin: 1rem auto;">
      <div class="modal-content" style="background: var(--neutral-offwhite); border-top: 4px solid var(--accent-gold); border-radius: 0.375rem; max-height: 80vh; display: flex; flex-direction: column;">
        <div class="modal-header" style="background-color: var(--primary-green); border-radius: 0.25rem 0.25rem 0 0; flex-shrink: 0; display: flex; align-items: center; justify-content: space-between; padding: 1rem 1.25rem;">
          <h5 class="modal-title" id="extraTipsModalLabel" style="color: var(--neutral-offwhite); font-family: var(--font-body); margin: 0;">Extra Tips for Sipi Falls</h5>
          <button type="button" onclick="bootstrap.Modal.getInstance(document.getElementById('extraTipsModal')).hide()" aria-label="Close"
                  style="background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.6); color: white; font-size: 1.25rem; line-height: 1; width: 2.2rem; height: 2.2rem; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0; z-index: 20; position: relative;">
            &times;
          </button>
        </div>
        <div class="modal-body" style="overflow-y: auto; flex: 1 1 auto;">
          <ul id="extra-tips-list" class="list-unstyled mb-0" style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 1rem; line-height: 2;" role="list"></ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Activities Section -->
  <section class="reveal py-5" id="activities" style="background: var(--neutral-offwhite); padding: 3rem 0;">
    <div class="container" style="padding: 2rem 1rem; background: transparent;">
      <h2 class="text-center mb-5" style="color: var(--primary-green); font-family: var(--font-display);">
        Activities at Sipi Falls
      </h2>

      <div class="row g-0">
        <!-- Activity 1 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_1_image'] ?? 'images/naturewalk.jpg') }}" alt="{{ $content['travelguide_activity_1_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">1</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_1_title'] ?? 'Hiking the Waterfalls' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_1_description'] ?? 'Explore scenic trails to all three waterfalls.' }}</p>
            </div>
          </div>
        </div>

        <!-- Activity 2 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_2_image'] ?? 'images/abseil3.jpg') }}" alt="{{ $content['travelguide_activity_2_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">2</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_2_title'] ?? 'Abseiling' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_2_description'] ?? 'Descend a 100m cliff beside the main waterfall.' }}</p>
            </div>
          </div>
        </div>

        <!-- Activity 3 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_3_image'] ?? 'images/cofi.jpg') }}" alt="{{ $content['travelguide_activity_3_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">3</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_3_title'] ?? 'Coffee Tours' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_3_description'] ?? 'Visit local farms and taste freshly brewed Sipi coffee.' }}</p>
            </div>
          </div>
        </div>

        <!-- Activity 4 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_4_image'] ?? 'images/chamelon.jpg') }}" alt="{{ $content['travelguide_activity_4_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">4</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_4_title'] ?? 'Bird Watching' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_4_description'] ?? 'Discover over 300 bird species in the Mount Elgon region.' }}</p>
            </div>
          </div>
        </div>

        <!-- Activity 5 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_5_image'] ?? 'images/clif2.jpg') }}" alt="{{ $content['travelguide_activity_5_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">5</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_5_title'] ?? 'Cave Adventures' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_5_description'] ?? 'The ancient caves echo stories of the past.' }}</p>
            </div>
          </div>
        </div>

        <!-- Activity 6 -->
        <div class="col-md-4 col-lg-2">
          <div class="activity-card" style="position: relative; height: 480px; overflow: hidden; cursor: pointer;">
            <img src="{{ asset($content['travelguide_activity_6_image'] ?? 'images/rock climbing.jpg') }}" alt="{{ $content['travelguide_activity_6_title'] ?? 'Activity' }}" loading="lazy" class="activity-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;">
            <div class="activity-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); transition: background 0.4s ease;"></div>
            <div class="activity-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-family: var(--font-display); font-size: 12rem; font-weight: 700; color: rgba(255,255,255,0.08); line-height: 1; pointer-events: none; transition: opacity 0.4s ease;">6</div>
            <div class="activity-body" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem 1.5rem; color: white; transform: translateY(20px); transition: transform 0.4s ease;">
              <div style="width: 40px; height: 2px; background: var(--accent-gold); margin-bottom: 1rem;"></div>
              <h5 style="font-family: var(--font-body); font-weight: 600; font-size: 1.25rem; color: white; margin-bottom: 0.75rem;">{{ $content['travelguide_activity_6_title'] ?? 'Rock Climbing' }}</h5>
              <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin: 0;">{{ $content['travelguide_activity_6_description'] ?? 'Challenge yourself on rugged cliffs with guided rock climbing adventures.' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Map Section -->
  <section id="map" class="container py-5 reveal" style="background: linear-gradient(to bottom, #ffffff, rgba(111, 207, 151, 0.05)); padding: 3rem 0;">
    <h2 class="text-center mb-4" style="font-family: var(--font-display); font-size: 2.5rem; color: var(--primary-green);">Find Sipi Falls</h2>
    <div class="d-flex justify-content-center">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.601019857624!2d34.37416731475344!3d1.3341673629999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177f7b2e2e2e2e2f%3A0x2e2e2e2e2e2e2e2e!2sSipi%20Falls!5e0!3m2!1sen!2sug!4v1693526400000!5m2!1sen!2sug"
        title="Map of Sipi Falls"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        style="width: 100%; height: 450px; border: 0; border-radius: 1rem; box-shadow: 0 2px 16px rgba(34, 139, 34, 0.07);">
      </iframe>
    </div>
    <div class="text-center mt-3">
      <a href="https://www.google.com/maps/place/Sipi+Falls/@1.3341674,34.3741673,15z"
         target="_blank"
         class="btn btn-lg"
         data-bs-toggle="tooltip"
         data-bs-placement="top"
         data-bs-title="Open Google Maps to get directions to Sipi Falls"
         aria-label="Get directions to Sipi Falls on Google Maps"
         style="background-color: var(--primary-green); color: white; border: 2px solid var(--primary-green); cursor: pointer; transition: all 0.3s ease; font-family: var(--font-body);"
         onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)'; this.style.borderColor='var(--accent-gold)'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
         onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.color='white'; this.style.borderColor='var(--primary-green)'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
        Get Directions on Google Maps
      </a>
    </div>
  </section>

  <!-- Photo Gallery Section -->
  <section class="reveal py-5" id="photo-gallery" style="background: #1a1a1a;">
    <div class="container">
      <h2 class="text-center mb-2" style="color: var(--accent-gold); font-family: var(--font-display); font-size: 2.5rem;">Photo Gallery</h2>
      <p class="text-center mb-4" style="color: rgba(255,255,255,0.7); font-family: var(--font-body); font-size: 1.1rem;">Explore Sipi Falls through our lens</p>

      <!-- Tabs -->
      <div class="d-flex flex-wrap justify-content-center gap-2 mb-4" id="tg-tabs" role="tablist">
        <button class="tg-tab active" data-tab="falls" role="tab" aria-selected="true">Falls</button>
        <button class="tg-tab" data-tab="adventure" role="tab" aria-selected="false">Adventure</button>
        <button class="tg-tab" data-tab="hiking" role="tab" aria-selected="false">Hiking</button>
        <button class="tg-tab" data-tab="mountain" role="tab" aria-selected="false">Mountain</button>
        <button class="tg-tab" data-tab="coffee" role="tab" aria-selected="false">Coffee</button>
        <button class="tg-tab" data-tab="travel" role="tab" aria-selected="false">Travel</button>
      </div>

      <!-- Panels -->
      <div id="tg-panel-falls" class="tg-panel active">
        <div class="tg-grid" id="tg-grid-falls">
          @php $fallsImages = ['BANNER.jpg','sipi.webp','water.jpg','xx.jpg','dwn.jpg','splash.jpg','fall2.jpg','fall3.jpg','falld1.jpg','f4.jpg','f5.jpg','f6.jpg','f7.jpg','f8.jpg','f10.jpg','f11.jpg','f12.jpg','f14.jpg','f15.jpg','f16.jpg','fall_1.jpg','fall_2.jpg','fall_3.jpg','fall_4.jpg','fall_5.jpg','fall_6.jpg','fall_7.jpg','fall_8.jpg','fall_9.jpg','fall_10.jpg','fall_11.jpg','fall_12.jpg','fall_13.jpg','fall_14.jpg','fall_15.jpg','fall_16.jpg','fall_17.jpg','fall_18.jpg','fall_19.jpg','fall_20.jpg','falls_and_dog.jpg','waterfall-base.jpg','waterfall-double.jpg','waterfall-hikers.jpg','waterfall-rainbow.jpg','waterfall-top.jpg','mens_pool.jpg','menpool.jpg']; @endphp
          @foreach($fallsImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/falls/' . $img) }}')">
              <img src="{{ asset('images/gallery/falls/' . $img) }}" alt="Sipi Falls" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
        @if(count($fallsImages) > 12)
          <div class="text-center mt-3"><button class="tg-load-more" data-grid="tg-grid-falls">Load More</button></div>
        @endif
      </div>

      <div id="tg-panel-adventure" class="tg-panel">
        <div class="tg-grid" id="tg-grid-adventure">
          @php $adventureImages = ['abseil3.jpg','abseil5.jpg','abseil6.jpg','abseil7.jpg','abseil8.jpg','abseil-aerial.jpg','abseil-freedom.jpg','abseil 1.jpg','cave.jpg','cave2.jpg','cave3.jpg','cave4.jpg','cave5.jpg','clif2.jpg','clif3.jpg','clif4.jpg','clicf 1.jpg','rock climbing.jpg','rock-climbing.jpg','start.jpg','start-bridge.jpg']; @endphp
          @foreach($adventureImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/adventure/' . $img) }}')">
              <img src="{{ asset('images/gallery/adventure/' . $img) }}" alt="Adventure at Sipi" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
        @if(count($adventureImages) > 12)
          <div class="text-center mt-3"><button class="tg-load-more" data-grid="tg-grid-adventure">Load More</button></div>
        @endif
      </div>

      <div id="tg-panel-hiking" class="tg-panel">
        <div class="tg-grid" id="tg-grid-hiking">
          @php $hikingImages = ['naturewalk.jpg','hiking.jpg','chamelon.jpg','chamelon1.jpg','chamelon3.jpeg','tourist.jpg','tourist_1.jpg','tourist_2.jpg','tourist_3.jpg','tourist-safari.jpg','waterfall-hikers.jpg','group.jpg']; @endphp
          @foreach($hikingImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/hiking/' . $img) }}')">
              <img src="{{ asset('images/gallery/hiking/' . $img) }}" alt="Hiking at Sipi" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
        @if(count($hikingImages) > 12)
          <div class="text-center mt-3"><button class="tg-load-more" data-grid="tg-grid-hiking">Load More</button></div>
        @endif
      </div>

      <div id="tg-panel-mountain" class="tg-panel">
        <div class="tg-grid" id="tg-grid-mountain">
          @php $mountainImages = ['sunset.jpg','sunset2.jpg','sunset3.jpeg','sunset4.jpeg','sunset-friends.jpg','sunset-dinner.jpg','sunset-toast.jpg','sunset _cheers.jpeg','sunset-cheers.jpeg','mt Elgon.jpg','mt-elgon.jpg','sky.jpeg','mosesg.jpg','sample.jpg']; @endphp
          @foreach($mountainImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/mountain/' . $img) }}')">
              <img src="{{ asset('images/gallery/mountain/' . $img) }}" alt="Mountain views" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
        @if(count($mountainImages) > 12)
          <div class="text-center mt-3"><button class="tg-load-more" data-grid="tg-grid-mountain">Load More</button></div>
        @endif
      </div>

      <div id="tg-panel-coffee" class="tg-panel">
        <div class="tg-grid" id="tg-grid-coffee">
          @php $coffeeImages = ['cofi.jpg','cofi1.jpg','coffee.jpg','coffee2.jpg','coffee-raw.jpg','coffee-ready.jpg','rawcofi.jpg','readycofi.jpg','raw_cofee.jpg','ready_coffee_berries.jpg','coffee_and_grinder.jpeg']; @endphp
          @foreach($coffeeImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/coffee/' . $img) }}')">
              <img src="{{ asset('images/gallery/coffee/' . $img) }}" alt="Sipi coffee" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
        @if(count($coffeeImages) > 12)
          <div class="text-center mt-3"><button class="tg-load-more" data-grid="tg-grid-coffee">Load More</button></div>
        @endif
      </div>

      <div id="tg-panel-travel" class="tg-panel">
        <div class="tg-grid" id="tg-grid-travel">
          @php $travelImages = ['tourist-safari.jpg','FB_IMG_1741530853891.jpg','dog.jpg','falls_and_dog.jpg']; @endphp
          @foreach($travelImages as $i => $img)
            <div class="tg-item{{ $i >= 12 ? ' tg-hidden' : '' }}" onclick="openTgLightbox('{{ asset('images/gallery/travel/' . $img) }}')">
              <img src="{{ asset('images/gallery/travel/' . $img) }}" alt="Travel at Sipi" loading="lazy">
              <div class="tg-overlay"><i class="fas fa-expand"></i></div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- Lightbox -->
  <div id="tg-lightbox" onclick="if(event.target===this) closeTgLightbox()" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.92); z-index:9999; align-items:center; justify-content:center;">
    <button onclick="closeTgLightbox()" style="position:fixed; top:1.25rem; right:1.5rem; background:rgba(0,0,0,0.6); border:2px solid rgba(255,255,255,0.5); color:white; font-size:1.75rem; line-height:1; width:2.5rem; height:2.5rem; border-radius:50%; cursor:pointer; z-index:10000; display:flex; align-items:center; justify-content:center;" aria-label="Close lightbox">&times;</button>
    <img id="tg-lightbox-img" src="" alt="Gallery image" style="max-width:90vw; max-height:90vh; object-fit:contain; border-radius:0.5rem;">
  </div>

  <script>
    // Tabbed gallery
    document.querySelectorAll('.tg-tab').forEach(function(btn) {
      btn.addEventListener('click', function() {
        document.querySelectorAll('.tg-tab').forEach(function(b) { b.classList.remove('active'); b.setAttribute('aria-selected','false'); });
        document.querySelectorAll('.tg-panel').forEach(function(p) { p.classList.remove('active'); });
        btn.classList.add('active');
        btn.setAttribute('aria-selected','true');
        document.getElementById('tg-panel-' + btn.dataset.tab).classList.add('active');
      });
    });

    // Load more
    document.querySelectorAll('.tg-load-more').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var grid = document.getElementById(btn.dataset.grid);
        grid.querySelectorAll('.tg-hidden').forEach(function(item) { item.classList.remove('tg-hidden'); });
        btn.parentElement.remove();
      });
    });

    // Lightbox
    function openTgLightbox(src) {
      var lb = document.getElementById('tg-lightbox');
      document.getElementById('tg-lightbox-img').src = src;
      lb.style.display = 'flex';
    }
    function closeTgLightbox() {
      document.getElementById('tg-lightbox').style.display = 'none';
      document.getElementById('tg-lightbox-img').src = '';
    }
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeTgLightbox(); });
  </script>

  @endsection


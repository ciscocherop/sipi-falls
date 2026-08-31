@extends('layouts.app')

@push('seo')
<title>Travel Guide — Sipi Falls Uganda | Tips, Activities & Booking</title>
<meta property="og:title" content="Travel Guide — Sipi Falls Uganda">
<meta property="og:description" content="Everything you need to plan your Sipi Falls visit. Activities, essential tips, pricing, booking and maps for Uganda's most stunning waterfall destination.">
<meta property="og:url" content="{{ url('/travel-guide') }}">
<meta name="twitter:title" content="Travel Guide — Sipi Falls Uganda">
<meta name="twitter:description" content="Everything you need to plan your Sipi Falls visit. Activities, tips, pricing and booking.">
@endpush

@section('title', 'Travel Guide - Sipi Falls')

@section('content')

  <!-- Hero Section -->
  <section class="reveal text-center text-light d-flex align-items-center justify-content-center" 
           style="position: relative; overflow: hidden; height: 80vh; width: 100%;">
    <div class="kenburns-bg" style="position: absolute; inset: 0; background: url('{{ asset('images/water.jpg') }}') center/cover no-repeat; animation: kenburns 12s ease-in-out infinite; z-index: 0;"></div>
    <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.55) 60%, rgba(0,0,0,0.2) 100%); z-index: 1;"></div>
    <div class="p-4 p-md-5" style="position: relative; z-index: 2;">
      <h1 class="display-3 fw-bold" style="color: #ffffff; font-family: var(--font-display); letter-spacing: 0.02em;">Your Sipi Falls Travel Guide</h1>
      <p class="lead" style="color: #ffffff; font-family: var(--font-body);">Plan your perfect adventure — tips, activities, maps and everything in between.</p>
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
          <button type="button"
                  onclick="document.getElementById('extraTipsModal').style.display='flex'; document.body.style.overflow='hidden';"
                  style="background-color: transparent; color: var(--primary-green); border: 2px solid var(--primary-green); padding: 0.75rem 2.5rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; border-radius: 0.25rem; transition: all 0.3s; cursor: pointer;"
                  onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                  onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='var(--primary-green)'; this.style.color='var(--primary-green)';">
            <i class="fas fa-lightbulb" style="margin-right:0.4rem;"></i> Extra Tips
          </button>
        </div>
      </section>
    </section>
  </section>

  <!-- Extra Tips Modal -->
  <div id="extraTipsModal"
       onclick="if(event.target===this) closeExtraTips();"
       style="display:none; position:fixed; inset:0; z-index:9999;
              background:rgba(0,0,0,0.6); backdrop-filter:blur(4px);
              align-items:center; justify-content:center; padding:1rem; overflow-y:auto;">
    <div style="background:white; border-radius:16px; border-top:4px solid var(--accent-gold);
                width:100%; max-width:520px; margin:auto;
                box-shadow:0 24px 64px rgba(0,0,0,0.25); display:flex; flex-direction:column;">

      <!-- Header -->
      <div style="background:var(--primary-green); padding:1rem 1.25rem; border-radius:12px 12px 0 0;
                  display:flex; align-items:center; justify-content:space-between; gap:0.75rem; flex-shrink:0;">
        <div>
          <h5 style="font-family:var(--font-display); color:white; margin:0; font-size:1.1rem; font-weight:700;">
            <i class="fas fa-lightbulb" style="color:var(--accent-gold); margin-right:0.5rem;"></i>Extra Tips for Sipi Falls
          </h5>
          <p style="font-family:var(--font-body); color:rgba(255,255,255,0.65); font-size:0.72rem; margin:0;">
            Practical advice from seasoned visitors
          </p>
        </div>
        <button onclick="closeExtraTips();"
                aria-label="Close tips"
                style="background:rgba(255,255,255,0.2); border:2px solid rgba(255,255,255,0.5);
                       color:white; font-size:1.25rem; min-width:2.75rem; width:2.75rem; height:2.75rem;
                       border-radius:50%; cursor:pointer; display:flex; align-items:center; justify-content:center;
                       flex-shrink:0; transition:background 0.2s; touch-action:manipulation;
                       -webkit-tap-highlight-color:transparent;"
                onmouseover="this.style.background='rgba(255,255,255,0.35)';"
                onmouseout="this.style.background='rgba(255,255,255,0.2)';">
          &times;
        </button>
      </div>

      <!-- Body — scrollable -->
      <div style="overflow-y:auto; max-height:60vh; padding:1.25rem 1.5rem;">
        <ul style="list-style:none; padding:0; margin:0;">
          @php $tips = $extraTips ?? [
            'Carry cash — ATMs are scarce in Sipi. Stock up in Mbale or Kampala before arrival.',
            'Start hikes early morning — mist clears by 9am giving the best waterfall views.',
            'Wear sturdy hiking shoes — trails can be slippery after rain.',
            'Bring a light rain jacket — weather changes quickly on Mount Elgon.',
            'Hire a local Sabiny guide — they know hidden trails and cultural stories.',
            'Book abseiling at least a day in advance — equipment needs to be arranged.',
            'The best coffee is bought directly from local farmers — ask your guide.',
            'Respect local customs — ask before photographing people or sacred sites.',
            'Carry at least 2 litres of water per person for hikes.',
            'Mobile network is limited — MTN works best in the area.',
          ]; @endphp
          @foreach($tips as $tip)
          <li style="display:flex; align-items:flex-start; gap:0.75rem; padding:0.7rem 0;
                     border-bottom:1px solid #f0f0f0; font-family:var(--font-body);
                     font-size:0.9rem; color:var(--neutral-gray); line-height:1.7;">
            <i class="fas fa-leaf" style="color:var(--accent-gold); margin-top:3px; flex-shrink:0;"></i>
            <span>{{ $tip }}</span>
          </li>
          @endforeach
        </ul>
      </div>

      <!-- Footer -->
      <div style="padding:0.85rem 1.5rem; border-top:1px solid #f0f0f0; text-align:center; flex-shrink:0;">
        <button onclick="closeExtraTips();"
                style="font-family:var(--font-body); font-size:0.85rem; font-weight:600;
                       background:var(--primary-green); color:white; border:none;
                       padding:0.6rem 2rem; border-radius:8px; cursor:pointer; transition:all 0.25s;
                       touch-action:manipulation;"
                onmouseover="this.style.background='var(--accent-gold)'; this.style.color='#1a1a0a';"
                onmouseout="this.style.background='var(--primary-green)'; this.style.color='white';">
          Got it — Close
        </button>
      </div>
    </div>
  </div>

  <!-- Travel Guide Stats Strip -->
  <section class="reveal" style="background: #0d1f0d; padding: 3rem 0;">
    <div class="container">
        <div class="row text-center g-4">

            <!-- Stat 1 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">3</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">Waterfalls</p>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">6+</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">Activities</p>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">100m</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">Main Fall Height</p>
                </div>
            </div>

            <!-- Stat 4 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">6hrs</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">From Kampala</p>
                </div>
            </div>

            <!-- Stat 5 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">300+</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">Bird Species</p>
                </div>
            </div>

            <!-- Stat 6 -->
            <div class="col-6 col-md-2">
                <div style="padding: 1rem;">
                    <h3 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; color: var(--accent-gold); line-height: 1; margin-bottom: 0.25rem;">2</h3>
                    <div style="width: 30px; height: 2px; background: var(--accent-gold); margin: 0.5rem auto; opacity: 0.4;"></div>
                    <p style="font-family: var(--font-body); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase; color: rgba(255,255,255,0.7); margin: 0;">Best Seasons</p>
                </div>
            </div>

        </div>
    </div>
  </section>

  <!-- Activities Section -->
  <section class="reveal py-5" id="activities" style="background: var(--neutral-offwhite); padding: 3rem 0;">
    <div class="container-fluid px-0" style="background: transparent;">
      <h2 class="text-center mb-2" style="color: var(--primary-green); font-family: var(--font-display);">
        Activities at Sipi Falls
      </h2>
      <!-- Mobile swipe hint -->
      <p id="actSwipeHint" style="text-align:center; font-family:var(--font-body); font-size:0.75rem; color:#aaa; margin-bottom:0.75rem; display:none;">
        <i class="fas fa-hand-point-right" style="margin-right:4px;"></i> Swipe or wait for auto-advance
      </p>

      <!-- Carousel track wrapper -->
      <div id="actCarouselWrap" style="position:relative; overflow:hidden;">
        <div id="actCarouselTrack" style="display:flex; transition:transform 0.55s cubic-bezier(0.4,0,0.2,1); will-change:transform;">

          @php
            $activities = [
              ['num'=>1, 'img_key'=>'travelguide_activity_1_image', 'img_default'=>'images/naturewalk.jpg',
               'title_key'=>'travelguide_activity_1_title', 'title_default'=>'Hiking the Waterfalls',
               'desc_key'=>'travelguide_activity_1_description', 'desc_default'=>'Explore scenic trails to all three waterfalls.',
               'act_key'=>'travelguide_activity_1'],
              ['num'=>2, 'img_key'=>'travelguide_activity_2_image', 'img_default'=>'images/abseil3.jpg',
               'title_key'=>'travelguide_activity_2_title', 'title_default'=>'Abseiling',
               'desc_key'=>'travelguide_activity_2_description', 'desc_default'=>'Descend a 100m cliff beside the main waterfall.',
               'act_key'=>'travelguide_activity_2'],
              ['num'=>3, 'img_key'=>'travelguide_activity_3_image', 'img_default'=>'images/cofi.jpg',
               'title_key'=>'travelguide_activity_3_title', 'title_default'=>'Coffee Tours',
               'desc_key'=>'travelguide_activity_3_description', 'desc_default'=>'Visit local farms and taste freshly brewed Sipi coffee.',
               'act_key'=>'travelguide_activity_3'],
              ['num'=>4, 'img_key'=>'travelguide_activity_4_image', 'img_default'=>'images/chamelon.jpg',
               'title_key'=>'travelguide_activity_4_title', 'title_default'=>'Bird Watching',
               'desc_key'=>'travelguide_activity_4_description', 'desc_default'=>'Discover over 300 bird species in the Mount Elgon region.',
               'act_key'=>'travelguide_activity_4'],
              ['num'=>5, 'img_key'=>'travelguide_activity_5_image', 'img_default'=>'images/clif2.jpg',
               'title_key'=>'travelguide_activity_5_title', 'title_default'=>'Cave Adventures',
               'desc_key'=>'travelguide_activity_5_description', 'desc_default'=>'The ancient caves echo stories of the past.',
               'act_key'=>'travelguide_activity_5'],
              ['num'=>6, 'img_key'=>'travelguide_activity_6_image', 'img_default'=>'images/rock climbing.jpg',
               'title_key'=>'travelguide_activity_6_title', 'title_default'=>'Rock Climbing',
               'desc_key'=>'travelguide_activity_6_description', 'desc_default'=>'Challenge yourself on rugged cliffs with guided rock climbing adventures.',
               'act_key'=>'travelguide_activity_6'],
            ];
          @endphp

          @foreach($activities as $act)
          <div class="act-slide" style="flex-shrink:0; position:relative; overflow:hidden; cursor:pointer; height:560px;">
            <img src="{{ asset($content[$act['img_key']] ?? $act['img_default']) }}"
                 alt="{{ $content[$act['title_key']] ?? $act['title_default'] }}"
                 loading="lazy" class="activity-img"
                 style="position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; transition:transform 0.6s ease;">
            <div class="activity-overlay"
                 style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); transition:background 0.4s ease;"></div>
            <div class="activity-number"
                 style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); font-family:var(--font-display); font-size:12rem; font-weight:700; color:rgba(255,255,255,0.08); line-height:1; pointer-events:none; transition:opacity 0.4s ease;">{{ $act['num'] }}</div>
            <div class="activity-body"
                 style="position:absolute; bottom:0; left:0; right:0; padding:2rem 1.5rem; color:white; transform:translateY(20px); transition:transform 0.4s ease;">
              <div style="width:40px; height:2px; background:var(--accent-gold); margin-bottom:1rem;"></div>
              <h5 style="font-family:var(--font-body); font-weight:600; font-size:1.25rem; color:white; margin-bottom:0.75rem;">
                {{ $content[$act['title_key']] ?? $act['title_default'] }}
              </h5>
              <p style="font-family:var(--font-body); font-size:0.9rem; line-height:1.6; color:rgba(255,255,255,0.9); margin:0;">
                {{ $content[$act['desc_key']] ?? $act['desc_default'] }}
              </p>
              <div class="activity-reactions" data-activity="{{ $act['act_key'] }}"
                   style="display:flex; gap:0.5rem; margin-top:0.75rem; flex-wrap:wrap;">
                <button class="reaction-btn" data-emoji="thumbs_up" style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:999px; padding:0.25rem 0.65rem; cursor:pointer; font-size:0.8rem; color:white; font-family:var(--font-body); transition:all 0.2s; display:flex; align-items:center; gap:0.3rem;">👍 <span class="reaction-count">0</span></button>
                <button class="reaction-btn" data-emoji="love"      style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:999px; padding:0.25rem 0.65rem; cursor:pointer; font-size:0.8rem; color:white; font-family:var(--font-body); transition:all 0.2s; display:flex; align-items:center; gap:0.3rem;">❤️ <span class="reaction-count">0</span></button>
                <button class="reaction-btn" data-emoji="fire"      style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:999px; padding:0.25rem 0.65rem; cursor:pointer; font-size:0.8rem; color:white; font-family:var(--font-body); transition:all 0.2s; display:flex; align-items:center; gap:0.3rem;">🔥 <span class="reaction-count">0</span></button>
                <button class="reaction-btn" data-emoji="wow"       style="background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); border-radius:999px; padding:0.25rem 0.65rem; cursor:pointer; font-size:0.8rem; color:white; font-family:var(--font-body); transition:all 0.2s; display:flex; align-items:center; gap:0.3rem;">⭐ <span class="reaction-count">0</span></button>
              </div>
            </div>
          </div>
          @endforeach

        </div>{{-- /actCarouselTrack --}}
      </div>{{-- /actCarouselWrap --}}

      <!-- Carousel controls: prev · dots · next + progress bar -->
      <div id="actControls" style="display:none; flex-direction:column; align-items:center; gap:0.75rem; padding:0.85rem 0 0.25rem;">
        <div style="display:flex; align-items:center; justify-content:center; gap:1rem;">
          <button type="button" onclick="actMove(-1)" aria-label="Previous activity"
                  style="width:40px; height:40px; border-radius:50%; background:white; border:2px solid var(--primary-green); color:var(--primary-green); cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.08); transition:all 0.25s;"
                  onmouseover="this.style.background='var(--primary-green)'; this.style.color='white';"
                  onmouseout="this.style.background='white'; this.style.color='var(--primary-green)';">
            <i class="fas fa-chevron-left" style="font-size:0.8rem;"></i>
          </button>

          <div id="actDots" style="display:flex; gap:6px; align-items:center;"></div>

          <button type="button" onclick="actMove(1)" aria-label="Next activity"
                  style="width:40px; height:40px; border-radius:50%; background:var(--primary-green); border:2px solid var(--primary-green); color:white; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.08); transition:all 0.25s;"
                  onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                  onmouseout="this.style.background='var(--primary-green)'; this.style.borderColor='var(--primary-green)'; this.style.color='white';">
            <i class="fas fa-chevron-right" style="font-size:0.8rem;"></i>
          </button>
        </div>

        <!-- Auto-advance progress bar -->
        <div style="width:120px; height:3px; background:rgba(0,0,0,0.1); border-radius:2px; overflow:hidden;">
          <div id="actProgressBar" style="height:100%; width:0%; background:var(--primary-green); border-radius:2px; transition:width linear;"></div>
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



  @endsection


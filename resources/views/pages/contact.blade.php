@extends('layouts.app')

@push('seo')
<title>Contact & Book — Sipi Falls Uganda | Plan Your Adventure</title>
<meta property="og:title" content="Contact & Book — Sipi Falls Uganda">
<meta property="og:description" content="Ready to visit Sipi Falls? Contact our team, book your adventure, find accommodation and get answers to all your questions about visiting Kapchorwa, Uganda.">
<meta property="og:url" content="{{ url('/contact') }}">
<meta name="twitter:title" content="Contact & Book — Sipi Falls Uganda">
<meta name="twitter:description" content="Ready to visit Sipi Falls? Book your adventure and plan your trip to Kapchorwa, Uganda.">
@endpush

@section('title', 'Contact Us - Sipi Falls')

@section('content')

  <!-- CONTACT HERO SECTION -->
  <section class="reveal" style="position: relative; overflow: hidden; padding: 7rem 0;">
      <div class="kenburns-bg" style="position: absolute; inset: 0; background: url('{{ asset('images/gallery/adventure/abseil9.jpg') }}') center/cover no-repeat; animation: kenburns 12s ease-in-out infinite; z-index: 0;"></div>
      <div style="position: absolute; inset: 0; background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.65)); z-index: 1;"></div>
    <div class="container text-center" style="position: relative; z-index: 2;">
        <p style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 1rem;">We'd Love To Hear From You</p>
        <h1 style="font-family: var(--font-display); color: white; font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
            Ready for Sipi? Let's Begin<br>
            the <span style="color: var(--accent-gold); font-style: italic;">Journey!</span>
        </h1>
        <p style="font-family: var(--font-body); color: rgba(255,255,255,0.75); font-size: 1rem; max-width: 550px; margin: 0 auto 2.5rem; line-height: 1.8;">
            Thrilled to explore Sipi Falls? Our Sabiny team is ready to plan your adventure.
        </p>
        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 1rem;">
            <a href="#contact-form"
               style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: transparent; color: white; border: 2px solid white; padding: 0.875rem 2.5rem; text-decoration: none; display: inline-block; transition: all 0.3s; border-radius: 0.25rem;"
               onmouseover="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
               onmouseout="this.style.background='transparent'; this.style.borderColor='white'; this.style.color='white';">
                Contact Us
            </a>
            <a href="#booking-form"
               style="font-family: var(--font-body); font-size: 0.85rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; background: var(--accent-gold); color: var(--neutral-dark); border: 2px solid var(--accent-gold); padding: 0.875rem 2.5rem; text-decoration: none; display: inline-block; transition: all 0.3s; border-radius: 0.25rem;"
               onmouseover="this.style.background='white'; this.style.borderColor='white'; this.style.color='var(--neutral-dark)';"
               onmouseout="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';">
                Book Now
            </a>
        </div>
    </div>
  </section>


  <!-- Pricing Section -->
  <section class="reveal" style="background: linear-gradient(rgba(0,0,0,0.82), rgba(0,0,0,0.82)), url('{{ asset('images/gallery/adventure/abseil-freedom.jpg') }}') center/cover no-repeat fixed; padding: 3rem 0;">
      <div class="container">

          <!-- Header -->
          <p class="text-center" style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 0.5rem;">No Hidden Costs</p>
          <h2 class="text-center" style="font-family: var(--font-display); color: white; font-size: 2.25rem; margin-bottom: 0.25rem;">Adventure Pricing</h2>
          <p class="text-center" style="font-family: var(--font-body); color: rgba(255,255,255,0.5); font-size: 0.9rem; margin-bottom: 1.75rem;">Transparent pricing for unforgettable experiences</p>

          <!-- Pricing Grid -->
          <div class="row g-3 mb-4">
              <!-- Hiking -->
              <div class="col-md-6 col-lg-3">
                  <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-top: 3px solid var(--primary-green); border-radius: 0.5rem; padding: 1rem 1.25rem; height: 100%; transition: all 0.3s;"
                      onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(-4px)';"
                      onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)';">
                      <div style="text-align: center; margin-bottom: 1.25rem;">
                          <i class="fas fa-hiking" style="font-size: 2rem; color: var(--primary-green); margin-bottom: 0.75rem; display: block;"></i>
                          <h5 style="font-family: var(--font-body); font-weight: 700; color: white; margin-bottom: 0.25rem;">Hiking</h5>
                          <div style="font-family: var(--font-display); font-size: 1.6rem; font-weight: 700; color: var(--accent-gold);">$30-50</div>
                          <div style="font-family: var(--font-body); font-size: 0.8rem; color: rgba(255,255,255,0.4);">per person</div>
                      </div>
                      <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>3 Waterfalls tour</li>
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>Expert guide included</li>
                          <li style="padding: 0.4rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>3-4 hours duration</li>
                      </ul>
                  </div>
              </div>

              <!-- Abseiling -->
              <div class="col-md-6 col-lg-3">
                  <div style="background: rgba(201,149,26,0.15); border: 1px solid rgba(201,149,26,0.3); border-top: 3px solid var(--accent-gold); border-radius: 0.5rem; padding: 1rem 1.25rem; height: 100%; transition: all 0.3s; position: relative;"
                      onmouseover="this.style.background='rgba(201,149,26,0.22)'; this.style.transform='translateY(-4px)';"
                      onmouseout="this.style.background='rgba(201,149,26,0.15)'; this.style.transform='translateY(0)';">
                      <!-- Popular badge -->
                      <div style="position: absolute; top: -1px; left: 50%; transform: translateX(-50%); background: var(--accent-gold); color: var(--neutral-dark); font-family: var(--font-body); font-size: 0.7rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.2rem 0.75rem; border-radius: 0 0 0.25rem 0.25rem;">Most Popular</div>
                      <div style="text-align: center; margin-bottom: 1.25rem; margin-top: 0.5rem;">
                          <i class="fas fa-mountain" style="font-size: 2rem; color: var(--accent-gold); margin-bottom: 0.75rem; display: block;"></i>
                          <h5 style="font-family: var(--font-body); font-weight: 700; color: white; margin-bottom: 0.25rem;">Abseiling</h5>
                          <div style="font-family: var(--font-display); font-size: 1.6rem; font-weight: 700; color: var(--accent-gold);">$60-80</div>
                          <div style="font-family: var(--font-body); font-size: 0.8rem; color: rgba(255,255,255,0.4);">per person</div>
                      </div>
                      <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i>Safety equipment</li>
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i>Professional instructor</li>
                          <li style="padding: 0.4rem 0;"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i>2-3 hours experience</li>
                      </ul>
                  </div>
              </div>

              <!-- Coffee Tour -->
              <div class="col-md-6 col-lg-3">
                  <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-top: 3px solid var(--primary-green); border-radius: 0.5rem; padding: 1rem 1.25rem; height: 100%; transition: all 0.3s;"
                      onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(-4px)';"
                      onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)';">
                      <div style="text-align: center; margin-bottom: 1.25rem;">
                          <i class="fas fa-coffee" style="font-size: 2rem; color: var(--primary-green); margin-bottom: 0.75rem; display: block;"></i>
                          <h5 style="font-family: var(--font-body); font-weight: 700; color: white; margin-bottom: 0.25rem;">Coffee Tour</h5>
                          <div style="font-family: var(--font-display); font-size: 1.6rem; font-weight: 700; color: var(--accent-gold);">$25-40</div>
                          <div style="font-family: var(--font-body); font-size: 0.8rem; color: rgba(255,255,255,0.4);">per person</div>
                      </div>
                      <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>Farm-to-cup experience</li>
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>Coffee tasting included</li>
                          <li style="padding: 0.4rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>2 hours tour</li>
                      </ul>
                  </div>
              </div>

              <!-- Mount Elgon Hike -->
              <div class="col-md-6 col-lg-3">
                  <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-top: 3px solid var(--primary-green); border-radius: 0.5rem; padding: 1rem 1.25rem; height: 100%; transition: all 0.3s;"
                      onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(-4px)';"
                      onmouseout="this.style.background='rgba(255,255,255,0.06)'; this.style.transform='translateY(0)';">
                      <div style="text-align: center; margin-bottom: 1.25rem;">
                          <i class="fas fa-mountain" style="font-size: 2rem; color: var(--primary-green); margin-bottom: 0.75rem; display: block;"></i>
                          <h5 style="font-family: var(--font-body); font-weight: 700; color: white; margin-bottom: 0.25rem;">Mount Elgon Hike</h5>
                          <div style="font-family: var(--font-display); font-size: 1.6rem; font-weight: 700; color: var(--accent-gold);">$100</div>
                          <div style="font-family: var(--font-body); font-size: 0.8rem; color: rgba(255,255,255,0.4);">per person · 3-day tour</div>
                      </div>
                      <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>3-day trek to the peak</li>
                          <li style="padding: 0.4rem 0; border-bottom: 1px solid rgba(255,255,255,0.07);"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>Through montane forest</li>
                          <li style="padding: 0.4rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i>Wildlife & bird watching</li>
                      </ul>
                  </div>
              </div>
          </div>

          <!-- Payment Options — compact strip -->
          <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 0.5rem; padding: 1.5rem 2rem; margin-top: 1rem;">
              <div class="row g-3 align-items-center">
                  <div class="col-12 col-md-3">
                      <p style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent-gold); margin: 0; text-align: center;">Payment Options</p>
                  </div>
                  <div class="col-4 col-md-3">
                      <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                          <i class="fas fa-money-bill-wave" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                          <span style="font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">Cash on Arrival</span>
                      </div>
                  </div>
                  <div class="col-4 col-md-3">
                      <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                          <i class="fas fa-mobile-alt" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                          <span style="font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">Mobile Money</span>
                      </div>
                  </div>
                  <div class="col-4 col-md-3">
                      <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                          <i class="fas fa-university" style="color: var(--primary-green); font-size: 1.2rem;"></i>
                          <span style="font-family: var(--font-body); font-size: 0.85rem; color: rgba(255,255,255,0.7);">Bank Transfer</span>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>


  <!-- Booking Form - Split Screen Design -->
  <section id="booking-form" class="container-fluid p-0 reveal" style="position: relative; overflow: hidden;">
    <div class="row g-0">
      
      <!-- Left Side - Background Image (Fixed) -->
      <div class="col-lg-6 d-none d-lg-block" style="position: relative; background-image: url('{{ asset('images/gallery/falls/waterfall-base.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 450px;">
        
        <!-- Content on Image -->
        <div style="position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; padding: 1.5rem 1.5rem 0 1.5rem; text-align: center; color: white;">
          <div style="max-width: 500px; background: rgba(0, 0, 0, 0.65); padding: 1.5rem 1.25rem; border-radius: 1rem; backdrop-filter: blur(10px); margin-top: 1rem;">
            <i class="fas fa-mountain" style="font-size: 2.5rem; color: var(--accent-gold); margin-bottom: 0.75rem;"></i>
            <h2 style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; margin-bottom: 0.75rem; line-height: 1.2;">
              Your Adventure <span style="color: var(--accent-gold);">Awaits</span>
            </h2>
            <p style="font-family: var(--font-body); font-size: 0.9rem; line-height: 1.6; opacity: 0.95; margin-bottom: 1rem;">
              Experience the breathtaking beauty of Sipi Falls. From hiking majestic waterfalls to abseiling down cliffs, your unforgettable journey starts here.
            </p>
            
            <!-- Feature List -->
            <div style="text-align: left; margin-top: 1rem;">
              <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 0.9rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 0.9rem; font-family: var(--font-body);">Expert Local Guides</div>
                  <div style="font-size: 0.8rem; opacity: 0.85; font-family: var(--font-body);">Professional Sabiny guides for your safety</div>
                </div>
              </div>
              
              <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 0.9rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 0.9rem; font-family: var(--font-body);">Flexible Scheduling</div>
                  <div style="font-size: 0.8rem; opacity: 0.85; font-family: var(--font-body);">Choose your preferred date and activities</div>
                </div>
              </div>
              
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 0.9rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 0.9rem; font-family: var(--font-body);">24/7 Support</div>
                  <div style="font-size: 0.8rem; opacity: 0.85; font-family: var(--font-body);">We're here to help before, during, and after</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Side - Booking Form -->
      <div class="col-lg-6" style="background: var(--neutral-light); display: flex; align-items: center; justify-content: center; padding: 1.5rem 1.5rem; min-height: 450px;">
        <div style="width: 100%; max-width: 550px; border-top: 4px solid var(--accent-gold); background: white; border-radius: 0.5rem; padding: 1.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
          
          <!-- Form Header -->
          <div style="text-align: center; margin-bottom: 1.25rem;">
            <h2 style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 1.75rem; margin-bottom: 0.25rem;">
              Book Your Adventure
            </h2>
            <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.85rem; opacity: 0.8;">
              Get instant price estimate • Final pricing confirmed within 24 hours
            </p>
          </div>
          
          <!-- Success/Error Messages for Booking -->
          @if(session('status') === 'success' && session('form') === 'booking' && session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-left: 4px solid var(--primary-green);">
              <i class="fas fa-check-circle me-2"></i>
              {{ session('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-left: 4px solid #dc3545;">
              <i class="fas fa-exclamation-circle me-2"></i>
              <strong>Please fix the following errors:</strong>
              <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <!-- Booking Form -->
          <form action="{{ route('booking.submit') }}" method="POST" role="form" aria-label="Booking form for Sipi Falls adventure">
            @csrf
            
            <!-- Full Name -->
            <div class="mb-3">
              <label for="full-name" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Full Name *</label>
              <input type="text" class="form-control" id="full-name" name="fullname" required placeholder="John Doe" 
                     style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                     onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                     onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email-booking" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Email Address *</label>
              <input type="email" class="form-control" id="email-booking" name="email-booking" required placeholder="john@example.com" 
                     style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                     onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                     onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
            </div>

            <!-- Travel Date & Activity -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="travel-date" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Travel Date *</label>
                <input type="date" class="form-control" id="travel-date" name="travel-date" required 
                       style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                       onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
              </div>

              <div class="col-12">
                <label style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem; margin-bottom: 0.5rem; display: block;">Select Activities *</label>

                <!-- Mobile toggle button — controlled by CSS, hidden on desktop -->
                <button type="button" id="actToggleBtn" onclick="toggleActivityList()"
                        style="width:100%; text-align:left; background:#f8f8f8;
                               border:1.5px solid #e0e0e0; border-radius:8px; padding:0.65rem 1rem;
                               font-family:var(--font-body); font-size:0.875rem; color:var(--neutral-gray);
                               cursor:pointer; align-items:center; justify-content:space-between; gap:0.5rem;
                               margin-bottom:0.35rem; transition:border-color 0.2s;">
                    <span id="actToggleLabel">Choose activities <span id="actSelectedCount" style="color:var(--primary-green); font-weight:700;"></span></span>
                    <i id="actToggleChevron" class="fas fa-chevron-down"
                       style="font-size:0.75rem; transition:transform 0.25s; flex-shrink:0;"></i>
                </button>

                <!-- The actual checkbox list -->
                <div id="actCheckboxList" class="activities-checkbox-grid"
                     style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 0.4rem;">
                    @foreach([
                        'hiking'          => '🥾 Hiking',
                        'abseiling'       => '🧗 Abseiling',
                        'coffee-tour'     => '☕ Coffee Tour',
                        'nature-walks'    => '🌿 Nature Walks',
                        'bird-watching'   => '🦅 Bird Watching',
                        'rock-climbing'   => '⛰️ Rock Climbing',
                        'cave-adventures' => '🕳️ Cave Adventures',
                        'mt-elgon-hike'   => '🏔️ Mt Elgon Hike',
                    ] as $value => $label)
                    <label class="activity-checkbox-item"
                           style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0.75rem; border: 2px solid #e0e0e0; border-radius: 0.375rem; cursor: pointer; transition: all 0.2s; font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); background: white;"
                           onmouseover="this.style.borderColor='var(--primary-green)'; this.style.background='rgba(26,107,26,0.04)';"
                           onmouseout="if(!this.querySelector('input').checked){ this.style.borderColor='#e0e0e0'; this.style.background='white'; }">
                        <input type="checkbox" name="preferred_activities[]" value="{{ $value }}"
                               style="width: 15px; height: 15px; accent-color: var(--primary-green); flex-shrink: 0; cursor: pointer;"
                               onchange="this.closest('label').style.borderColor=this.checked?'var(--primary-green)':'#e0e0e0'; this.closest('label').style.background=this.checked?'rgba(26,107,26,0.08)':'white'; updateActivityCount();">
                        {{ $label }}
                    </label>
                    @endforeach
                </div>
              </div>
            </div>

            <!-- Adults & Children -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="adults" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Adults *</label>
                <input type="number" class="form-control" id="adults" name="num_adults" min="1" required placeholder="2" 
                       style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                       onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
              </div>

              <div class="col-md-6">
                <label for="children" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Children</label>
                <input type="number" class="form-control" id="children" name="num_children" min="0" placeholder="0" 
                       style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                       onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
              </div>
            </div>

            <!-- Price Estimate Display -->
            <div id="price-estimate" style="display: none; background: linear-gradient(135deg, rgba(26,107,26,0.05) 0%, rgba(201,149,26,0.05) 100%); padding: 1.5rem; border-radius: 0.75rem; margin-bottom: 1.5rem; border: 2px solid rgba(26,107,26,0.2);">
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <span style="font-family: var(--font-body); font-size: 1rem; color: var(--neutral-gray); font-weight: 600;">
                  <i class="fas fa-calculator" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Estimated Price
                </span>
                <span id="price-range" style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: var(--primary-green);"></span>
              </div>
              <p style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.8; margin: 0; text-align: center;">
                <i class="fas fa-info-circle" style="margin-right: 0.25rem;"></i> Final price confirmed within 24 hours via email
              </p>
            </div>

            <!-- Newsletter Checkbox -->
            <div class="mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agree" name="agree" style="border: 2px solid #e0e0e0;">
                <label class="form-check-label" for="agree" style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.9rem;">
                  I agree to receive booking updates and newsletters
                </label>
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-lg w-100 shadow-sm" 
                    style="background-color: var(--primary-green); color: white; border: 2px solid var(--primary-green); padding: 1rem; font-family: var(--font-body); font-weight: 600; font-size: 1.1rem; letter-spacing: 0.05em; transition: all 0.3s; cursor: pointer; border-radius: 0.5rem;"
                    onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(201,149,26,0.3)';"
                    onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.borderColor='var(--primary-green)'; this.style.color='white'; this.style.transform='translateY(0)'; this.style.boxShadow='';">
              <i class="fas fa-calendar-check me-2"></i> Request Booking
            </button>
            
            <p style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7; margin-top: 1rem; text-align: center;">
              <i class="fas fa-info-circle" style="margin-right: 0.25rem;"></i> No payment required now. We'll send payment details after confirmation.
            </p>
            
            <div id="booking-feedback" class="mt-3 text-center" style="color: var(--neutral-gray); font-family: var(--font-body); display: none;"></div>
          </form>
          
          <!-- Trust Indicators -->
          <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e0e0e0; text-align: center;">
            <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.85rem; margin-bottom: 1rem; opacity: 0.7;">
              <i class="fas fa-lock me-1" style="color: var(--primary-green);"></i> Your information is secure and will never be shared
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Contact Form -->
  <section id="contact-form" class="container-fluid p-5 reveal" style="background: var(--neutral-light);">
    <div class="row justify-content-center align-items-stretch g-4">
      
      <!-- Image Column -->
      <div class="col-lg-5 mb-4 mb-lg-0 contact-image d-flex">
        <img src="{{ asset('images/gallery/falls/fall_16.jpeg') }}" alt="Sipi Falls waterfall view" class="img-fluid w-100 d-block" style="object-fit: cover; border-radius: 0.375rem; min-height: 500px;" loading="lazy">
      </div>

      <!-- Form Column -->
      <div class="col-lg-7 d-flex">
        <div class="card shadow rounded-4 p-4 w-100" style="border: none; border-top: 4px solid var(--accent-gold); border-radius: 0.375rem; background: #ffffff;">
          <h2 class="mb-3 text-center" style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 2rem;">
            Let's Get In Touch
          </h2>
          <p class="text-center mb-3" style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 1rem;">
            Questions? Comments? We're here to help you plan the perfect Sipi adventure.
          </p>

          <!-- Success/Error Messages -->
          @if(session('status') === 'success' && session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fas fa-check-circle me-2"></i>
              {{ session('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="fas fa-exclamation-circle me-2"></i>
              <strong>Please fix the following errors:</strong>
              <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST" role="form" aria-label="Contact form for Sipi Falls inquiries">
            @csrf
            <div class="mb-3 row g-2">
              <!-- First Name -->
              <div class="col-12 col-md-6">
                <label for="name" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">First Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-white" style="border-color: var(--primary-green);" aria-hidden="true">
                    <i class="fas fa-user"></i>
                  </span>
                  <input type="text" class="form-control" id="name" name="firstname" required placeholder="Enter your first name" style="font-family: var(--font-body); color: var(--neutral-gray);"
                         onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                         onblur="this.style.borderColor=''; this.style.boxShadow='';">
                </div>
              </div>

              <!-- Last Name -->
              <div class="col-12 col-md-6">
                <label for="last-name" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Last Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-white" style="border-color: var(--primary-green);" aria-hidden="true">
                    <i class="fas fa-user"></i>
                  </span>
                  <input type="text" class="form-control" id="last-name" name="lastname" required placeholder="Enter your last name" style="font-family: var(--font-body); color: var(--neutral-gray);"
                         onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                         onblur="this.style.borderColor=''; this.style.boxShadow='';">
                </div>
              </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email" style="font-family: var(--font-body); color: var(--neutral-gray);"
                     onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                     onblur="this.style.borderColor=''; this.style.boxShadow='';">
            </div>

            <!-- Subject -->
            <div class="mb-3">
              <label for="subject" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" required placeholder="Enter the subject" style="font-family: var(--font-body); color: var(--neutral-gray);"
                     onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                     onblur="this.style.borderColor=''; this.style.boxShadow='';">
            </div>

            <!-- Message -->
            <div class="mb-3">
              <label for="message" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Your Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Type your message" style="font-family: var(--font-body); color: var(--neutral-gray);"
                        onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                        onblur="this.style.borderColor=''; this.style.boxShadow='';">
  </textarea>
            </div>

            <!-- Feedback -->
            <div id="form-feedback" class="mb-3 text-center d-none" style="color: var(--neutral-gray); font-family: var(--font-body);"></div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-lg shadow-sm w-100" 
                    style="background-color: var(--primary-green); color: white; border: 2px solid var(--primary-green); padding: 0.85rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; width: 100%; transition: all 0.3s; cursor: pointer; border-radius: 0.25rem;"
                    onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-dark)';"
                    onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.borderColor='var(--primary-green)'; this.style.color='white';">
              <i class="fas fa-paper-plane me-2" style="color: inherit;"></i> Submit Inquiry
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!-- Where to Stay Section -->
  <section class="reveal" style="background: var(--neutral-light); padding: 5rem 0;">
    <div class="container">

      <!-- Header -->
      <p class="text-center" style="font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-gold); margin-bottom: 0.75rem;">Plan Your Stay</p>
      <h2 class="text-center" style="font-family: var(--font-display); color: var(--primary-green); font-size: 2.75rem; margin-bottom: 0.5rem;">Where to Stay</h2>
      <p class="text-center" style="font-family: var(--font-body); color: var(--neutral-gray); font-size: 1rem; margin-bottom: 3rem; opacity: 0.8;">Comfortable accommodation options near Sipi Falls for every budget</p>

      <div class="row g-4">

        @forelse($accommodations as $accommodation)
        @php
          $isGold = in_array($accommodation->type, ['Lodge', 'Campsite']);
          $badgeBg = $isGold ? 'rgba(201,149,26,0.1)' : 'rgba(26,107,26,0.1)';
          $badgeColor = $isGold ? 'var(--accent-gold)' : 'var(--primary-green)';

          $hotelImages = [
            'Sipi Valley Resort' => 'images/gallery/hotels/sipi_valley_resort.jpg',
            'Rafiki Lodge'        => 'images/gallery/hotels/rafiki_lodge.jpg',
            'Noahs Ark Hotel'     => 'images/gallery/hotels/noahs_ark_hotel.jpg',
            'Moses Campsite'      => 'images/gallery/hotels/moses campsite.jpg',
          ];
          $hotelWebsites = [
            'Sipi Valley Resort' => 'https://bystays.com/properties/sipi-valley-resort/',
            'Rafiki Lodge'        => 'https://rafikilodgesipi.com/',
            'Noahs Ark Hotel'     => 'https://www.vacationcottage.com/property/noah-s-ark-hotel-kapchorwa/BC-13342897',
            'Moses Campsite'      => 'https://mosescampsitesipifalls.com/',
          ];
          $hotelWhatsapp = [
            'Sipi Valley Resort' => "Hi, I'd like to know more about Sipi Valley Resort and availability",
            'Rafiki Lodge'        => "Hi, I'd like to know more about Rafiki Lodge and availability",
            'Noahs Ark Hotel'     => "Hi, I'd like to know more about Noahs Ark Hotel and availability",
            'Moses Campsite'      => "Hi, I'd like to know more about Moses Campsite and availability",
          ];

          $cardImage   = $hotelImages[$accommodation->name]   ?? $accommodation->image;
          $websiteUrl  = $hotelWebsites[$accommodation->name] ?? '#';
          $waMessage   = $hotelWhatsapp[$accommodation->name] ?? $accommodation->whatsapp_message;
        @endphp
        <div class="col-md-6 col-lg-3 d-flex">
          <div style="background: white; border-radius: 0.5rem; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); height: 100%; width: 100%; display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease; min-height: 360px;"
               onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 32px rgba(0,0,0,0.12)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)';">
            <div style="height: 145px; overflow: hidden; flex-shrink: 0;">
              <img src="{{ asset($cardImage) }}" alt="{{ $accommodation->name }}" loading="lazy"
                   style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"
                   onmouseover="this.style.transform='scale(1.05)';"
                   onmouseout="this.style.transform='scale(1)';">
            </div>
            <div style="padding: 1rem 1rem 0.9rem; display: flex; flex-direction: column; flex: 1;">
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.45rem; gap: 0.5rem;">
                <h5 style="font-family: var(--font-display); color: var(--primary-green); font-size: 1rem; margin: 0; line-height: 1.2;">{{ $accommodation->name }}</h5>
                <span style="font-family: var(--font-body); font-size: 0.62rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; background: {{ $badgeBg }}; color: {{ $badgeColor }}; padding: 0.2rem 0.5rem; border-radius: 1rem; white-space: nowrap;">{{ $accommodation->type }}</span>
              </div>
              <p style="font-family: var(--font-body); font-size: 0.8rem; color: var(--neutral-gray); line-height: 1.5; margin-bottom: 0.7rem; opacity: 0.8; flex: 1; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">{{ $accommodation->description }}</p>
              <div style="display: flex; align-items: center; gap: 0.4rem; margin-bottom: 0.7rem; min-height: 18px;">
                <i class="fas fa-map-marker-alt" style="color: var(--accent-gold); font-size: 0.75rem;"></i>
                <span style="font-family: var(--font-body); font-size: 0.75rem; color: var(--neutral-gray); opacity: 0.7;">{{ $accommodation->location }}</span>
              </div>
              <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; margin-top: auto;">
                <a href="{{ $websiteUrl }}" target="_blank" rel="noopener noreferrer"
                   style="display: inline-flex; align-items: center; gap: 0.35rem; font-family: var(--font-body); font-size: 0.8rem; font-weight: 600; color: var(--primary-green); text-decoration: none; transition: color 0.2s ease;"
                   onmouseover="this.style.color='var(--accent-gold)';"
                   onmouseout="this.style.color='var(--primary-green)';">
                  <span>View website</span>
                  <i class="fas fa-arrow-right" style="font-size: 0.72rem;"></i>
                </a>

                <a href="https://wa.me/256703558174?text={{ urlencode($waMessage) }}" target="_blank" rel="noopener noreferrer"
                   aria-label="WhatsApp {{ $accommodation->name }}"
                   style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: rgba(37, 211, 102, 0.12); color: #25D366; text-decoration: none; transition: all 0.2s ease; flex-shrink: 0;"
                   onmouseover="this.style.background='rgba(37, 211, 102, 0.2)'; this.style.transform='translateY(-1px)';"
                   onmouseout="this.style.background='rgba(37, 211, 102, 0.12)'; this.style.transform='translateY(0)';">
                  <i class="fab fa-whatsapp" style="font-size: 1rem;"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-12 text-center">
          <p style="color: var(--neutral-gray); font-size: 1.1rem; font-family: var(--font-body);">No accommodations listed yet.</p>
        </div>
        @endforelse

      </div>

      <!-- Bottom note -->
      <p class="text-center mt-4" style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.6;">
        <i class="fas fa-info-circle" style="color: var(--accent-gold); margin-right: 0.5rem;"></i>
        Prices and availability vary by season. Contact us for current rates and booking assistance.
      </p>

    </div>
  </section>


  <!-- FAQs Section with Accordion -->
  <section class="container-fluid py-5 reveal" style="background: var(--neutral-light);">
    <div class="container">
    <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: var(--font-display); font-size: 2.5rem;">
      Frequently Asked Questions
    </h2>

    <div class="accordion accordion-flush" id="faqAccordion">
      <!-- Question 1 -->
      <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
        <h2 class="accordion-header" id="faqHeadingOne">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne" 
                  style="color: var(--primary-green); background: #ffffff; font-family: var(--font-body);">
            <i class="fas fa-calendar-alt me-2" style="color: var(--accent-gold);"></i> What's the best time to visit Sipi Falls?
          </button>
        </h2>
        <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted" style="font-family: var(--font-body);">
            The best times are during the dry seasons—June to August and December to February—for clear views and safe trails.
          </div>
        </div>
      </div>

      <!-- Question 2 -->
      <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
        <h2 class="accordion-header" id="faqHeadingTwo">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo" 
                  style="color: var(--primary-green); background: #ffffff; font-family: var(--font-body);">
            <i class="fas fa-user-tie me-2" style="color: var(--accent-gold);"></i> Are guides included in the booking?
          </button>
        </h2>
        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted" style="font-family: var(--font-body);">
            Yes! All activities include professional Sabiny guides to ensure your safety and unforgettable experience.
          </div>
        </div>
      </div>

      <!-- Question 3 -->
      <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
        <h2 class="accordion-header" id="faqHeadingThree">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree" 
                  style="color: var(--primary-green); background: #ffffff; font-family: var(--font-body);">
            <i class="fas fa-hiking me-2" style="color: var(--accent-gold);"></i> What should I pack for the activities?
          </button>
        </h2>
        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted" style="font-family: var(--font-body);">
            Pack comfy hiking shoes, a rain jacket, sunscreen, bug repellent, a reusable water bottle, and a camera for magical moments!
          </div>
        </div>
      </div>

      <!-- Question 4 -->
      <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
        <h2 class="accordion-header" id="faqHeadingFour">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour" 
                  style="color: var(--primary-green); background: #ffffff; font-family: var(--font-body);">
            <i class="fas fa-times-circle me-2" style="color: var(--accent-gold);"></i> How do I cancel a booking?
          </button>
        </h2>
        <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted" style="font-family: var(--font-body);">
            You can cancel free of charge up to 48 hours before your trip—just contact us via email or phone.
          </div>
        </div>
      </div>

      <!-- Question 5 -->
      <div class="accordion-item border-0 mb-3 rounded-4 shadow-sm">
        <h2 class="accordion-header" id="faqHeadingFive">
          <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive" 
                  style="color: var(--primary-green); background: #ffffff; font-family: var(--font-body);">
            <i class="fas fa-child me-2" style="color: var(--accent-gold);"></i> Is there an age limit for activities?
          </button>
        </h2>
        <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted" style="font-family: var(--font-body);">
            Most Sipi adventures are perfect for ages 12 and up, but reach out if you're unsure about any activity!
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <style>
      @media (max-width: 768px) {
          #booking-form button[type="submit"],
          #contact-form button[type="submit"] {
              padding: 0.7rem 0.9rem !important;
              font-size: 0.82rem !important;
              letter-spacing: 0.06em !important;
              border-radius: 0.4rem !important;
          }
      }
  </style>

  @endsection
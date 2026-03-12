@extends('layouts.app')

@section('title', 'Contact Us - Sipi Falls')

@section('content')

  <!-- CONTACT HERO SECTION -->
  <section class="welcome-section container-fluid reveal" style="background-image: url('{{ asset('images/f15.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; color: #fff;">
    <div class="container py-5 px-3 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="p-3 p-md-5">
        <div class="glass-card text-center p-5" role="region" aria-label="Welcome message for Sipi Falls contact">
          <h2 class="display-5 fw-bold mb-4 text-light" style="font-family: var(--font-display);">
            Ready for Sipi? Let's Begin the <span style="color: var(--accent-gold);">Journey!</span>
          </h2>
          <p class="lead mb-4 text-light" style="font-family: var(--font-body);">
            Thrilled to explore Sipi Falls? Our Sabiny team is ready to plan your adventure. Contact us or book now!
          </p>
          <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="#contact-form"
              style="background-color: transparent; color: white; border: 2px solid white; padding: 0.75rem 2rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; text-decoration: none; transition: all 0.3s; border-radius: 0.25rem;"
              onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-gray)';"
              onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white'; this.style.color='white';">
              Contact Us
            </a>
            <a href="#booking-form"
              style="background-color: transparent; color: white; border: 2px solid white; padding: 0.75rem 2rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; text-decoration: none; transition: all 0.3s; border-radius: 0.25rem;"
              onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)'; this.style.color='var(--neutral-gray)';"
              onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white'; this.style.color='white';">
              Book Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Contact Form -->
  <section id="contact-form" class="container-fluid p-5 reveal" style="background: var(--neutral-light); border-radius: 1.5rem;">
    <div class="row justify-content-center align-items-stretch g-4">
      
      <!-- Image Column -->
      <div class="col-lg-5 mb-4 mb-lg-0 contact-image d-flex">
        <img src="{{ asset('images/group.jpg') }}" alt="Group of Sabiny guides at Sipi Falls" class="img-fluid w-100 d-block" style="object-fit: cover; border-radius: 0.375rem;" loading="lazy">
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
                    style="background-color: var(--primary-green); color: white; border: none; padding: 0.85rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.1em; width: 100%; transition: all 0.3s; cursor: pointer; border-radius: 0.25rem;"
                    onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.color='var(--neutral-gray)';"
                    onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.color='white';">
              <i class="fas fa-paper-plane me-2" style="color: white;"></i> Submit Inquiry
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!-- Pricing Section -->
  <section class="container py-5 reveal" style="background: var(--neutral-light); border-radius: 1.5rem;">
    <div style="text-align: center; margin-bottom: 3rem;">
      <h2 style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 2.5rem; margin-bottom: 0.75rem;">
        Adventure Pricing
      </h2>
      <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 1.1rem; opacity: 0.8;">
        Transparent pricing for unforgettable experiences
      </p>
    </div>

    <div class="row g-4 mb-4">
      <!-- Hiking -->
      <div class="col-md-6 col-lg-3">
        <div style="background: white; padding: 2rem 1.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--primary-green);">
          <div style="text-align: center; margin-bottom: 1.5rem;">
            <i class="fas fa-hiking" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h5 style="font-family: var(--font-body); font-weight: 700; color: var(--neutral-gray); margin-bottom: 0.5rem;">Hiking</h5>
            <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--primary-green);">$30-50</div>
            <div style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7;">per person</div>
          </div>
          <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray);">
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> 3 Waterfalls tour</li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Expert guide included</li>
            <li style="padding: 0.5rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> 3-4 hours duration</li>
          </ul>
        </div>
      </div>

      <!-- Abseiling -->
      <div class="col-md-6 col-lg-3">
        <div style="background: white; padding: 2rem 1.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--accent-gold);">
          <div style="text-align: center; margin-bottom: 1.5rem;">
            <i class="fas fa-mountain" style="font-size: 2.5rem; color: var(--accent-gold); margin-bottom: 1rem;"></i>
            <h5 style="font-family: var(--font-body); font-weight: 700; color: var(--neutral-gray); margin-bottom: 0.5rem;">Abseiling</h5>
            <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--accent-gold);">$60-80</div>
            <div style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7;">per person</div>
          </div>
          <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray);">
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i> Safety equipment</li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i> Professional instructor</li>
            <li style="padding: 0.5rem 0;"><i class="fas fa-check" style="color: var(--accent-gold); margin-right: 0.5rem;"></i> 2-3 hours experience</li>
          </ul>
        </div>
      </div>

      <!-- Coffee Tour -->
      <div class="col-md-6 col-lg-3">
        <div style="background: white; padding: 2rem 1.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--primary-green);">
          <div style="text-align: center; margin-bottom: 1.5rem;">
            <i class="fas fa-coffee" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h5 style="font-family: var(--font-body); font-weight: 700; color: var(--neutral-gray); margin-bottom: 0.5rem;">Coffee Tour</h5>
            <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--primary-green);">$25-40</div>
            <div style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7;">per person</div>
          </div>
          <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray);">
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Farm-to-cup experience</li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Coffee tasting included</li>
            <li style="padding: 0.5rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> 2 hours tour</li>
          </ul>
        </div>
      </div>

      <!-- Nature Walks -->
      <div class="col-md-6 col-lg-3">
        <div style="background: white; padding: 2rem 1.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); height: 100%; border-top: 4px solid var(--primary-green);">
          <div style="text-align: center; margin-bottom: 1.5rem;">
            <i class="fas fa-leaf" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h5 style="font-family: var(--font-body); font-weight: 700; color: var(--neutral-gray); margin-bottom: 0.5rem;">Nature Walks</h5>
            <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--primary-green);">$20-35</div>
            <div style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7;">per person</div>
          </div>
          <ul style="list-style: none; padding: 0; margin: 0; font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray);">
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Bird watching</li>
            <li style="padding: 0.5rem 0; border-bottom: 1px solid #f0f0f0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> Local flora & fauna</li>
            <li style="padding: 0.5rem 0;"><i class="fas fa-check" style="color: var(--primary-green); margin-right: 0.5rem;"></i> 1-2 hours walk</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Payment Options -->
    <div style="background: white; padding: 2.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-top: 2rem;">
      <h4 style="font-family: var(--font-body); font-weight: 700; color: var(--primary-green); text-align: center; margin-bottom: 2rem; font-size: 1.5rem;">
        <i class="fas fa-credit-card" style="margin-right: 0.5rem;"></i> Flexible Payment Options
      </h4>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div style="text-align: center; padding: 1.5rem;">
            <i class="fas fa-money-bill-wave" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h6 style="font-family: var(--font-body); font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem;">Cash on Arrival</h6>
            <p style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); opacity: 0.7; margin: 0;">Pay when you arrive at Sipi Falls</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div style="text-align: center; padding: 1.5rem;">
            <i class="fas fa-mobile-alt" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h6 style="font-family: var(--font-body); font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem;">Mobile Money</h6>
            <p style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); opacity: 0.7; margin: 0;">MTN & Airtel Money accepted</p>
          </div>
        </div>
        
        <div class="col-md-4">
          <div style="text-align: center; padding: 1.5rem;">
            <i class="fas fa-university" style="font-size: 2.5rem; color: var(--primary-green); margin-bottom: 1rem;"></i>
            <h6 style="font-family: var(--font-body); font-weight: 600; color: var(--neutral-gray); margin-bottom: 0.5rem;">Bank Transfer</h6>
            <p style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); opacity: 0.7; margin: 0;">Details sent after confirmation</p>
          </div>
        </div>
      </div>

      <!-- Trust Badges -->
      <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #f0f0f0;">
        <div class="row g-3">
          <div class="col-md-4">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem;">
              <i class="fas fa-shield-alt" style="color: var(--primary-green); font-size: 1.5rem;"></i>
              <span style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); font-weight: 600;">Secure Booking</span>
            </div>
          </div>
          <div class="col-md-4">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem;">
              <i class="fas fa-hand-holding-usd" style="color: var(--primary-green); font-size: 1.5rem;"></i>
              <span style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); font-weight: 600;">Pay on Arrival Available</span>
            </div>
          </div>
          <div class="col-md-4">
            <div style="display: flex; align-items: center; justify-content: center; gap: 0.75rem;">
              <i class="fas fa-clock" style="color: var(--primary-green); font-size: 1.5rem;"></i>
              <span style="font-family: var(--font-body); font-size: 0.9rem; color: var(--neutral-gray); font-weight: 600;">24hr Price Confirmation</span>
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
      <div class="col-lg-6 d-none d-lg-block" style="position: relative; background-image: url('{{ asset('images/f5.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 600px;">
        
        <!-- Content on Image -->
        <div style="position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; padding: 2rem 2rem 0 2rem; text-align: center; color: white;">
          <div style="max-width: 500px; background: rgba(0, 0, 0, 0.65); padding: 2rem 1.5rem; border-radius: 1rem; backdrop-filter: blur(10px); margin-top: 1rem;">
            <i class="fas fa-mountain" style="font-size: 3.5rem; color: var(--accent-gold); margin-bottom: 1.5rem;"></i>
            <h2 style="font-family: var(--font-display); font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
              Your Adventure <span style="color: var(--accent-gold);">Awaits</span>
            </h2>
            <p style="font-family: var(--font-body); font-size: 1rem; line-height: 1.7; opacity: 0.95; margin-bottom: 1.5rem;">
              Experience the breathtaking beauty of Sipi Falls. From hiking majestic waterfalls to abseiling down cliffs, your unforgettable journey starts here.
            </p>
            
            <!-- Feature List -->
            <div style="text-align: left; margin-top: 2rem;">
              <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                <div style="width: 45px; height: 45px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 1.1rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 1rem; font-family: var(--font-body);">Expert Local Guides</div>
                  <div style="font-size: 0.85rem; opacity: 0.85; font-family: var(--font-body);">Professional Sabiny guides for your safety</div>
                </div>
              </div>
              
              <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                <div style="width: 45px; height: 45px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 1.1rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 1rem; font-family: var(--font-body);">Flexible Scheduling</div>
                  <div style="font-size: 0.85rem; opacity: 0.85; font-family: var(--font-body);">Choose your preferred date and activities</div>
                </div>
              </div>
              
              <div style="display: flex; align-items: center; gap: 1rem;">
                <div style="width: 45px; height: 45px; border-radius: 50%; background: rgba(201, 149, 26, 0.2); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                  <i class="fas fa-check" style="color: var(--accent-gold); font-size: 1.1rem;"></i>
                </div>
                <div>
                  <div style="font-weight: 600; font-size: 1rem; font-family: var(--font-body);">24/7 Support</div>
                  <div style="font-size: 0.85rem; opacity: 0.85; font-family: var(--font-body);">We're here to help before, during, and after</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Side - Booking Form -->
      <div class="col-lg-6" style="background: #ffffff; display: flex; align-items: center; justify-content: center; padding: 2.5rem 2rem; min-height: 600px;">
        <div style="width: 100%; max-width: 550px;">
          
          <!-- Form Header -->
          <div style="text-align: center; margin-bottom: 2rem;">
            <h2 style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 2.25rem; margin-bottom: 0.5rem;">
              Book Your Adventure
            </h2>
            <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.95rem; opacity: 0.8;">
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

              <div class="col-md-6">
                <label for="activities" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body); font-weight: 600; font-size: 0.9rem;">Activity *</label>
                <select id="activities" name="preferred_activities" class="form-select" required 
                        style="font-family: var(--font-body); color: var(--neutral-gray); padding: 0.75rem 1rem; border: 2px solid #e0e0e0; border-radius: 0.5rem;"
                        onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 3px rgba(26,107,26,0.1)';"
                        onblur="this.style.borderColor='#e0e0e0'; this.style.boxShadow='none';">
                  <option value="" disabled selected>Select activity</option>
                  <option value="hiking">Hiking the Waterfalls</option>
                  <option value="abseiling">Abseiling</option>
                  <option value="coffee-tour">Coffee Tour</option>
                  <option value="nature-walks">Nature Walks</option>
                  <option value="bird-watching">Bird Watching</option>
                  <option value="rock-climbing">Rock Climbing</option>
                  <option value="cultural">Cultural Experiences</option>
                </select>
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
                    style="background-color: var(--primary-green); color: white; border: none; padding: 1rem; font-family: var(--font-body); font-weight: 600; font-size: 1.1rem; letter-spacing: 0.05em; transition: all 0.3s; cursor: pointer; border-radius: 0.5rem;"
                    onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(201,149,26,0.3)';"
                    onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.transform='translateY(0)'; this.style.boxShadow='';">
              <i class="fas fa-calendar-check me-2"></i> Request Booking
            </button>
            
            <p style="font-family: var(--font-body); font-size: 0.85rem; color: var(--neutral-gray); opacity: 0.7; margin-top: 1rem; text-align: center;">
              <i class="fas fa-info-circle" style="margin-right: 0.25rem;"></i> No payment required now. We'll send payment details after confirmation.
            </p>
            
            <div id="booking-feedback" class="mt-3 text-center" style="color: var(--neutral-gray); font-family: var(--font-body); display: none;"></div>
          </form>
          
          <!-- Trust Indicators -->
          <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e0e0e0; text-align: center;">
            <p style="color: var(--neutral-gray); font-family: var(--font-body); font-size: 0.85rem; margin-bottom: 1rem; opacity: 0.7;">
              <i class="fas fa-lock me-1" style="color: var(--primary-green);"></i> Your information is secure and will never be shared
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


<!-- FAQs Section with Accordion -->
  <section class="container py-5 reveal">
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
  </section>


  @endsection

@push('scripts')
<script>
  // Auto-hide success messages after 5 seconds
  document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert-success');
    
    alerts.forEach(function(alert) {
      // Scroll to the alert so user can see it
      alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
      
      // Auto-hide after 5 seconds
      setTimeout(function() {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }, 5000);
    });
    
    // Real-time Form Validation
    const contactForm = document.querySelector('#contact-form form');
    const bookingForm = document.querySelector('#booking-form form');
    
    // Validation functions
    function validateEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
    
    function validateRequired(value) {
      return value.trim().length > 0;
    }
    
    function showSuccess(input) {
      const parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
      parent.classList.remove('has-error');
      parent.classList.add('has-success');
      
      // Remove existing feedback
      const existingFeedback = parent.querySelector('.validation-feedback');
      if (existingFeedback) existingFeedback.remove();
      
      // Add success icon
      const feedback = document.createElement('div');
      feedback.className = 'validation-feedback';
      feedback.innerHTML = '<i class="fas fa-check-circle" style="color: var(--success); position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); font-size: 1.2rem;"></i>';
      
      const inputGroup = input.closest('.input-group');
      if (inputGroup) {
        inputGroup.style.position = 'relative';
        inputGroup.appendChild(feedback);
      } else {
        input.style.position = 'relative';
        input.parentElement.style.position = 'relative';
        input.parentElement.appendChild(feedback);
      }
    }
    
    function showError(input, message) {
      const parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
      parent.classList.remove('has-success');
      parent.classList.add('has-error');
      
      // Remove existing feedback
      const existingFeedback = parent.querySelector('.validation-feedback');
      if (existingFeedback) existingFeedback.remove();
      
      // Add error message
      const feedback = document.createElement('div');
      feedback.className = 'validation-feedback';
      feedback.innerHTML = `<small style="color: var(--error); font-family: var(--font-body); display: block; margin-top: 0.25rem;"><i class="fas fa-exclamation-circle"></i> ${message}</small>`;
      parent.appendChild(feedback);
    }
    
    function clearValidation(input) {
      const parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
      parent.classList.remove('has-success', 'has-error');
      const existingFeedback = parent.querySelector('.validation-feedback');
      if (existingFeedback) existingFeedback.remove();
    }
    
    // Contact Form Validation
    if (contactForm) {
      const inputs = contactForm.querySelectorAll('input[required], textarea[required]');
      
      inputs.forEach(input => {
        input.addEventListener('blur', function() {
          if (this.type === 'email') {
            if (!validateRequired(this.value)) {
              showError(this, 'Email is required');
            } else if (!validateEmail(this.value)) {
              showError(this, 'Please enter a valid email');
            } else {
              showSuccess(this);
            }
          } else {
            if (!validateRequired(this.value)) {
              showError(this, `${this.previousElementSibling?.textContent || 'This field'} is required`);
            } else {
              showSuccess(this);
            }
          }
        });
        
        input.addEventListener('input', function() {
          if (this.classList.contains('has-error') || this.closest('.has-error')) {
            clearValidation(this);
          }
        });
      });
    }
    
    // Booking Form Validation
    if (bookingForm) {
      const inputs = bookingForm.querySelectorAll('input[required], select[required]');
      
      inputs.forEach(input => {
        input.addEventListener('blur', function() {
          if (this.type === 'email') {
            if (!validateRequired(this.value)) {
              showError(this, 'Email is required');
            } else if (!validateEmail(this.value)) {
              showError(this, 'Please enter a valid email');
            } else {
              showSuccess(this);
            }
          } else if (this.type === 'date') {
            if (!validateRequired(this.value)) {
              showError(this, 'Please select a date');
            } else {
              const selectedDate = new Date(this.value);
              const today = new Date();
              today.setHours(0, 0, 0, 0);
              
              if (selectedDate < today) {
                showError(this, 'Please select a future date');
              } else {
                showSuccess(this);
              }
            }
          } else if (this.type === 'number') {
            if (!validateRequired(this.value)) {
              showError(this, 'This field is required');
            } else if (parseInt(this.value) < parseInt(this.min)) {
              showError(this, `Minimum value is ${this.min}`);
            } else {
              showSuccess(this);
            }
          } else if (this.tagName === 'SELECT') {
            if (!validateRequired(this.value)) {
              showError(this, 'Please select an option');
            } else {
              showSuccess(this);
            }
          } else {
            if (!validateRequired(this.value)) {
              showError(this, `${this.previousElementSibling?.textContent || 'This field'} is required`);
            } else {
              showSuccess(this);
            }
          }
        });
        
        input.addEventListener('input', function() {
          if (this.classList.contains('has-error') || this.closest('.has-error')) {
            clearValidation(this);
          }
        });
      });
    }
  });
  
  // Dynamic Price Calculator
  const activitySelect = document.getElementById('activities');
  const adultsInput = document.getElementById('adults');
  const childrenInput = document.getElementById('children');
  const priceEstimateDiv = document.getElementById('price-estimate');
  const priceRangeSpan = document.getElementById('price-range');
  
  // Price ranges for each activity (per person)
  const activityPrices = {
    'hiking': { min: 30, max: 50 },
    'abseiling': { min: 60, max: 80 },
    'coffee-tour': { min: 25, max: 40 },
    'nature-walks': { min: 20, max: 35 },
    'bird-watching': { min: 20, max: 35 },
    'rock-climbing': { min: 50, max: 70 },
    'cultural': { min: 25, max: 40 }
  };
  
  function calculatePrice() {
    const activity = activitySelect.value;
    const adults = parseInt(adultsInput.value) || 0;
    const children = parseInt(childrenInput.value) || 0;
    
    if (activity && adults > 0) {
      const prices = activityPrices[activity];
      const totalPeople = adults + children;
      
      // Calculate price range
      const minTotal = prices.min * totalPeople;
      const maxTotal = prices.max * totalPeople;
      
      // Display the estimate
      priceRangeSpan.textContent = `$${minTotal}-${maxTotal}`;
      priceEstimateDiv.style.display = 'block';
      
      // Animate the price display
      priceEstimateDiv.style.animation = 'fadeIn 0.3s ease-in';
    } else {
      priceEstimateDiv.style.display = 'none';
    }
  }
  
  // Add event listeners
  if (activitySelect) activitySelect.addEventListener('change', calculatePrice);
  if (adultsInput) adultsInput.addEventListener('input', calculatePrice);
  if (childrenInput) childrenInput.addEventListener('input', calculatePrice);
</script>
@endpush

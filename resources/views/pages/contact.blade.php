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


  <!-- Booking Form -->
  <section id="booking-form" class="container-fluid py-5 reveal" style="background: var(--neutral-light);">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow rounded-2 p-5" style="border: none; border-top: 4px solid var(--accent-gold); background: #ffffff;">
          <h2 class="mb-4 text-center" style="color: var(--primary-green); font-family: var(--font-display); font-weight: 700; font-size: 2.5rem;">Book Your Adventure</h2>
          
          <!-- Success/Error Messages for Booking -->
          @if(session('status') === 'success' && session('form') === 'booking' && session('msg'))
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

          <form action="{{ route('booking.submit') }}" method="POST" role="form" aria-label="Booking form for Sipi Falls adventure">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label for="full-name" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Full Name</label>
                <input type="text" class="form-control" id="full-name" name="fullname" required placeholder="Enter your full name" style="font-family: var(--font-body); color: var(--neutral-gray);"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                       onblur="this.style.borderColor=''; this.style.boxShadow='';">
              </div>

              <div class="col-md-6">
                <label for="email-booking" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Email Address</label>
                <input type="email" class="form-control" id="email-booking" name="email-booking" required placeholder="Enter your email address" style="font-family: var(--font-body); color: var(--neutral-gray);"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                       onblur="this.style.borderColor=''; this.style.boxShadow='';">
              </div>

              <div class="col-md-6">
                <label for="travel-date" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Preferred Travel Date</label>
                <input type="date" class="form-control" id="travel-date" name="travel-date" required style="font-family: var(--font-body); color: var(--neutral-gray);"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                       onblur="this.style.borderColor=''; this.style.boxShadow='';">
              </div>

              <div class="col-md-6">
                <label for="activities" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Preferred Activities</label>
                <select id="activities" name="preferred_activities" class="form-select" required style="font-family: var(--font-body); color: var(--neutral-gray);"
                        onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                        onblur="this.style.borderColor=''; this.style.boxShadow='';">
                  <option value="" disabled selected>Select an activity</option>
                  <option value="hiking">Hiking the Waterfalls</option>
                  <option value="abseiling">Abseiling</option>
                  <option value="coffee-tour">Coffee Tour</option>
                  <option value="nature-walks">Nature Walks</option>
                  <option value="bird-watching">Bird Watching</option>
                  <option value="rock-climbing">Rock Climbing</option>
                  <option value="cultural">Cultural Experiences</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="adults" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Number of Adults</label>
                <input type="number" class="form-control" id="adults" name="num_adults" min="1" required placeholder="Enter number of adults" style="font-family: var(--font-body); color: var(--neutral-gray);"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                       onblur="this.style.borderColor=''; this.style.boxShadow='';">
              </div>

              <div class="col-md-6">
                <label for="children" class="form-label" style="color: var(--neutral-gray); font-family: var(--font-body);">Number of Children</label>
                <input type="number" class="form-control" id="children" name="num_children" min="0" placeholder="Enter number of children" style="font-family: var(--font-body); color: var(--neutral-gray);"
                       onfocus="this.style.borderColor='var(--primary-green)'; this.style.boxShadow='0 0 0 2px rgba(34,139,34,0.15)';"
                       onblur="this.style.borderColor=''; this.style.boxShadow='';">
              </div>

              <div class="col-12">
                <div class="row align-items-center">
                  <div class="col-md-8 col-12">
                    <div class="form-check mb-0">
                      <input class="form-check-input" type="checkbox" id="agree" name="agree" aria-label="Agree to receive booking updates and newsletters">
                      <label class="form-check-label" for="agree" style="color: var(--neutral-gray); font-family: var(--font-body);">I agree to receive booking updates and newsletters</label>
                    </div>
                  </div>
                  <div class="col-md-4 col-12 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                    <button type="submit" class="btn btn-lg shadow-sm booking-submit" 
                            style="background-color: var(--primary-green); color: white; border: none; padding: 0.75rem 1.5rem; font-family: var(--font-body); font-weight: 600; letter-spacing: 0.05em; transition: all 0.3s; cursor: pointer; border-radius: 0.25rem;"
                            onmouseover="this.style.backgroundColor='var(--accent-gold)'; this.style.color='var(--neutral-gray)';"
                            onmouseout="this.style.backgroundColor='var(--primary-green)'; this.style.color='white';">
                      Plan My Adventure <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div id="booking-feedback" class="mb-3 text-center" style="color: var(--neutral-gray); font-family: var(--font-body); display: none;"></div>
              </div>
            </div>
          </form>
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
  });
</script>
@endpush

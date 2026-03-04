@extends('layouts.app')

@section('title', 'Travel Guide - Sipi Falls')

@section('content')

  <!-- Hero Section -->
  <section class="reveal text-center text-light d-flex align-items-center justify-content-center" 
           style="background-image: url('{{ asset('images/water.jpg') }}'); height: 80vh; background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%;">
    <div class="p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(111,207,151,0.3)); backdrop-filter: blur(5px);">
      <h1 class="display-4 fw-bold" style="color: #ffffff; font-family: 'Montserrat', sans-serif;">Your Travel Guide to Sipi Falls</h1>
      <p class="lead" style="color: #ffffff; font-family: 'Montserrat', sans-serif;">Everything you need to know before you explore Uganda's most breathtaking natural wonder.</p>
      <a href="#travel-tips" class="btn btn-lg mt-3" role="button" aria-label="Explore the Sipi Falls travel guide"
         style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer; transition: all 0.3s ease; font-family: 'Montserrat', sans-serif;"
         onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
         onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
        Explore the Guide
      </a>
    </div>
  </section>

  <!-- Quick Facts Section -->
  <section class="py-3 reveal" style="background: linear-gradient(135deg, #e6f9ec 0%, #d1e7dd 100%);">
    <section class="quick-facts container my-5">
      <section id="travel-tips" class="quick-facts container py-4 reveal" style="background: linear-gradient(135deg, #ffffff 0%, #d1e7dd 100%);">
        <h2 class="text-center mb-2" style="color: #228B22; font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">Essential Tips for Your Trip</h2>
        <p class="text-center mb-4" style="font-size: 1.2rem; color: #333333;">Get the most out of your Sipi Falls adventure with these quick, practical tips!</p>
        
        <div class="row text-center gy-4">
         <!-- When to Visit -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Best weather, fewer crowds, the rainbow appears most at the Waterfalls!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-calendar fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">When to Visit</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">The best time to visit Sipi Falls is during the dry seasons — January to March and August to September. You'll enjoy clear views and safer trails!</p>
          </div>
          <!-- What to Wear -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Boots would also work and a rain jacket are a must for the trails!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-shoe-prints fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">What to Wear</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">Pack sturdy hiking shoes with good grip — Sipi's trails can be slippery! Don't forget a rain jacket for sudden showers.</p>
          </div>
           <!-- What to Pack -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Don't forget your camera and insect repellent!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-suitcase-rolling fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">What to Pack</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">Bring a reusable water bottle, sunscreen, insect repellent, and a small backpack for your hikes. A camera is a must for the views!</p>
          </div>
              <!-- Getting There -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="A 4WD is best for the rugged roads. Local guides know the way!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-map-marker-alt fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">Getting There</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">Sipi Falls is a 4.5-hour drive from Kampala. Hire a 4WD vehicle for the rugged roads, or book a local tour guide from Mbale.</p>
          </div>
            <!-- Where to Stay -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Book early for the best views, especially in peak season!"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-hotel fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">Where to Stay</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">Choose from budget guesthouses or scenic lodges like Sipi River Lodge and top-class resorts. Book early during peak season for the best views!</p>
          </div>
              <!-- Stay Safe -->
          <div class="col-md-4 col-lg-4" 
               style="background: #ffffff; border-radius: 1rem; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; padding: 1.5rem;"
               data-bs-toggle="tooltip" data-bs-placement="top" title="Stay on marked trails and don't hike alone for safety."
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.1)';">
            <i class="fas fa-heartbeat fa-3x mb-3" style="color: #228B22; transition: color 0.3s ease;"></i>
            <h5 class="fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.25rem; color: #228B22;">Stay Safe</h5>
            <p style="font-family: 'Montserrat', sans-serif; font-size: 1rem; line-height: 1.6; color: #333333;">Stick to marked trails, avoid hiking alone, and stay hydrated! The falls can be slippery — watch your step!</p>
          </div>
        </div>

        <!-- Extra Tips Button -->
        <div class="text-center mt-4">
          <button type="button" class="btn btn-lg px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#extraTipsModal"
                  aria-label="View extra travel tips for Sipi Falls"
                  style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer; transition: all 0.3s ease; font-family: 'Montserrat', sans-serif;"
                  onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
                  onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
            Extra Tips
          </button>
        </div>
      </section>
    </section>
  </section>

  <!-- Extra Tips Modal -->
  <div class="modal fade" id="extraTipsModal" tabindex="-1" aria-labelledby="extraTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background: #ffffff;">
        <div class="modal-header">
          <h5 class="modal-title" id="extraTipsModalLabel" style="color: #228B22; font-family: 'Montserrat', sans-serif;">Extra Tips for Sipi Falls</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul id="extra-tips-list" class="list-unstyled mb-0" style="color: #333333; font-family: 'Montserrat', sans-serif; font-size: 1rem;" role="list"></ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Activities Section -->
  <section class="reveal py-5" id="activities" style="background: linear-gradient(to bottom, #ffffff, rgba(111, 207, 151, 0.05)); padding: 3rem 0;">
    <div class="container" style="border-radius: 1rem; box-shadow: 0 2px 16px rgba(34,139,34,0.07); padding: 2rem 1rem; background: transparent;">
      <h2 class="text-center mb-5" style="color: #228B22; font-family: 'Montserrat', sans-serif;">
        Activities at Sipi Falls
      </h2>

      <div class="row g-4 mx-3">
        <!-- Activity 1: Hiking -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/naturewalk.jpg') }}" alt="Hiking the Waterfalls" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Hiking the Waterfalls</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  Explore scenic trails to all three waterfalls, with breathtaking views and lush landscapes.
                  The beauty about hiking here is that you can choose your own pace and enjoy the serene environment.
                </p>
              </div>
            </div>
          </div>
        </div>
         <!-- Activity 2: Abseiling -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/abseil3.jpg') }}" alt="Abseiling" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Abseiling</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  Descend a 100m cliff beside the main waterfall for an adrenaline rush with professional guides.
                  Experience the thrill of abseiling while enjoying stunning views of the falls and surrounding landscape.
                </p>
              </div>
            </div>
          </div>
        </div>

          <!-- Activity 3: Coffee Tours -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/cofi.jpg') }}" alt="Coffee Tour" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Coffee Tours</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee.
                  Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 4: Coffee Tours (duplicate) -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/cofi.jpg') }}" alt="Coffee Tour" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Coffee Tours</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee.
                  Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 5: Cave Adventures -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/clif2.jpg') }}" alt="Cave Adventures" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Cave Adventures</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  The ancient caves echo stories of the past — a thrilling blend of mystery, history, and raw natural beauty.
                  With guided tours, you'll discover underground streams and breathtaking views from the rock itself.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 6: Rock Climbing -->
        <div class="col-md-6 mb-4">
          <div class="d-flex shadow" 
               style="height: 200px; border-radius: 1rem; border: 2px solid #6FCF97; background: #ffffff; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;"
               onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 24px rgba(0, 0, 0, 0.15)';"
               onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';">
            <img src="{{ asset('images/rock climbing.jpg') }}" alt="Rock Climbing" loading="lazy" style="width: 40%; height: 100%; object-fit: cover; flex-shrink: 0;">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold" style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.2rem; color: #228B22;">Rock Climbing</h5>
                <p style="font-family: 'Montserrat', sans-serif; font-size: 0.95rem; line-height: 1.5; color: #333333; border-left: 4px solid #228B22; padding-left: 1rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                  Challenge yourself on rugged cliffs with guided rock climbing adventures, offering panoramic views from the top.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Map Section -->
  <section id="map" class="container py-5 reveal" style="background: linear-gradient(to bottom, #ffffff, rgba(111, 207, 151, 0.05)); padding: 3rem 0;">
    <h2 class="text-center mb-4" style="font-family: 'Montserrat', sans-serif; font-size: 2.5rem; color: #228B22;">Find Sipi Falls</h2>
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
         style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer; transition: all 0.3s ease; font-family: 'Montserrat', sans-serif;"
         onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
         onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
        Get Directions on Google Maps
      </a>
    </div>
  </section>

  @endsection

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sipi Falls Travel Guide</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/responsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="icon" href="../images/logo.png" type="image/x-icon" />
</head>
<body>

  <!-- Navbar -->
  @include('partials.navbar')


  <!-- Hero Section -->
  <section class="hero-section-travel reveal text-center text-light d-flex align-items-center justify-content-center">
    <div class="p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(111,207,151,0.3)); backdrop-filter: blur(5px);">
      <h1 class="display-4 fw-bold" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Your Travel Guide to Sipi Falls</h1>
      <p class="lead" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Everything you need to know before you explore Uganda’s most breathtaking natural wonder.</p>
      <a href="#travel-tips" class="btn btn-lg clickable-btn mt-3" role="button" aria-label="Explore the Sipi Falls travel guide"
         style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
        Explore the Guide
      </a>
    </div>
  </section>

  <!-- Quick Facts Section -->
  <section class="py-3 reveal" style="background: linear-gradient(135deg, #e6f9ec 0%, #d1e7dd 100%);">
    <section class="quick-facts container my-5">
      <section id="travel-tips" class="quick-facts container py-4 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
        <h2 class="text-center mb-2" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">Essential Tips for Your Trip</h2>
        <p class="text-center mb-4" style="font-size: 1.2rem; color: var(--neutral-gray);">Get the most out of your Sipi Falls adventure with these quick, practical tips!</p>
        
        <div class="row text-center gy-4">
         <!-- When to Visit -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="Best weather, fewer crowds, the rainbow appears most at the Waterfalls!">
            <i class="fas fa-calendar fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">When to Visit</h5>
            <p>The best time to visit Sipi Falls is during the dry seasons — January to March and August to September. You’ll enjoy clear views and safer trails!</p>
          </div>
          <!-- What to Wear -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="Boots would also work and a rain jacket are a must for the trails!">
            <i class="fas fa-shoe-prints fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">What to Wear</h5>
            <p>Pack sturdy hiking shoes with good grip — Sipi’s trails can be slippery! Don’t forget a rain jacket for sudden showers.</p>
          </div>
           <!-- What to Pack -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="Don’t forget your camera and insect repellent!">
            <i class="fas fa-suitcase-rolling fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">What to Pack</h5>
            <p>Bring a reusable water bottle, sunscreen, insect repellent, and a small backpack for your hikes. A camera is a must for the views!</p>
          </div>
              <!-- Getting There -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="A 4WD is best for the rugged roads. Local guides know the way!">
            <i class="fas fa-map-marker-alt fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">Getting There</h5>
            <p>Sipi Falls is a 4.5-hour drive from Kampala. Hire a 4WD vehicle for the rugged roads, or book a local tour guide from Mbale.</p>
          </div>
            <!-- Where to Stay -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="Book early for the best views, especially in peak season!">
            <i class="fas fa-hotel fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">Where to Stay</h5>
            <p>Choose from budget guesthouses or scenic lodges like Sipi River Lodge and top-class resorts. Book early during peak season for the best views!</p>
          </div>
              <!-- Stay Safe -->
          <div class="col-md-4 col-lg-4 quick-fact-card" data-bs-toggle="tooltip" data-bs-placement="top" title="Stay on marked trails and don’t hike alone for safety.">
            <i class="fas fa-heartbeat fa-3x mb-3 text-success"></i>
            <h5 class="fw-bold">Stay Safe</h5>
            <p>Stick to marked trails, avoid hiking alone, and stay hydrated! The falls can be slippery — watch your step!</p>
          </div>
        </div>

        <!-- Extra Tips Button -->
        <div class="text-center mt-4">
          <button type="button" class="btn btn-lg clickable-btn px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#extraTipsModal"
                  aria-label="View extra travel tips for Sipi Falls"
                  style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
            Extra Tips
          </button>
        </div>
      </section>
    </section>
  </section>

  <!-- Extra Tips Modal -->
  <div class="modal fade" id="extraTipsModal" tabindex="-1" aria-labelledby="extraTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="background: var(--neutral-offwhite);">
        <div class="modal-header">
          <h5 class="modal-title" id="extraTipsModalLabel" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif;">Extra Tips for Sipi Falls</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul id="extra-tips-list" class="list-unstyled mb-0" style="color: var(--neutral-gray); font-family: 'Montserrat', sans-serif; font-size: 1rem;" role="list"></ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Activities Section -->
  <section class="activities-section reveal py-5" id="activities">
    <div class="container" style="border-radius: 1rem; box-shadow: 0 2px 16px rgba(34,139,34,0.07); padding: 2rem 1rem; background: transparent;">
      <h2 class="text-center mb-5" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif;">
        Activities at Sipi Falls
      </h2>

      <div class="row g-4 mx-3">
        <!-- Activity 1: Hiking -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/naturewalk.jpg" class="activity-img-cover" alt="Hiking the Waterfalls" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Hiking the Waterfalls</h5>
                <p class="activity-desc">
                  Explore scenic trails to all three waterfalls, with breathtaking views and lush landscapes.
                  The beauty about hiking here is that you can choose your own pace and enjoy the serene environment.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Activity 1 ... Activity 6 -->
         <!-- Activity 2: Abseiling -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/abseil3.jpg" class="activity-img-cover" alt="Abseiling" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Abseiling</h5>
                <p class="activity-desc">
                  Descend a 100m cliff beside the main waterfall for an adrenaline rush with professional guides.
                  Experience the thrill of abseiling while enjoying stunning views of the falls and surrounding landscape.
                </p>
              </div>
            </div>
          </div>
        </div>

          <!-- Activity 3: Coffee Tours -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/cofi.jpg" class="activity-img-cover" alt="Coffee Tour" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Coffee Tours</h5>
                <p class="activity-desc">
                  Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee.
                  Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 3: Coffee Tours -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/cofi.jpg" class="activity-img-cover" alt="Coffee Tour" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Coffee Tours</h5>
                <p class="activity-desc">
                  Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee.
                  Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 5: Cave Adventures -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/clif2.jpg" class="activity-img-cover" alt="Cave Adventures" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Cave Adventures</h5>
                <p class="activity-desc">
                  The ancient caves echo stories of the past — a thrilling blend of mystery, history, and raw natural beauty.
                  With guided tours, you'll discover underground streams and breathtaking views from the rock itself.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Activity 6: Rock Climbing -->
        <div class="col-md-6 mb-4">
          <div class="activity-card d-flex shadow">
            <img src="../images/rock climbing.jpg" class="activity-img-cover" alt="Rock Climbing" loading="lazy">
            <div class="d-flex flex-column justify-content-center flex-grow-1 p-3">
              <div>
                <h5 class="text-center fw-bold">Rock Climbing</h5>
                <p class="activity-desc">
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
  <section id="map" class="map-section container py-5 reveal">
    <h2 class="text-center mb-4">Find Sipi Falls</h2>
    <div class="d-flex justify-content-center">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.601019857624!2d34.37416731475344!3d1.3341673629999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177f7b2e2e2e2e2f%3A0x2e2e2e2e2e2e2e2e!2sSipi%20Falls!5e0!3m2!1sen!2sug!4v1693526400000!5m2!1sen!2sug"
        class="map-iframe"
        title="Map of Sipi Falls"
        allowfullscreen
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    <div class="text-center mt-3">
      <a href="https://www.google.com/maps/place/Sipi+Falls/@1.3341674,34.3741673,15z"
         target="_blank"
         class="btn btn-lg clickable-btn"
         data-bs-toggle="tooltip"
         data-bs-placement="top"
         data-bs-title="Open Google Maps to get directions to Sipi Falls"
         aria-label="Get directions to Sipi Falls on Google Maps"
         style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
        Get Directions on Google Maps
      </a>
    </div>
  </section>

  <!-- Footer -->
  @include (partials.footer)

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/script.js"></script>
</body>
</html>

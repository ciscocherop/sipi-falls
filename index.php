<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipi Falls</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
  <!-- Navbar -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Hero Section -->
<section class="herosection position-relative reveal">
  <div class="slideshow-container">
    <!-- Add your images here with corrected paths -->
    <div class="slide" style="background-image: url('images/BANNER.jpg');"></div>
    <div class="slide" style="background-image: url('images/abseil8.jpg');"></div>
    <div class="slide" style="background-image: url('images/xx.jpg');"> <!-- Corrected to .jpg assuming it's a typo -->
    </div>
    <div class="slide" style="background-image: url('images/sipi.webp');"></div>
    <div class="slide" style="background-image: url('images/dwn.jpg');"></div>
    <div class="slide" style="background-image: url('images/f16.jpg');"></div>
    <div class="slide" style="background-image: url('images/splash.jpg');"></div>
    <div class="slide" style="background-image: url('images/f16.jpg');"></div>
  </div>
  <div class="overlay-content position-absolute top-50 start-0 translate-middle-y ps-5">
    <h5 class="text-white fw-bold display-3" style="letter-spacing: 2px;">
      In Nature, Nothing is perfect,
    </h5>
    <h1 class="text-white text-center fs-1 fw-bold display-3" style="letter-spacing: 2px;">
      And Everything Is Perfect.
    </h1>
  </div>
</section>
<section>
  <div>

  </div>
</section>

  <!-- Description Section -->
  <section class="intro py-5 reveal" style="background-color: #f5f6f9; padding-top: 4rem !important; padding-bottom: 4rem !important;">
    <div class="container">
      <h2 class="text-center mb-4 display-5 fw-bold" style="color:#228B22; letter-spacing: 1px;">Where Waters Roar and Wild Hearts Soar!</h2>
      <div class="row justify-content-center align-items-stretch g-4">
        <!-- Timeline Card (Left) -->
        <div class="col-12 col-md-6 d-flex">
          <div class="card shadow-lg rounded-4 w-100 p-4 position-relative" style="background: #fff; box-shadow: 0 0 30px 0 #fff6, 0 2px 16px 0 #e0e0e0;">
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
          <div class="card shadow-lg rounded-4 w-100 p-4" style="background: #fff; box-shadow: 0 0 30px 0 #fff6, 0 2px 16px 0 #e0e0e0;">
            <h3 class="mb-4 text-success text-center">About Sipi Falls</h3>
            <p>
              Sipi Falls is a series of three stunning waterfalls nestled in the foothills
              of Mount Elgon in Kapchorwa District, Uganda. Known for its lush greenery and cool climate,
              Sipi offers a peaceful retreat with panoramic views, unforgettable hikes, and rich cultural experiences.
              Kapchorwa’s untamed treasure—three thundering waterfalls crashing through Eastern Uganda’s rugged cliffs.
              Nestled on the edge of Mount Elgon National Park near Kenya, this is where nature’s raw power meets adventure’s call.
            </p>
          </div>
        </div>
      </div>
      <div class="text-center mt-5">
        <a href="pages/about.php" class="btn btn-success btn-lg px-4 shadow-sm">Learn More About the Falls</a>
      </div>
    </div>
  </section>

<!-- events section -->
<section class="container-fluid py-5 reveal" style="background: linear-gradient(135deg, #e6f9ec 0%, #d1e7dd 100%);">
  <div class="container">
    <h2 class="text-success fw-bold text-center mb-5 display-5" style="letter-spacing: 1px;">Things to Do at the Falls</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="images/hiking.jpg" class="card-img-top event-img" alt="Hiking at Sipi Falls" style="height: 200px; object-fit: cover;">
          <div class="card-body" style="background-color: #f5f6f9;">
            <h5 class="card-title">Hiking</h5>
            <p class="card-text">
              Explore the trails to all three waterfalls with breathtaking views and encounters with nature.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="images/abseil5.jpg" class="card-img-top event-img" alt="Abseiling adventure" style="height: 200px; object-fit: cover;">
          <div class="card-body" style="background-color: #f5f6f9;">
            <h5 class="card-title">Abseiling</h5>
            <p class="card-text">
              Try out the thrilling adventure of descending beside the Sipi cliff waterfall — perfect for adrenaline lovers.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="images/rawcofi.jpg" class="card-img-top event-img" alt="Coffee tour in Sipi" style="height: 200px; object-fit: cover;">
          <div class="card-body" style="background-color: #f5f6f9;">
            <h5 class="card-title">Coffee Tours</h5>
            <p class="card-text">
              Visit local coffee farms, roast your own coffee, and taste freshly brewed coffee right from the source.
            </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="images/naturewalk.jpg" class="card-img-top event-img" alt="Nature Walk in Sipi" style="height: 200px; object-fit: cover;">
          <div class="card-body" style="background-color: #f9f9f9;">
            <h5 class="card-title">Nature Walks</h5>
            <p class="card-text">
              Enjoy calming walks through lush banana plantations, forested trails, and friendly village paths.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-5">
      <a href="pages/travelguide.php" class="btn btn-success btn-lg px-4 shadow-sm">Start Your Adventure</a>
    </div>
  </div>
</section>
 
<!-- testimonal section  -->
<section class="container-fluid py-5 reveal" style="background: #f5f6f9;">
  <div class="container">
    <h2 class="text-center mb-4 text-success fw-bold">Hear From Our Adventurers</h2>
    <div class="row text-center justify-content-center g-4">
      <!-- Testimonial 1 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4 p-4" style="background: #fff;">
          <img src="images/rock climbing.jpg" alt="Sarah" class="testimonial-img mb-3 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold">Sarah K.</h5>
          <div class="mb-2 text-warning">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="fst-italic mb-0">"Sipi Falls is pure magic. The view, the hike, and the local hospitality were unforgettable!"</p>
        </div>
      </div>
      <!-- Testimonial 2 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4 p-4" style="background: #fff;">
          <img src="images/mosesg.jpg" alt="Leo" class="testimonial-img mb-3 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold">Leo M.</h5>
          <div class="mb-2 text-warning">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="fst-italic mb-0">"The coffee tour was my favorite part. I never knew how amazing fresh Ugandan coffee could be!"</p>
        </div>
      </div>
      <!-- Testimonial 3 -->
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4 p-4" style="background: #fff;">
          <img src="images/group.jpg" alt="Rita" class="testimonial-img mb-3 rounded-circle mx-auto d-block" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold">Rita T.</h5>
          <div class="mb-2 text-warning">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p class="fst-italic mb-0">"If you're ever in Uganda, don’t miss Sipi. Best decision of my trip!"</p>
        </div>
      </div>
    </div>
    <!-- Slider will be added here in the future -->
  </div>
</section>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>
  

<!-- Bootstrap JS and custom JS -->
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


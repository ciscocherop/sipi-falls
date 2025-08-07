<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipi Falls</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
  <!-- Navbar -->
  <?php include '../includes/navbar.php'; ?>
 
  <section class="header-section reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, var(--primary-green) 30%); color: var(--neutral-offwhite); padding: 4rem 0;">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <h2 class="text-center" style="font-family: 'Montserrat', sans-serif; font-size: 3rem; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
        Every waterfall has a story — <br><span style="font-style: italic; color: var(--accent-gold);">and ours begins at Sipi!</span>
      </h2>
      <hr style="border-top: 5px solid var(--secondary-teal); width: 60%; margin: 1rem auto; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
      <p class="lead text-center" style="font-family: 'Montserrat', sans-serif; font-size: 1.2rem; color: var(--neutral-offwhite);">
        Flowing from Mount Elgon’s heart, Sipi’s three cascades inspire sustainable adventures and Sabiny culture. Discover their timeless legacy.
      </p>
      <div class="text-center mt-4">
        <a href="#story-heading" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Learn more about Sipi Falls' story" 
          style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
          Discover Our Story
        </a>
      </div>
    </div>
  </section>

  <section class="py-5 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <!-- Section Title -->
      <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
        Discover the Legacy of Sipi Falls
      </h2>
      <div class="row g-4">
       <!-- Our Story -->
        <div class="col-md-6 history-section" style="background-image: url(../images/cave.jpg); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 1rem 1rem; border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10);" role="region" aria-labelledby="story-heading" aria-describedby="story-desc">
          <h2 id="story-heading" class="fs-3" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700; letter-spacing: 1px; margin-bottom: 1.5rem;">
            Our Story: Legends and History
          </h2>
          <p id="story-desc" style="font-size: 1.18rem; color: var(--neutral-offwhite); line-height: 1.7; margin-bottom: 1rem;">
            On Mount Elgon’s emerald slopes, Sipi Falls was born—three wild sisters cascading like poetry,
            their waters whispering tales of ancient wonder. The name “Sipi” honors a fever-healing herb
           cherished by the Sabiny people, a name British explorers etched into maps, unable to capture its magic.
          </p>
          <hr style="border-top: 2px solid var(--secondary-teal); width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
          <p style="font-size: 1.18rem; color: var(--neutral-offwhite); line-height: 1.7; margin-bottom: 1rem;">
            Here, moments come alive—climbing cliffs with your heart racing, sipping coffee warmed by the 
            earth, or standing before the falls, feeling timeless.
           Sipi is where legends are felt, not just told, inviting you to join its story.
          </p>
          <hr style="border-top: 2px solid var(--secondary-teal); width: 80%; margin: 1rem auto; border-radius: 5px;" aria-hidden="true">
          <p style="font-size: 1.18rem; color: var(--neutral-offwhite); line-height: 1.7; margin-bottom: 1rem;">
            Sipi Falls is not just a destination; it's a journey into the heart of nature and culture. 
            Join us at Sipi Falls, where every drop of water carries a story, and every visit becomes part of our living legend.
          </p>
        </div>

        <!-- Mission & Vision Cards -->
        <div class="col-md-6 d-flex flex-column gap-4">
          <!-- Mission Card -->
          <div class="card shadow-sm rounded-4" style="background: var(--neutral-offwhite); border-radius: 1.2rem; border: 2px solid var(--secondary-teal); padding: 1.5rem;" role="region" aria-labelledby="mission-heading">
            <h2 id="mission-heading" class="card-title fs-3" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700;">
              <i class="fas fa-bullseye me-2" style="color: var(--primary-green);"></i> Mission
            </h2>
            <p class="card-text" style="font-size: 1.18rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">
              To share Sipi Falls’ natural beauty and cultural richness with the world, offering authentic experiences while supporting the Sabiny community through sustainable tourism.
            </p>
            <p class="card-text small" style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6;">
              We partner with local guides and artisans to create eco-friendly adventures that uplift the community and preserve the environment.
            </p>
          </div>
          <!-- Vision Card -->
          <div class="card shadow-sm rounded-4" style="background: var(--neutral-offwhite); border-radius: 1.2rem; border: 2px solid var(--secondary-teal); padding: 1.5rem;" role="region" aria-labelledby="vision-heading">
            <h2 id="vision-heading" class="card-title fs-3" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700;">
              <i class="fas fa-eye me-2" style="color: var(--primary-green);"></i> Vision
            </h2>
            <p class="card-text" style="font-size: 1.18rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">
              To be East Africa’s leading eco-friendly adventure hub, preserving Mount Elgon’s wonders for future generations while empowering our community.
            </p>
            <p class="card-text small" style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6;">
              We aim to inspire global travelers with sustainable practices, showcasing Sipi’s beauty while fostering economic growth for locals.
            </p>
          </div>
        </div>
      </div>
  </section>


  <!-- Timeline Section -->
    <section class="sipi-timeline py-5 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
      <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
        <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">
          Unique Facts: The Triple Falls
        </h2>
        <div style="background: var(--neutral-offwhite); border-radius: 1.2rem; padding: 2.5rem 1.5rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10);" role="list" aria-label="Sipi Falls Timeline">
          <div class="timeline">
            <div class="timeline-event mb-4 d-flex align-items-start" role="listitem">
              <div class="timeline-dot" aria-hidden="true" style="background-color: var(--secondary-teal); width: 12px; height: 12px; border-radius: 50%; margin-top: 1rem; flex-shrink: 0;"></div>
              <img src="../images/fall2.jpg" alt="Chebokoch Waterfall with lush plantations and serene swimming pool" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: 0 1rem; flex-shrink: 0;" loading="lazy">
              <div class="timeline-content">
                <h3 style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; color: var(--primary-green);">
                  Upper Waterfall: Chebokoch (85m)
                </h3>
                <p style="font-size: 1.1rem; color: var(--neutral-gray); line-height: 1.6;">
                  Chebokoch’s underground streams form a serene pool amid lush plantations, perfect for a guided adventure.
                </p>
              </div>
            </div>
            <div class="timeline-event mb-4 d-flex align-items-start" role="listitem">
              <div class="timeline-dot" aria-hidden="true" style="background-color: var(--secondary-teal); width: 12px; height: 12px; border-radius: 50%; margin-top: 1rem; flex-shrink: 0;"></div>
              <img src="../images/BANNER.jpg" alt="Chepkui Waterfall with volcanic caves and double-sided view" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: 0 1rem; flex-shrink: 0;" loading="lazy">
              <div class="timeline-content">
                <h3 style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; color: var(--primary-green);">
                  Middle Waterfall: Chepkui (65m)
                </h3>
                <p style="font-size: 1.1rem; color: var(--neutral-gray); line-height: 1.6;">
                  Chepkui’s volcanic caves, with petrified wood, frame a double-sided waterfall offering stunning views.
                </p>
              </div>
            </div>
            <div class="timeline-event mb-4 d-flex align-items-start" role="listitem">
              <div class="timeline-dot" aria-hidden="true" style="background-color: var(--secondary-teal); width: 12px; height: 12px; border-radius: 50%; margin-top: 1rem; flex-shrink: 0;"></div>
              <img src="../images/falld1.jpg" alt="Kaptogolo Waterfall with ancient rock paintings and mineral deposits" style="width: 120px; height: 120px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: 0 1rem; flex-shrink: 0;" loading="lazy">
              <div class="timeline-content">
                <h3 style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; color: var(--primary-green);">
                  Lower Waterfall: Kaptogolo (100m)
                </h3>
                <p style="font-size: 1.1rem; color: var(--neutral-gray); line-height: 1.6;">
                  Kaptogolo’s chambers, once a herders’ refuge, reveal ancient rock paintings and mineral deposits.
                </p>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <a href="../pages/travelguide.php#activities" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Book a tour to explore Sipi Falls"
              style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
              Book a Tour
            </a>
          </div>
        </div>
      </div>
    </section>

  
  <section class="py-5 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card shadow-sm rounded-4 p-4 d-flex flex-row flex-wrap" style="background: var(--neutral-offwhite); border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10);">
            <div class="col-md-6 d-flex flex-column justify-content-center p-3">
              <h2 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 2.5rem; letter-spacing: 1px; margin-bottom: 1.5rem;">Community & Sustainability</h2>
              <img src="../images/sunset.jpg" alt="Sabiny community planting coffee trees near Sipi Falls" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 1rem;" loading="lazy">
              <p style="font-size: 1.13rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">
                Our tours empower the Sabiny community with jobs and local crafts while promoting sustainability through solar power, waste reduction, and coffee tree planting.
              </p>
              <div class="text-center">
                <a href="../pages/travelguide.php#sustainability" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Learn more about our sustainable tours"
                  style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
                  Explore Sustainable Tours
                </a>
              </div>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="background: linear-gradient(135deg, var(--secondary-teal) 0%, #b3e5d5 100%);">
            <div class="w-100">
              <div class="counter-box p-4 shadow-sm rounded-4 text-center mb-3" role="region" aria-label="Sabiny Jobs Created">
                <img src="../images/tourguide.jpg" alt="Sabiny guide leading a tour at Sipi Falls" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin-bottom: 1rem;" loading="lazy">
                <h2 class="counter" data-target="100" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 1.8rem;" aria-live="polite">0</h2>
                <p style="font-size: 1rem; color: var(--neutral-gray); margin-bottom: 0;">Sabiny Jobs Created</p>
              </div>
              <div class="counter-box p-4 shadow-sm rounded-4 text-center mb-3" role="region" aria-label="Coffee Trees Planted">
                <img src="../images/readycofi.jpg" alt="Coffee tree planting activity at Sipi Falls" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin-bottom: 1rem;" loading="lazy">
                <h2 class="counter" data-target="1000" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 1.8rem;" aria-live="polite">0</h2>
                <p style="font-size: 1rem; color: var(--neutral-gray); margin-bottom: 0;">Coffee Trees Planted</p>
              </div>
              <div class="counter-box p-4 shadow-sm rounded-4 text-center mb-3" role="region" aria-label="Sustainable Tours Led">
                <img src="../images/group.jpg" alt="Group of happy visitors on a sustainable tour" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin-bottom: 1rem;" loading="lazy">
                <h2 class="counter" data-target="500" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 1.8rem;" aria-live="polite">0</h2>
                <p style="font-size: 1rem; color: var(--neutral-gray); margin-bottom: 0;">Sustainable Tours Led</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tour Guide Team with Hover Overlay -->
  <section class="py-5 reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <h2 class="text-center mb-5 fw-bold" style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-size: 2.5rem;">Meet Our Tour Guides</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm rounded-4 text-center p-3 team-card position-relative overflow-hidden" style="border: none; background: var(--neutral-offwhite); box-shadow: 0 2px 16px rgba(34,139,34,0.10);">
            <img src="../images/tourguide1.jpg" alt="Sisco, expert hiking and abseiling guide at Sipi Falls" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-green);" loading="lazy">
            <h4 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; margin-bottom: 0.5rem;">Sisco</h4>
            <p style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6; margin-bottom: 1rem;">15 years guiding hikers and abseilers, Sisco brings humor and deep local knowledge to every adventure.</p>
            <div class="team-overlay d-flex flex-column justify-content-center align-items-center" tabindex="0" aria-label="Connect with Sisco on social media">
              <span class="fw-bold mb-2" style="color: var(--neutral-gray);">Connect:</span>
              <div>
                <a href="https://facebook.com/sisco" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Sisco's Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com/sisco" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Sisco's Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/1234567890" class="fs-4" style="color: var(--secondary-teal);" aria-label="Sisco's WhatsApp"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="text-center mt-2">
              <a href="../pages/travelguide.php#book-tour" class="btn clickable-btn shadow-sm" role="button" aria-label="Book a tour with Sisco"
                style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal); font-size: 0.9rem;">
                Book with Sisco
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm rounded-4 text-center p-3 team-card position-relative overflow-hidden" style="border: none; background: var(--neutral-offwhite); box-shadow: 0 2px 16px rgba(34,139,34,0.10);">
            <img src="../images/tourguide.jpg" alt="Josh, cultural tours and photography expert at Sipi Falls" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-green);" loading="lazy">
            <h4 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; margin-bottom: 0.5rem;">Josh</h4>
            <p style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6; margin-bottom: 1rem;">Founder since 2018, Josh excels in cultural tours and photography, passionate about community growth.</p>
            <div class="team-overlay d-flex flex-column justify-content-center align-items-center" tabindex="0" aria-label="Connect with Josh on social media">
              <span class="fw-bold mb-2" style="color: var(--neutral-gray);">Connect:</span>
              <div>
                <a href="https://facebook.com/josh" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Josh's Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com/josh" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Josh's Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/1234567891" class="fs-4" style="color: var(--secondary-teal);" aria-label="Josh's WhatsApp"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="text-center mt-2">
              <a href="../pages/travelguide.php#book-tour" class="btn clickable-btn shadow-sm" role="button" aria-label="Book a tour with Josh"
                style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal); font-size: 0.9rem;">
                Book with Josh
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm rounded-4 text-center p-3 team-card position-relative overflow-hidden" style="border: none; background: var(--neutral-offwhite); box-shadow: 0 2px 16px rgba(34,139,34,0.10);">
            <img src="../images/tourguide1.jpg" alt="Risper, sunset tours and coffee experience guide at Sipi Falls" class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-green);" loading="lazy">
            <h4 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 1.5rem; margin-bottom: 0.5rem;">Risper</h4>
            <p style="font-size: 1rem; color: var(--neutral-gray); line-height: 1.6; margin-bottom: 1rem;">Risper shines in sunset tours and coffee experiences, bringing enthusiasm and storytelling to every trip.</p>
            <div class="team-overlay d-flex flex-column justify-content-center align-items-center" tabindex="0" aria-label="Connect with Risper on social media">
              <span class="fw-bold mb-2" style="color: var(--neutral-gray);">Connect:</span>
              <div>
                <a href="https://facebook.com/risper" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Risper's Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com/risper" class="fs-4 me-3" style="color: var(--secondary-teal);" aria-label="Risper's Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/1234567892" class="fs-4" style="color: var(--secondary-teal);" aria-label="Risper's WhatsApp"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="text-center mt-2">
              <a href="../pages/travelguide.php#book-tour" class="btn clickable-btn shadow-sm" role="button" aria-label="Book a tour with Risper"
                style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal); font-size: 0.9rem;">
                Book with Risper
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Video Section -->
  <section class="video-section reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <div class="video-wrapper" style="background: var(--neutral-offwhite); border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10); padding: 2.5rem 2rem; max-width: 900px; margin: 0 auto;" role="region" aria-label="Video showcasing Sipi Falls">
        <h2 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 2.5rem; letter-spacing: 1px; margin-bottom: 1.5rem;">Watch Our Story</h2>
        <p style="font-size: 1.13rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1rem;">Experience the magic of Sipi Falls through this captivating video.</p>
        <div class="video-container" style="position: relative; width: 100%; max-width: 100%; height: 0; padding-bottom: 56.25%; border-radius: 0.7rem; overflow: hidden; background: var(--neutral-gray);">
          <video src="../images/banner.mp4" controls autoplay muted loop poster="../images/banner.jpg" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;" aria-label="Video tour of Sipi Falls' waterfalls and Sabiny culture">
            <p>Your browser does not support the video tag. View a <a href="../images/sipi-falls-still.jpg" style="color: var(--accent-gold);">still image</a> of Sipi Falls instead.</p>
          </video>
        </div>
        <div class="text-center mt-3">
          <a href="../pages/travelguide.php#activities" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Explore activities at Sipi Falls"
            style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
            Explore Activities
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="cta-section reveal" style="background: linear-gradient(135deg, var(--neutral-offwhite) 0%, #d1e7dd 100%);">
    <div class="container-fluid" style="padding-left: 1.5rem; padding-right: 1.5rem;">
      <div style="background: var(--neutral-offwhite); border-radius: 1.2rem; box-shadow: 0 2px 16px rgba(34,139,34,0.10); padding: 2.5rem 2rem; max-width: 900px; margin: 0 auto; text-align: center;" role="region" aria-label="Call to action for booking a Sipi Falls tour">
        <img src="../images/waterfall-icon.png" alt="Sipi Falls waterfall icon" style="width: 60px; height: 60px; margin-bottom: 1rem;" loading="lazy">
        <h2 style="color: var(--primary-green); font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 2.5rem; letter-spacing: 1px; margin-bottom: 1.5rem;">Ready to Explore Sipi Falls?</h2>
        <p style="font-size: 1.13rem; color: var(--neutral-gray); line-height: 1.7; margin-bottom: 1.5rem;">Join the Sabiny legacy—book your adventure with our expert guides today!</p>
        <div class="text-center">
          <a href="../pages/contact.php" class="btn btn-lg clickable-btn shadow-sm" role="button" aria-label="Book a tour via contact page"
            style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">
            Contact Us to Book
          </a>
        </div>
      </div>
    </div>
  </section>

<?php include '../includes/footer.php'; ?>

<!-- Styles and JS moved to external files for organization -->
<link rel="stylesheet" href="../css/style.css">
<script src="../js/script.js"></script>
</body>
</html>
<footer class="position-relative" style="background: linear-gradient(90deg, #228B22 60%, #6FCF97 100%); font-family: 'Montserrat', sans-serif;">
  <div class="container py-4">
    <div class="row g-4 align-items-start">
      <!-- Brand & Slogan -->
      <div class="col-md-3 mb-4 mb-md-0">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none mb-3">
          <img src="{{ asset('images/logo.png') }}" alt="Sipi Falls Logo" class="me-2" style="width: 60px; height: 45px; border-radius: 8px; background: #fff; padding: 2px;">
          <span class="fw-bold fs-4" style="color: #ffffff; font-family: 'Montserrat', sans-serif;">Sipi Falls</span>
        </a>
        <p class="small mb-2 slogan" style="color: #ffffff;">Keep Sipping!!</p>
        <p class="small mb-0" style="color: #ffffff;">Discover Uganda's natural wonder. Adventure, culture, and breathtaking views await.</p>
      </div>
      
      <!-- Quick Links -->
      <div class="col-md-2 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3" style="color: #ffffff; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; letter-spacing: 1px;">Quick Links</h6>
        <ul class="list-unstyled" style="padding-left: 0;">
          <li style="margin-bottom: 0.5rem;">
            <a href="{{ route('home') }}" class="text-decoration-none" 
               style="color: #ffffff; transition: color 0.2s;"
               onmouseover="this.style.color='#E8B923';"
               onmouseout="this.style.color='#ffffff';">Home</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="{{ route('travelguide') }}" class="text-decoration-none" 
               style="color: #ffffff; transition: color 0.2s;"
               onmouseover="this.style.color='#E8B923';"
               onmouseout="this.style.color='#ffffff';">Travel Guide</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="{{ route('about') }}" class="text-decoration-none" 
               style="color: #ffffff; transition: color 0.2s;"
               onmouseover="this.style.color='#E8B923';"
               onmouseout="this.style.color='#ffffff';">About Us</a>
          </li>
          <li style="margin-bottom: 0.5rem;">
            <a href="{{ route('contact') }}" class="text-decoration-none" 
               style="color: #ffffff; transition: color 0.2s;"
               onmouseover="this.style.color='#E8B923';"
               onmouseout="this.style.color='#ffffff';">Contact Us</a>
          </li>
        </ul>
      </div>
      
      <!-- Contact Info -->
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3" style="color: #ffffff; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; letter-spacing: 1px;">Contact</h6>
        <ul class="list-unstyled small mb-2" style="color: #ffffff; padding-left: 0;">
          <li style="margin-bottom: 0.5rem;"><i class="fas fa-envelope me-2"></i> {{ $contactContent['contact_email'] ?? 'info@sipifalls.com' }}</li>
          <li style="margin-bottom: 0.5rem;"><i class="fas fa-phone me-2"></i> {{ $contactContent['contact_phone'] ?? '+256 703558174' }}</li>
          <li style="margin-bottom: 0.5rem;"><i class="fas fa-map-marker-alt me-2"></i> {{ $contactContent['contact_address'] ?? 'Kapchorwa, Uganda' }}</li>
        </ul>
        <div class="d-flex gap-2">
          <a href="https://facebook.com" aria-label="Facebook" 
             style="color: #ffffff; font-size: 1.3rem; margin-right: 0.5rem; transition: color 0.2s, transform 0.2s;"
             onmouseover="this.style.color='#E8B923'; this.style.transform='scale(1.15)';"
             onmouseout="this.style.color='#ffffff'; this.style.transform='scale(1)';">
             <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://twitter.com" aria-label="Twitter" 
             style="color: #ffffff; font-size: 1.3rem; margin-right: 0.5rem; transition: color 0.2s, transform 0.2s;"
             onmouseover="this.style.color='#E8B923'; this.style.transform='scale(1.15)';"
             onmouseout="this.style.color='#ffffff'; this.style.transform='scale(1)';">
             <i class="fab fa-twitter"></i>
          </a>
          <a href="https://instagram.com" aria-label="Instagram" 
             style="color: #ffffff; font-size: 1.3rem; margin-right: 0.5rem; transition: color 0.2s, transform 0.2s;"
             onmouseover="this.style.color='#E8B923'; this.style.transform='scale(1.15)';"
             onmouseout="this.style.color='#ffffff'; this.style.transform='scale(1)';">
             <i class="fab fa-instagram"></i>
          </a>
          <a href="https://youtube.com" aria-label="YouTube" 
             style="color: #ffffff; font-size: 1.3rem; margin-right: 0.5rem; transition: color 0.2s, transform 0.2s;"
             onmouseover="this.style.color='#E8B923'; this.style.transform='scale(1.15)';"
             onmouseout="this.style.color='#ffffff'; this.style.transform='scale(1)';">
             <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
      
      <!-- Newsletter Signup -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3" style="color: #ffffff; font-family: 'Montserrat', sans-serif; font-size: 1.2rem; letter-spacing: 1px;">Stay Updated</h6>
        <form id="newsletter-form" action="{{ route('newsletter.submit') }}" method="POST">
          @csrf
          <div class="input-group mb-2">
            <label for="newsletter-email" class="visually-hidden">Email</label>
            <input type="email" id="newsletter-email" class="form-control" name="email" placeholder="Your Email" aria-label="Email" required
                   style="background-color: #222; color: #ffffff; border: 1px solid #6FCF97;"
                   onfocus="this.style.backgroundColor='#fff'; this.style.color='#228B22'; this.style.borderColor='#6FCF97'; this.style.boxShadow='0 0 0 2px rgba(111, 207, 151, 0.2)';"
                   onblur="this.style.backgroundColor='#222'; this.style.color='#ffffff'; this.style.borderColor='#6FCF97'; this.style.boxShadow='none';">
            <button class="btn" type="submit" 
                    style="background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; cursor: pointer; transition: all 0.3s ease; font-family: 'Montserrat', sans-serif;"
                    onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
                    onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
              Sign Up
            </button>
          </div>
          <div id="newsletter-feedback" class="small text-white mt-2" style="display: none;"></div>
        </form>
        <div class="mt-3">
          <a href="#privacy" class="text-decoration-none small me-3" 
             style="color: #ffffff; transition: color 0.2s;"
             onmouseover="this.style.color='#E8B923';"
             onmouseout="this.style.color='#ffffff';">Privacy Policy</a>
          <a href="#terms" class="text-decoration-none small" 
             style="color: #ffffff; transition: color 0.2s;"
             onmouseover="this.style.color='#E8B923';"
             onmouseout="this.style.color='#ffffff';">Terms of Service</a>
        </div>
      </div>
    </div>
    
    <hr class="my-4" style="border-top: 2px solid #ffffff;">
    
    <div class="text-center small" style="color: #ffffff; font-size: 0.9rem;">
      <span id="copyright">© 2025 Sipi Falls. All Rights Reserved.</span>
    </div>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn position-fixed" 
            style="bottom: 30px; right: 30px; z-index: 1050; background-color: #E8B923; color: #333333; border: 2px solid #6FCF97; border-radius: 50%; width: 48px; height: 48px; display: none; align-items: center; justify-content: center; padding: 0; cursor: pointer; transition: all 0.3s ease;" 
            aria-label="Back to top"
            onmouseover="this.style.backgroundColor='#6FCF97'; this.style.color='#fff'; this.style.borderColor='#E8B923'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.3)';"
            onmouseout="this.style.backgroundColor='#E8B923'; this.style.color='#333333'; this.style.borderColor='#6FCF97'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</footer>

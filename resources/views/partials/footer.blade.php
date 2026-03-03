<footer class="footer-section position-relative">
  <div class="container py-4">
    <div class="row g-4 align-items-start">
      <!-- Brand & Slogan -->
      <div class="col-md-3 mb-4 mb-md-0">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none mb-3">
          <img src="{{ asset('images/logo.png') }}" alt="Sipi Falls Logo" class="navbar-logo me-2" style="width: 60px; height: 45px; border-radius: 8px; background: #fff; padding: 2px;">
          <span class="fw-bold fs-4" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Sipi Falls</span>
        </a>
  <p class="small mb-2 slogan" style="color: var(--neutral-offwhite);">Keep Sipping!!</p>
        <p class="small mb-0" style="color: var(--neutral-offwhite);">Discover Uganda’s natural wonder. Adventure, culture, and breathtaking views await.</p>
      </div>
      <!-- Quick Links -->
      <div class="col-md-2 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--neutral-offwhite);">Home</a></li>
          <li><a href="{{ route('travelguide') }}" class="text-decoration-none" style="color: var(--neutral-offwhite);">Travel Guide</a></li>
          <li><a href="{{ route('about') }}" class="text-decoration-none" style="color: var(--neutral-offwhite);">About Us</a></li>
          <li><a href="{{ route('contact') }}" class="text-decoration-none" style="color: var(--neutral-offwhite);">Contact Us</a></li>
        </ul>
      </div>
      <!-- Contact Info -->
      <div class="col-md-3 mb-4 mb-md-0">
        <h6 class="fw-bold mb-3" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Contact</h6>
        <ul class="list-unstyled small mb-2" style="color: var(--neutral-offwhite);">
          <li><i class="fas fa-envelope me-2"></i> info@sipifalls.com</li>
          <li><i class="fas fa-phone me-2"></i> +256 703558174</li>
          <li><i class="fas fa-map-marker-alt me-2"></i> Kapchorwa, Uganda</li>
        </ul>
        <div class="d-flex gap-2">
          <a href="https://facebook.com" class="social-link" aria-label="Facebook" style="color: var(--neutral-offwhite);"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com" class="social-link" aria-label="Twitter" style="color: var(--neutral-offwhite);"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com" class="social-link" aria-label="Instagram" style="color: var(--neutral-offwhite);"><i class="fab fa-instagram"></i></a>
          <a href="https://youtube.com" class="social-link" aria-label="YouTube" style="color: var(--neutral-offwhite);"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <!-- Newsletter Signup -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3" style="color: var(--neutral-offwhite); font-family: 'Montserrat', sans-serif;">Stay Updated</h6>
        <form id="newsletter-form" action="{{ route('newsletter.submit') }}" method="POST">
          @csrf
          <div class="input-group mb-2">
            <label for="newsletter-email" class="visually-hidden">Email</label>
            <input type="email" id="newsletter-email" class="form-control" name="email" placeholder="Your Email" aria-label="Email" required>
            <button class="btn clickable-btn" type="submit" style="background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal);">Sign Up</button>
          </div>
          <div id="newsletter-feedback" class="small text-white mt-2" style="display: none;"></div>
        </form>
        <div class="mt-3">
          <a href="#privacy" class="text-decoration-none small me-3" style="color: var(--neutral-offwhite);">Privacy Policy</a>
          <a href="#terms" class="text-decoration-none small" style="color: var(--neutral-offwhite);">Terms of Service</a>
        </div>
      </div>
    </div>
    <hr class="my-4" style="border-top: 2px solid var(--neutral-offwhite);">
    <div class="text-center small" style="color: var(--neutral-offwhite);">
      <span id="copyright">© 2025 Sipi Falls. All Rights Reserved.</span>
    </div>
    <!-- Back to Top Button -->
    <button id="back-to-top" class="btn clickable-btn position-fixed" style="bottom: 30px; right: 30px; z-index: 1050; background-color: var(--accent-gold); color: var(--neutral-gray); border: 2px solid var(--secondary-teal); border-radius: 50%; width: 48px; height: 48px; display: none;" aria-label="Back to top">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</footer>
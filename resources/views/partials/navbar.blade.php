<header>
  <nav class="navbar navbar-expand-lg fixed-top shadow-sm py-3" style="background: linear-gradient(90deg, #228B22 60%, #6FCF97 100%);">
    <div class="container">
      <a class="navbar-brand d-flex flex-column align-items-start w-auto me-4" href="../index.php">
  <span class="text-white fw-bold" style="font-size: 2.2rem; letter-spacing: 2px; font-family: 'Montserrat', sans-serif;">Sipi Falls</span>
  <span class="text-white fw-semibold slogan" style="font-size: 1.1rem; font-family: 'Montserrat', sans-serif; opacity: 0.85;">Keep Sipping!!</span>
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <!-- Inline SVG toggler uses currentColor so it inherits CSS color -->
        <span class="navbar-toggler-icon" style="display:inline-block; width:1.5em; height:1.5em;">
          <svg viewBox="0 0 30 30" width="24" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
            <g fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
              <line x1="4" y1="7" x2="26" y2="7"></line>
              <line x1="4" y1="15" x2="26" y2="15"></line>
              <line x1="4" y1="23" x2="26" y2="23"></line>
            </g>
          </svg>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-2 gap-lg-4 align-items-center">
          <li class="nav-item"><a class="nav-link text-white px-3 rounded-pill fw-semibold" href="{{ route('home') }}" aria-current="page">Home</a></li>
          <li class="nav-item"><a class="nav-link text-white px-3 rounded-pill fw-semibold" href="{{ route('travelguide') }}">Travel Guide</a></li>
          <li class="nav-item"><a class="nav-link text-white px-3 rounded-pill fw-semibold" href="{{ route('about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link text-white px-3 rounded-pill fw-semibold" href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<header>
  <!-- Navbar - Simple Bootstrap with inline styles -->
  <nav class="navbar navbar-expand-lg fixed-top shadow-lg py-3" 
       style="background: linear-gradient(90deg, #228B22 60%, #6FCF97 100%); border-top-left-radius: 50px; z-index: 1050;">
    <div class="container">
      <!-- Brand Logo -->
      <a class="navbar-brand d-flex flex-column align-items-start text-decoration-none" href="{{ route('home') }}">
        <span class="text-white fw-bold" style="font-size: 2.2rem; letter-spacing: 2px; font-family: 'Montserrat', sans-serif;">Sipi Falls</span>
        <span class="text-white fw-semibold" style="font-size: 1.1rem; font-family: 'Montserrat', sans-serif; opacity: 0.85;">Keep Sipping!!</span>
      </a>
      
      <!-- Mobile Menu Toggle -->
      <button class="navbar-toggler border-0" 
              type="button" 
              data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" 
              aria-controls="navbarNav" 
              aria-expanded="false" 
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\'%3e%3cpath stroke=\'rgba%28255, 255, 255, 1%29\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/%3e%3c/svg%3e');"></span>
      </button>
      
      <!-- Navigation Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-2 gap-lg-4 align-items-center">
          <li class="nav-item">
            <a class="nav-link text-white px-3 rounded-pill fw-semibold text-decoration-none" 
               href="{{ route('home') }}" 
               style="transition: all 0.2s; font-family: 'Montserrat', sans-serif;"
               onmouseover="this.style.backgroundColor='#E8B923'; this.style.color='#228B22'; this.style.transform='scale(1.05)';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.transform='scale(1)';">
               Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white px-3 rounded-pill fw-semibold text-decoration-none" 
               href="{{ route('travelguide') }}"
               style="transition: all 0.2s; font-family: 'Montserrat', sans-serif;"
               onmouseover="this.style.backgroundColor='#E8B923'; this.style.color='#228B22'; this.style.transform='scale(1.05)';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.transform='scale(1)';">
               Travel Guide
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white px-3 rounded-pill fw-semibold text-decoration-none" 
               href="{{ route('about') }}"
               style="transition: all 0.2s; font-family: 'Montserrat', sans-serif;"
               onmouseover="this.style.backgroundColor='#E8B923'; this.style.color='#228B22'; this.style.transform='scale(1.05)';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.transform='scale(1)';">
               About Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white px-3 rounded-pill fw-semibold text-decoration-none" 
               href="{{ route('contact') }}"
               style="transition: all 0.2s; font-family: 'Montserrat', sans-serif;"
               onmouseover="this.style.backgroundColor='#E8B923'; this.style.color='#228B22'; this.style.transform='scale(1.05)';"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.transform='scale(1)';">
               Contact Us
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

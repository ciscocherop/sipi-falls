  <header>
    <!-- Glassmorphism Floating Navbar -->
    <nav id="mainNavbar" class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md transition-all duration-300" style="background-color: rgba(26, 62, 31, 0.85); border-bottom: 1px solid rgba(180,180,180,0.18);">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-2">
          <!-- Brand Logo -->
          <a href="/" class="flex flex-col items-start text-decoration-none">
            <span class="text-white font-bold text-2xl tracking-wide" style="font-family: var(--font-primary);">Sipi Falls</span>
            <span class="text-xs uppercase tracking-widest font-semibold" style="color: var(--accent-gold); font-family: var(--font-primary);">Keep Sipping</span>
          </a>

          <!-- Mobile Menu Toggle -->
          <button onclick="toggleMobileMenu()" class="lg:hidden text-white p-2" type="button" aria-label="Toggle navigation">
            <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>

          <!-- Navigation Links -->
          <div id="navbarNav" class="hidden lg:block">
            <ul class="flex flex-row items-center gap-3">
              <li>
                <a href="/"
                  class="font-semibold px-4 py-2 rounded-full"
                  style="background-color: var(--accent-gold); color: #0a1a0a; font-family: var(--font-primary); text-decoration: none; transition: all 0.3s;">
                  Home
                </a>
              </li>
              <li>
                <a href="/travelguide"
                  class="font-semibold px-2"
                  style="color: rgba(255, 255, 255, 0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                  onmouseover="this.style.color='var(--accent-gold)'"
                  onmouseout="this.style.color='rgba(255, 255, 255, 0.85)'">
                  Travel Guide
                </a>
              </li>
              <li>
                <a href="/about"
                  class="font-semibold px-2"
                  style="color: rgba(255, 255, 255, 0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                  onmouseover="this.style.color='var(--accent-gold)'"
                  onmouseout="this.style.color='rgba(255, 255, 255, 0.85)'">
                  About Us
                </a>
              </li>
              <li>
                <a href="/contact"
                  class="font-semibold px-2"
                  style="color: rgba(255, 255, 255, 0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                  onmouseover="this.style.color='var(--accent-gold)'"
                  onmouseout="this.style.color='rgba(255, 255, 255, 0.85)'">
                  Contact Us
                </a>
              </li>
              <li>
                <a href="/contact"
                  class="font-bold px-5 py-2 rounded-full"
                  style="background-color: var(--accent-gold); color: #0a1a0a; font-family: var(--font-primary); text-decoration: none;">
                  Book Visit
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>


<header>
  <!-- Glassmorphism Floating Navbar -->
  <nav id="mainNavbar" class="fixed top-0 left-0 right-0 z-50 bg-[#0a1a0a]/70 backdrop-blur-md border-b border-white/10 transition-all duration-300">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between py-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="flex flex-col items-start text-decoration-none">
          <span class="text-white font-bold text-2xl tracking-wide" style="font-family: var(--font-display);">Sipi Falls</span>
          <span class="text-xs uppercase tracking-widest font-semibold" style="color: var(--accent-gold); font-family: var(--font-body);">Keep Sipping</span>
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
          <ul class="flex flex-row items-center gap-8 lg:flex-row flex-col">
            <li>
              <a href="{{ route('home') }}" 
                 class="font-semibold"
                 style="color: rgba(255, 255, 255, 0.8); font-family: var(--font-body); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'">
                Home
              </a>
            </li>
            <li>
              <a href="{{ route('travelguide') }}" 
                 class="font-semibold"
                 style="color: rgba(255, 255, 255, 0.8); font-family: var(--font-body); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'">
                Travel Guide
              </a>
            </li>
            <li>
              <a href="{{ route('about') }}" 
                 class="font-semibold"
                 style="color: rgba(255, 255, 255, 0.8); font-family: var(--font-body); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'">
                About Us
              </a>
            </li>
            <li>
              <a href="{{ route('contact') }}" 
                 class="font-semibold"
                 style="color: rgba(255, 255, 255, 0.8); font-family: var(--font-body); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'">
                Contact Us
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>

<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
  const navbar = document.getElementById('mainNavbar');
  if (window.scrollY > 80) {
    navbar.style.backgroundColor = 'rgba(10, 26, 10, 0.95)';
  } else {
    navbar.style.backgroundColor = 'rgba(10, 26, 10, 0.7)';
  }
});

// Mobile menu toggle
function toggleMobileMenu() {
  const menu = document.getElementById('navbarNav');
  const menuIcon = document.getElementById('menuIcon');
  const closeIcon = document.getElementById('closeIcon');
  const isOpen = menu.style.display === 'flex';
  
  if (isOpen) {
    menu.style.display = 'none';
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
    document.documentElement.style.overflow = '';
    document.body.style.overflow = '';
  } else {
    menu.style.display = 'flex';
    menuIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';
  }
}
</script>

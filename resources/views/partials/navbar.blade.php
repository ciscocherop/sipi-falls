<header>
  <!-- Glassmorphism Floating Navbar -->
  <nav id="mainNavbar" class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md transition-all duration-300"
       style="background-color: rgba(26, 62, 31, 0.85); border-bottom: 1px solid rgba(180,180,180,0.18);">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between py-2">

        <!-- Brand Logo -->
        <a href="/" class="flex flex-col items-start text-decoration-none" style="z-index: 10001; position: relative;">
          <span class="text-white font-bold text-2xl tracking-wide" style="font-family: var(--font-primary);">Sipi Falls</span>
          <span class="text-xs uppercase tracking-widest font-semibold" style="color: var(--accent-gold); font-family: var(--font-primary);">Keep Sipping</span>
        </a>

        <!-- Hamburger Button (mobile only) -->
        <button id="hamburgerBtn"
                onclick="toggleMobileMenu()"
                class="lg:hidden text-white p-2 hamburger-btn"
                type="button"
                aria-label="Toggle navigation"
                aria-expanded="false"
                style="position: relative; z-index: 10001; width: 44px; height: 44px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 5px; background: rgba(255,255,255,0.1); border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(4px);">
          <span class="ham-line" style="display: block; width: 22px; height: 2px; background: white; border-radius: 2px; transition: all 0.35s ease;"></span>
          <span class="ham-line" style="display: block; width: 16px; height: 2px; background: white; border-radius: 2px; transition: all 0.35s ease; align-self: flex-end;"></span>
          <span class="ham-line" style="display: block; width: 22px; height: 2px; background: white; border-radius: 2px; transition: all 0.35s ease;"></span>
        </button>

        <!-- Desktop Navigation Links -->
        <div id="navbarNav" class="hidden lg:block">
          <ul class="flex flex-row items-center gap-3">
            <li>
              <a href="/" class="font-semibold px-4 py-2 rounded-full"
                 style="background-color: var(--accent-gold); color: #0a1a0a; font-family: var(--font-primary); text-decoration: none; transition: all 0.3s;">
                Home
              </a>
            </li>
            <li>
              <a href="/travelguide" class="font-semibold px-2"
                 style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255,255,255,0.85)'">Travel Guide</a>
            </li>
            <li>
              <a href="/about" class="font-semibold px-2"
                 style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255,255,255,0.85)'">About Us</a>
            </li>
            <li>
              <a href="/contact" class="font-semibold px-2"
                 style="color: rgba(255,255,255,0.85); font-family: var(--font-primary); text-decoration: none; transition: color 0.3s;"
                 onmouseover="this.style.color='var(--accent-gold)'"
                 onmouseout="this.style.color='rgba(255,255,255,0.85)'">Contact Us</a>
            </li>
            <li>
              <a href="/contact" class="font-bold px-5 py-2 rounded-full"
                 style="background-color: var(--accent-gold); color: #0a1a0a; font-family: var(--font-primary); text-decoration: none;">
                Book Visit
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

  <!-- =====================================================
       MOBILE DRAWER BACKDROP
       Clicking this closes the drawer
       ===================================================== -->
  <div id="drawerBackdrop"
       onclick="toggleMobileMenu()"
       style="display: none; position: fixed; inset: 0; z-index: 9998;
              background: rgba(0, 0, 0, 0.45);
              backdrop-filter: blur(6px);
              -webkit-backdrop-filter: blur(6px);
              transition: opacity 0.35s ease;
              opacity: 0;">
  </div>

  <!-- =====================================================
       MOBILE SLIDE-IN DRAWER (right side, 1/3 width)
       ===================================================== -->
  <div id="mobileDrawer"
       style="position: fixed; top: 0; right: 0; bottom: 0; z-index: 9999;
              width: min(33vw, 320px);
              min-width: 260px;
              transform: translateX(100%);
              transition: transform 0.38s cubic-bezier(0.4, 0, 0.2, 1);
              background: linear-gradient(160deg,
                rgba(15, 40, 20, 0.82) 0%,
                rgba(26, 62, 31, 0.78) 40%,
                rgba(10, 30, 15, 0.88) 100%);
              backdrop-filter: blur(20px);
              -webkit-backdrop-filter: blur(20px);
              border-left: 1px solid rgba(255, 255, 255, 0.15);
              box-shadow: -8px 0 40px rgba(0, 0, 0, 0.4);
              display: flex; flex-direction: column; overflow-y: auto;">

    <!-- Glass shimmer top strip -->
    <div style="height: 2px; background: linear-gradient(90deg, transparent, rgba(232,185,35,0.7), transparent); flex-shrink: 0;"></div>

    <!-- Drawer Header -->
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.08); flex-shrink: 0;">
      <div>
        <span style="color: white; font-family: var(--font-primary); font-size: 1.1rem; font-weight: 700; display: block;">Sipi Falls</span>
        <span style="color: var(--accent-gold); font-family: var(--font-primary); font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase;">Keep Sipping</span>
      </div>
      <!-- Close button -->
      <button onclick="toggleMobileMenu()"
              aria-label="Close menu"
              style="width: 36px; height: 36px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; color: white; font-size: 1.1rem; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; backdrop-filter: blur(4px);"
              onmouseover="this.style.background='rgba(232,185,35,0.25)'; this.style.borderColor='var(--accent-gold)';"
              onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.2)';">
        ✕
      </button>
    </div>

    <!-- Drawer Nav Links -->
    <nav style="flex: 1; padding: 1.5rem 1.25rem; display: flex; flex-direction: column; gap: 0.35rem;">

      <a href="/" class="drawer-link"
         style="display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 1rem; border-radius: 10px; text-decoration: none; color: white; font-family: var(--font-primary); font-size: 1rem; font-weight: 600; transition: all 0.25s; background: rgba(232,185,35,0.18); border: 1px solid rgba(232,185,35,0.3);">
        <span style="font-size: 1.1rem;">🏠</span> Home
      </a>

      <a href="/travelguide" class="drawer-link"
         style="display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 1rem; border-radius: 10px; text-decoration: none; color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 1rem; font-weight: 500; transition: all 0.25s; border: 1px solid transparent;"
         onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'; this.style.color='white';"
         onmouseout="this.style.background='transparent'; this.style.borderColor='transparent'; this.style.color='rgba(255,255,255,0.85)';">
        <span style="font-size: 1.1rem;">🗺️</span> Travel Guide
      </a>

      <a href="/about" class="drawer-link"
         style="display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 1rem; border-radius: 10px; text-decoration: none; color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 1rem; font-weight: 500; transition: all 0.25s; border: 1px solid transparent;"
         onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'; this.style.color='white';"
         onmouseout="this.style.background='transparent'; this.style.borderColor='transparent'; this.style.color='rgba(255,255,255,0.85)';">
        <span style="font-size: 1.1rem;">ℹ️</span> About Us
      </a>

      <a href="/contact" class="drawer-link"
         style="display: flex; align-items: center; gap: 0.85rem; padding: 0.85rem 1rem; border-radius: 10px; text-decoration: none; color: rgba(255,255,255,0.85); font-family: var(--font-primary); font-size: 1rem; font-weight: 500; transition: all 0.25s; border: 1px solid transparent;"
         onmouseover="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'; this.style.color='white';"
         onmouseout="this.style.background='transparent'; this.style.borderColor='transparent'; this.style.color='rgba(255,255,255,0.85)';">
        <span style="font-size: 1.1rem;">✉️</span> Contact Us
      </a>

      <!-- Divider -->
      <div style="height: 1px; background: rgba(255,255,255,0.1); margin: 0.5rem 0;"></div>

      <!-- Book CTA inside drawer -->
      <a href="/contact" class="drawer-link"
         style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; padding: 0.95rem 1rem; border-radius: 10px; text-decoration: none; color: #0a1a0a; font-family: var(--font-primary); font-size: 1rem; font-weight: 700; background: var(--accent-gold); border: 1px solid var(--accent-gold); transition: all 0.25s; margin-top: 0.25rem;"
         onmouseover="this.style.background='#fff'; this.style.borderColor='#fff';"
         onmouseout="this.style.background='var(--accent-gold)'; this.style.borderColor='var(--accent-gold)';">
        <span style="font-size: 1.1rem;">📅</span> Book a Visit
      </a>
    </nav>

    <!-- Drawer Footer -->
    <div style="padding: 1rem 1.5rem; border-top: 1px solid rgba(255,255,255,0.08); flex-shrink: 0;">
      <p style="color: rgba(255,255,255,0.35); font-family: var(--font-primary); font-size: 0.7rem; text-align: center; margin: 0; letter-spacing: 0.1em;">
        Kapchorwa, Uganda &nbsp;·&nbsp; sipifalls.com
      </p>
    </div>

    <!-- Glass shimmer bottom strip -->
    <div style="height: 2px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.12), transparent); flex-shrink: 0;"></div>
  </div>

</header>

<style>
/* Remove old full-screen mobile menu override — drawer replaces it */

/* Hamburger button: mobile only */
@media (min-width: 1024px) {
    #hamburgerBtn {
        display: none !important;
    }
}
@media (max-width: 1023px) {
  #navbarNav[style*="flex"] {
    all: unset !important;
    display: none !important;
  }
}

/* Animated hamburger → X transform */
#hamburgerBtn.is-open .ham-line:nth-child(1) {
  transform: translateY(7px) rotate(45deg);
  width: 22px !important;
}
#hamburgerBtn.is-open .ham-line:nth-child(2) {
  opacity: 0;
  transform: scaleX(0);
}
#hamburgerBtn.is-open .ham-line:nth-child(3) {
  transform: translateY(-7px) rotate(-45deg);
  width: 22px !important;
}
</style>

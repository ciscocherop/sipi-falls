<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sipi Falls - Keep Sipping!!')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (compiled) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom CSS (legacy - will be gradually replaced) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    
    <!-- Page-specific styles -->
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')
    
    <!-- Mobile Bottom Navigation -->
    <nav id="mobile-bottom-nav" style="display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--neutral-white); border-top: 1px solid rgba(0,0,0,0.1); padding: 0.5rem 0; z-index: 1000; box-shadow: 0 -4px 12px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-around; align-items: center; max-width: 100%; margin: 0 auto;">
            <a href="{{ route('home') }}" class="mobile-nav-item {{ request()->routeIs('home') ? 'active' : '' }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--neutral-gray); padding: 0.5rem; transition: all 0.3s; flex: 1; text-align: center;">
                <i class="fas fa-home" style="font-size: 1.3rem; margin-bottom: 0.25rem;"></i>
                <span style="font-size: 0.7rem; font-family: var(--font-body); font-weight: 500;">Home</span>
            </a>
            
            <a href="{{ route('travelguide') }}" class="mobile-nav-item {{ request()->routeIs('travelguide') ? 'active' : '' }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--neutral-gray); padding: 0.5rem; transition: all 0.3s; flex: 1; text-align: center;">
                <i class="fas fa-map-marked-alt" style="font-size: 1.3rem; margin-bottom: 0.25rem;"></i>
                <span style="font-size: 0.7rem; font-family: var(--font-body); font-weight: 500;">Activities</span>
            </a>
            
            <a href="{{ route('contact') }}#booking-form" class="mobile-nav-item mobile-nav-book" style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: white; background: var(--primary-green); padding: 0.75rem 1.5rem; border-radius: 2rem; margin: 0 0.5rem; transition: all 0.3s; box-shadow: 0 4px 12px rgba(26,107,26,0.3); transform: translateY(-8px);">
                <i class="fas fa-calendar-check" style="font-size: 1.5rem; margin-bottom: 0.25rem;"></i>
                <span style="font-size: 0.75rem; font-family: var(--font-body); font-weight: 600;">Book</span>
            </a>
            
            <a href="{{ route('about') }}" class="mobile-nav-item {{ request()->routeIs('about') ? 'active' : '' }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--neutral-gray); padding: 0.5rem; transition: all 0.3s; flex: 1; text-align: center;">
                <i class="fas fa-info-circle" style="font-size: 1.3rem; margin-bottom: 0.25rem;"></i>
                <span style="font-size: 0.7rem; font-family: var(--font-body); font-weight: 500;">About</span>
            </a>
            
            <a href="{{ route('contact') }}" class="mobile-nav-item {{ request()->routeIs('contact') ? 'active' : '' }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: var(--neutral-gray); padding: 0.5rem; transition: all 0.3s; flex: 1; text-align: center;">
                <i class="fas fa-envelope" style="font-size: 1.3rem; margin-bottom: 0.25rem;"></i>
                <span style="font-size: 0.7rem; font-family: var(--font-body); font-weight: 500;">Contact</span>
            </a>
        </div>
    </nav>
    
    <!-- Sticky CTA Button (Desktop) -->
    <a href="{{ route('contact') }}#booking-form" id="sticky-cta" style="position: fixed; bottom: 2rem; right: 2rem; background: linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-hover) 100%); color: white; padding: 1rem 2rem; border-radius: 3rem; text-decoration: none; font-family: var(--font-body); font-weight: 600; font-size: 1.1rem; box-shadow: 0 8px 24px rgba(26,107,26,0.4); z-index: 999; display: none; align-items: center; gap: 0.75rem; transition: all 0.3s ease; border: 2px solid transparent;"
       onmouseover="this.style.transform='translateY(-4px) scale(1.05)'; this.style.boxShadow='0 12px 32px rgba(26,107,26,0.5)'; this.style.background='linear-gradient(135deg, var(--accent-gold) 0%, #e8b923 100%)'; this.style.borderColor='var(--accent-gold)';"
       onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 8px 24px rgba(26,107,26,0.4)'; this.style.background='linear-gradient(135deg, var(--primary-green) 0%, var(--primary-green-hover) 100%)'; this.style.borderColor='transparent';">
        <i class="fas fa-calendar-check" style="font-size: 1.3rem;"></i>
        <span>Book Your Adventure</span>
        <div style="width: 8px; height: 8px; background: var(--accent-gold); border-radius: 50%; animation: pulse 2s infinite;"></div>
    </a>
    
    <style>
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.3);
            }
        }
        
        .mobile-nav-item.active {
            color: var(--primary-green) !important;
        }
        
        .mobile-nav-item:not(.mobile-nav-book):hover {
            color: var(--primary-green) !important;
            transform: translateY(-2px);
        }
        
        .mobile-nav-book:hover {
            background: var(--accent-gold) !important;
            transform: translateY(-10px) scale(1.05) !important;
        }
        
        @media (max-width: 768px) {
            #mobile-bottom-nav {
                display: block !important;
            }
            
            /* Hide sticky CTA on mobile (use bottom nav instead) */
            #sticky-cta {
                display: none !important;
            }
            
            /* Add padding to main content to prevent overlap */
            #main-content {
                padding-bottom: 80px;
            }
        }
        
        @media (min-width: 769px) {
            #sticky-cta {
                display: flex !important;
            }
        }
    </style>
    
    <script>
        // Sticky CTA Button - Show after scrolling past hero
        window.addEventListener('scroll', function() {
            const stickyCta = document.getElementById('sticky-cta');
            const scrollPosition = window.scrollY;
            
            // Show after scrolling 600px (past hero section)
            if (scrollPosition > 600) {
                stickyCta.style.display = 'flex';
                stickyCta.style.animation = 'slideInRight 0.5s ease';
            } else {
                stickyCta.style.display = 'none';
            }
        });
        
        // Add slide-in animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translateX(100px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }
        `;
        document.head.appendChild(style);
    </script>
    
    <!-- Main Content -->
    <div id="main-content" style="position: relative; z-index: 1; background: var(--neutral-offwhite);">
        @yield('content')
    </div>
    
    <!-- Footer -->
    <div id="sticky-footer-wrapper" style="position: sticky; bottom: 0; z-index: 0;">
        @include('partials.footer')
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- Scroll Reveal Animation -->
    <script>
    // Scroll Reveal Animation
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -50px 0px'
    });

    // Observe all reveal elements
    document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-children')
        .forEach(el => revealObserver.observe(el));

    // Stats Counter Animation
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                const target = parseInt(entry.target.dataset.target);
                const suffix = entry.target.dataset.suffix || '';
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    entry.target.textContent = Math.floor(current).toLocaleString() + suffix;
                }, 16);
            }
        });
    }, { threshold: 0.3 });

    counters.forEach(counter => counterObserver.observe(counter));
    </script>
    
    <!-- Page-specific scripts -->
    @stack('scripts')
</body>
</html>

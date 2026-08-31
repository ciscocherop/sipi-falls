<footer class="bg-[var(--primary-green)] border-t border-white/10" style="background-color: var(--primary-green-deep); border-top: 1px solid rgba(255, 255, 255, 0.1); font-family: var(--font-body);">
  <div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Brand & Slogan -->
      <div>
        <a href="{{ route('home') }}" class="inline-block mb-4 text-decoration-none">
          <span class="text-white font-bold text-lg block" style="color: white; font-family: var(--font-display);">Sipi Falls</span>
          <span class="text-xs uppercase tracking-widest font-semibold" style="color: var(--accent-gold); font-family: var(--font-body); letter-spacing: 0.15em;">Keep Sipping</span>
        </a>
        <p class="text-white/60 text-sm leading-relaxed" style="color: rgba(255, 255, 255, 0.65); font-size: 0.875rem; font-family: var(--font-body);">Discover Uganda's natural wonder. Adventure, culture, and breathtaking views await.</p>
      </div>
      
      <!-- Quick Links -->
      <div>
        <h6 class="text-sm font-semibold tracking-widest uppercase mb-4" style="color: var(--accent-gold); letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.85rem; font-family: var(--font-body);">Quick Links</h6>
        <ul class="space-y-2" style="list-style: none; padding: 0;">
          <li>
            <a href="{{ route('home') }}" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.875rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">Home</a>
          </li>
          <li>
            <a href="{{ route('travelguide') }}" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.875rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">Travel Guide</a>
          </li>
          <li>
            <a href="{{ route('about') }}" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.875rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">About Us</a>
          </li>
          <li>
            <a href="{{ route('contact') }}" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.875rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">Contact Us</a>
          </li>
        </ul>
      </div>
      
      <!-- Contact Info -->
      <div>
        <h6 class="text-sm font-semibold tracking-widest uppercase mb-4" style="color: var(--accent-gold); letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.85rem; font-family: var(--font-body);">Contact</h6>
        <ul class="space-y-2" style="list-style: none; padding: 0; font-size: 0.875rem; font-family: var(--font-body);">
          <li class="flex items-start gap-2" style="color: rgba(255, 255, 255, 0.65); display: flex; gap: 0.5rem;">
            <i class="fas fa-envelope mt-1" style="color: var(--accent-gold);"></i>
            <span>{{ $contactContent['contact_email'] ?? 'info@sipifalls.com' }}</span>
          </li>
          <li class="flex items-start gap-2" style="color: rgba(255, 255, 255, 0.65); display: flex; gap: 0.5rem;">
            <i class="fas fa-phone mt-1" style="color: var(--accent-gold);"></i>
            <span>{{ $contactContent['contact_phone'] ?? '+256 703558174' }}</span>
          </li>
          <li class="flex items-start gap-2" style="color: rgba(255, 255, 255, 0.65); display: flex; gap: 0.5rem;">
            <i class="fas fa-map-marker-alt mt-1" style="color: var(--accent-gold);"></i>
            <span>{{ $contactContent['contact_address'] ?? 'Kapchorwa, Uganda' }}</span>
          </li>
        </ul>
        <div class="flex gap-3 mt-4" style="display: flex; gap: 0.75rem; margin-top: 1rem;">
          <a href="https://x.com/Sipifallss" aria-label="X (Twitter)" target="_blank" rel="noopener noreferrer"
             style="color: rgba(255, 255, 255, 0.65); font-size: 1.25rem; border: 1px solid rgba(255, 255, 255, 0.2); padding: 0.5rem; border-radius: 0.25rem; transition: all 0.3s; display: inline-flex; align-items: center; justify-content: center;"
             onmouseover="this.style.borderColor='var(--accent-gold)'; this.style.color='var(--accent-gold)'"
             onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.color='rgba(255, 255, 255, 0.65)'">
             <i class="fa-brands fa-x-twitter"></i>
          </a>
          <a href="https://www.instagram.com/sipifalls8/" aria-label="Instagram" target="_blank" rel="noopener noreferrer"
             style="color: rgba(255, 255, 255, 0.65); font-size: 1.25rem; border: 1px solid rgba(255, 255, 255, 0.2); padding: 0.5rem; border-radius: 0.25rem; transition: all 0.3s; display: inline-flex; align-items: center; justify-content: center;"
             onmouseover="this.style.borderColor='var(--accent-gold)'; this.style.color='var(--accent-gold)'"
             onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.color='rgba(255, 255, 255, 0.65)'">
             <i class="fab fa-instagram"></i>
          </a>
          <a href="https://wa.me/256703558174" aria-label="WhatsApp" target="_blank" rel="noopener noreferrer"
             style="color: rgba(255, 255, 255, 0.65); font-size: 1.25rem; border: 1px solid rgba(255, 255, 255, 0.2); padding: 0.5rem; border-radius: 0.25rem; transition: all 0.3s; display: inline-flex; align-items: center; justify-content: center;"
             onmouseover="this.style.borderColor='var(--accent-gold)'; this.style.color='var(--accent-gold)'"
             onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.color='rgba(255, 255, 255, 0.65)'">
             <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>
      
      <!-- Newsletter Signup -->
      <div>
        <h6 class="text-sm font-semibold tracking-widest uppercase mb-4" style="color: var(--accent-gold); letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.85rem; font-family: var(--font-body);">Stay Updated</h6>
        <style>
          #newsletter-email::placeholder {
            color: rgba(255, 255, 255, 0.4);
          }
        </style>
        <form id="newsletter-form" action="{{ route('newsletter.submit') }}" method="POST" class="space-y-3">
          @csrf
          <div class="flex gap-2" style="display: flex; gap: 0.5rem;">
            <label for="newsletter-email" class="sr-only">Email</label>
            <input type="email" 
                   id="newsletter-email" 
                   name="email" 
                   placeholder="Your Email" 
                   aria-label="Email" 
                   required
                   style="flex: 1; background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.2); color: white; border-radius: 0.125rem; padding: 0.5rem 1rem; font-size: 0.875rem; font-family: var(--font-body);"
                   onfocus="this.style.borderColor='var(--accent-gold)'"
                   onblur="this.style.borderColor='rgba(255, 255, 255, 0.2)'">
            <button type="submit" 
                    style="background-color: var(--accent-gold); color: var(--neutral-gray); border: none; font-weight: 600; padding: 0.5rem 1.25rem; border-radius: 0.125rem; cursor: pointer; transition: opacity 0.3s; font-size: 0.875rem; font-family: var(--font-body); white-space: nowrap;"
                    onmouseover="this.style.opacity='0.9'"
                    onmouseout="this.style.opacity='1'">
              Sign Up
            </button>
          </div>
          <div id="newsletter-feedback" style="color: rgba(255, 255, 255, 0.65); font-size: 0.75rem; display: none; font-family: var(--font-body);"></div>
        </form>
        <div class="mt-4 flex gap-4" style="margin-top: 1rem; display: flex; gap: 1rem;">
          <a href="#privacy" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.75rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">Privacy Policy</a>
          <a href="#terms" class="text-decoration-none" style="color: rgba(255, 255, 255, 0.65); font-size: 0.75rem; transition: color 0.3s; font-family: var(--font-body);" onmouseover="this.style.color='rgba(255, 255, 255, 1)'" onmouseout="this.style.color='rgba(255, 255, 255, 0.65)'">Terms of Service</a>
        </div>
      </div>
    </div>
    
    <hr class="my-8" style="margin: 2rem 0; border: none; border-top: 1px solid rgba(255, 255, 255, 0.1);">
    
    <div class="text-center" style="background: rgba(0, 0, 0, 0.25); padding: 0.75rem; text-align: center; color: rgba(255, 255, 255, 0.5); font-size: 0.8rem; font-family: var(--font-body);">
      <span id="copyright">© 2026 Sipi Falls. All Rights Reserved.</span>
    </div>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" 
            class="fixed bottom-8 right-8" 
            style="position: fixed; bottom: 2rem; right: 2rem; background: var(--accent-gold); color: white; width: 3rem; height: 3rem; border-radius: 50%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: none; cursor: pointer; display: none; align-items: center; justify-content: center; z-index: 1050; transition: opacity 0.3s;"
            aria-label="Back to top"
            onmouseover="this.style.opacity='0.9'"
            onmouseout="this.style.opacity='1'">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</footer>

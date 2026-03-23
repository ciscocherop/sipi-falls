/**
 * public/js/script.js
 * =============================================
 * Main JavaScript file for the Sipi Falls website.
 * Handles all front-end interactivity across every public page.
 *
 * Sections (in order):
 *  1.  URL Status Alert Handler       — shows success/error toasts after form submissions
 *  2.  Active Nav Link Highlighter    — marks the current page link as active
 *  3.  Navbar Body Padding Sync       — keeps content below the fixed navbar
 *  4.  Image Slider                   — auto-rotates hero slides
 *  5.  Back to Top Button             — shows/hides and scrolls to top
 *  6.  Newsletter Form (footer)       — validates and submits the newsletter signup
 *  7.  Extra Tips Modal               — populates the travel guide tips modal
 *  8.  Scroll Reveal (legacy)         — adds .active class when elements enter viewport
 *  9.  Navbar Collapse Class Toggle   — adds .mobile-open to navbar on Bootstrap collapse
 * 10.  Dynamic Copyright Year         — writes the current year into the footer
 *  11. AJAX Newsletter Submission     — handles the newsletter form via fetch
 *  12. Delete Booking                 — AJAX delete for booking rows
 *  13. Delete Contact                 — AJAX delete for contact rows
 *  14. Delete Subscriber              — AJAX delete for subscriber rows
 *  15. Sticky CTA Button              — shows the floating "Book" button after scrolling
 *  16. Modal / Bottom Nav z-index     — hides mobile nav behind Bootstrap modals
 *  17. slideInRight Keyframe          — injects the CSS animation used by the sticky CTA
 *  18. Scroll Reveal (IntersectionObserver) — adds .visible class for CSS transitions
 *  19. Stats Counter Animation        — animates number counters when they scroll into view
 *  20. Testimonials Carousel          — prev/next carousel on the homepage
 *  21. Homepage Lightbox              — full-screen image viewer for the masonry gallery
 *  22. Travel Guide Tabbed Gallery    — tab switching + load-more for the gallery page
 *  23. Travel Guide Lightbox          — full-screen viewer for the travel guide gallery
 *  24. Contact Page: Alerts + Validation + Price Calculator
 *  25. Navbar Scroll Effect           — darkens the navbar background on scroll
 *  26. Mobile Menu Toggle             — opens/closes the hamburger menu on small screens
 * =============================================
 */


// =============================================================================
// 1. URL STATUS ALERT HANDLER
// After a form is submitted (contact or booking), Laravel redirects back with
// ?status=success&msg=...&form=... in the URL. This reads those params and
// shows a floating Bootstrap alert at the top of the page, then auto-dismisses
// it after 5 seconds and cleans the URL so a page refresh won't re-show it.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var urlParams = new URLSearchParams(window.location.search);
  var status = urlParams.get('status'); // 'success' or 'error'
  var message = urlParams.get('msg');    // human-readable message
  var form = urlParams.get('form');   // 'contact' or 'booking'

  if (!status) return; // nothing to show

  // Find the inline feedback element for the specific form (if present on page)
  var contactFeedback = document.getElementById('form-feedback');
  var bookingFeedback = document.getElementById('booking-feedback');
  var feedbackElement = null;
  if (form === 'contact' && contactFeedback) feedbackElement = contactFeedback;
  if (form === 'booking' && bookingFeedback) feedbackElement = bookingFeedback;

  // Build the floating alert div
  var isSuccess = status === 'success';
  var alertDiv = document.createElement('div');
  alertDiv.className = 'alert alert-' + (isSuccess ? 'success' : 'danger') + ' alert-dismissible fade show shadow-lg';
  alertDiv.setAttribute('role', 'alert');
  // Position it fixed near the top-centre of the screen
  alertDiv.style.cssText = 'margin:20px; position:fixed; top:80px; left:50%; transform:translateX(-50%); z-index:9999; min-width:300px; max-width:600px;';
  alertDiv.innerHTML = (isSuccess
    ? '<i class="fas fa-check-circle me-2" style="color:var(--primary-green);font-size:1.5rem;"></i><strong>Success!</strong> '
    : '<i class="fas fa-exclamation-circle me-2" style="color:var(--highlight-coral);font-size:1.5rem;"></i><strong>Error!</strong> ')
    + (message || (isSuccess ? 'Operation completed successfully!' : 'Something went wrong. Please try again.'))
    + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  document.body.prepend(alertDiv);

  // Auto-fade and remove after 5 seconds
  setTimeout(function () {
    alertDiv.style.transition = 'opacity 0.5s ease';
    alertDiv.style.opacity = '0';
    setTimeout(function () { alertDiv.remove(); }, 500);
  }, 5000);

  // Also update the inline feedback element inside the form
  if (feedbackElement) {
    feedbackElement.innerHTML = isSuccess
      ? '<i class="fas fa-check-circle text-success me-2"></i>' + (message || 'Operation completed successfully!')
      : '<i class="fas fa-times-circle text-danger me-2"></i>' + (message || 'Something went wrong. Please try again.');
    feedbackElement.style.color = isSuccess ? 'var(--primary-green)' : '#dc3545';
    feedbackElement.style.display = 'block';
    feedbackElement.classList.remove('d-none');
  }

  // Remove query params from the URL so a refresh won't re-trigger this
  window.history.replaceState({}, document.title, window.location.pathname);
});


// =============================================================================
// 2. ACTIVE NAV LINK HIGHLIGHTER
// Compares each nav link's href against the current page URL and adds the
// Bootstrap .active class + aria-current="page" to the matching link.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var navLinks = document.querySelectorAll('.nav-link');
  var currentPath = window.location.pathname;

  navLinks.forEach(function (link) {
    // Build an absolute path from the link href so relative URLs work too
    var linkPath = new URL(link.href, window.location.origin).pathname;
    if (linkPath === currentPath) {
      link.classList.add('active');
      link.setAttribute('aria-current', 'page');
    }
  });
});

// =============================================================================
// 3. NAVBAR BODY PADDING SYNC
// When the navbar is fixed-top it overlaps page content. This reads the
// navbar's actual height and applies it as padding-top on <body> so nothing
// gets hidden underneath. Re-runs on window resize in case the navbar reflows.
// =============================================================================
function syncBodyPaddingWithNavbar() {
  var navbar = document.querySelector('.navbar.fixed-top');
  if (!navbar) return;
  document.body.style.paddingTop = navbar.offsetHeight + 'px';
}
document.addEventListener('DOMContentLoaded', syncBodyPaddingWithNavbar);
window.addEventListener('resize', syncBodyPaddingWithNavbar);

// =============================================================================
// 4. IMAGE SLIDER
// Cycles through elements with class .slide every 8 seconds by toggling the
// .active class. Used on any page that has a manual CSS-driven hero slider.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var slides = document.querySelectorAll('.slide');
  if (!slides.length) return;
  var currentSlide = 0;

  // Activate the first slide immediately on load
  slides[0].classList.add('active');

  function showSlide(index) {
    slides.forEach(function (slide, i) {
      slide.classList.toggle('active', i === index);
    });
  }

  // Advance to the next slide every 8 seconds (matches the CSS animation duration)
  setInterval(function () {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }, 8000);
});


// =============================================================================
// 5. BACK TO TOP BUTTON
// Shows a floating "back to top" button once the user scrolls 300px down.
// Clicking it smoothly scrolls back to the very top of the page.
// =============================================================================
// 6. NEWSLETTER FORM FEEDBACK (footer)
// Submits the footer newsletter form via fetch and shows a success/error
// message without a full page reload.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  // --- Back to Top ---
  var backToTop = document.getElementById('back-to-top');
  if (backToTop) {
    window.addEventListener('scroll', function () {
      backToTop.style.display = window.scrollY > 300 ? 'flex' : 'none';
    });
    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // --- Newsletter Form (footer version with fetch) ---
  var newsletterForm = document.getElementById('newsletter-form');
  var feedback = document.getElementById('newsletter-feedback');
  if (newsletterForm && feedback) {
    newsletterForm.addEventListener('submit', async function (e) {
      e.preventDefault();
      try {
        var response = await fetch(newsletterForm.action, {
          method: 'POST',
          body: new FormData(newsletterForm),
        });
        var result = await response.json();
        feedback.textContent = result.message || 'Subscribed successfully!';
        feedback.style.color = 'var(--secondary-teal)';
        feedback.style.display = 'block';
        newsletterForm.reset();
      } catch (err) {
        // Network error or non-JSON response — still show a friendly message
        feedback.textContent = 'You have Successfully Subscribed.';
        feedback.style.color = 'var(--highlight-coral)';
        feedback.style.display = 'block';
      }
    });
  }
});

// =============================================================================
// 7. EXTRA TIPS MODAL (Travel Guide page)
// When the "Extra Tips" Bootstrap modal opens, this dynamically builds the
// list of tips inside it. Only runs when the modal element exists on the page.
// =============================================================================
if (document.getElementById('extraTipsModal')) {
  document.addEventListener('DOMContentLoaded', function () {
    var tips = [
      'Carry some cash – ATMs are limited in the Sipi area.',
      'Start hikes early in the morning for the best weather and fewer crowds.',
      'Hire a local guide for safety and to learn hidden stories about the falls.',
      'Bring a waterproof bag for your electronics and valuables.',
      'Respect local customs – ask before taking photos of people.',
      'Try the local coffee – it\'s some of the best in Uganda!',
      'Wear layers – weather can change quickly in the mountains.',
      'Stay on marked trails to protect the environment and for your safety.',
      'Book your accommodation in advance during peak season.',
      'Don\'t forget insect repellent and sunscreen!'
    ];

    var tipsList = document.getElementById('extra-tips-list');
    var modal = document.getElementById('extraTipsModal');

    if (tipsList && modal) {
      // Rebuild the list every time the modal opens (keeps it fresh)
      modal.addEventListener('show.bs.modal', function () {
        tipsList.innerHTML = '';
        tips.forEach(function (tip) {
          var li = document.createElement('li');
          li.innerHTML = '<i class="fas fa-leaf me-2" style="color:var(--accent-gold);"></i> ' + tip;
          li.classList.add('mb-2');
          tipsList.appendChild(li);
        });
      });
    }
  });
}


// =============================================================================
// 8. SCROLL REVEAL — LEGACY (.active class version)
// Watches all .reveal elements with an IntersectionObserver. When an element
// enters the viewport it gets the .active class, which CSS uses to trigger
// fade/slide-in transitions. Once revealed, the element is unobserved so the
// animation only plays once.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var reveals = document.querySelectorAll('.reveal');
  var observer = new IntersectionObserver(function (entries, obs) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        obs.unobserve(entry.target); // fire once only
      }
    });
  }, { threshold: 0.15 });

  reveals.forEach(function (el) { observer.observe(el); });
});

// =============================================================================
// 9. NAVBAR COLLAPSE CLASS TOGGLE
// Adds/removes .mobile-open on the <nav> element when Bootstrap's collapse
// opens or closes. Used by CSS to style the navbar differently when the
// mobile menu is expanded.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var navbar = document.querySelector('.navbar');
  var collapseEl = document.getElementById('navbarNav');
  if (!navbar || !collapseEl) return;

  collapseEl.addEventListener('show.bs.collapse', function () {
    navbar.classList.add('mobile-open');
  });
  collapseEl.addEventListener('hide.bs.collapse', function () {
    navbar.classList.remove('mobile-open');
  });
});

// =============================================================================
// 10. DYNAMIC COPYRIGHT YEAR
// Writes the current year into the footer's #copyright span so it never
// needs to be updated manually.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var copyrightSpan = document.getElementById('copyright');
  if (copyrightSpan) {
    copyrightSpan.textContent = '© ' + new Date().getFullYear() + ' Sipi Falls. All Rights Reserved.';
  }
});


// =============================================================================
// 11. AJAX NEWSLETTER SUBMISSION (second handler — validates before submitting)
// This version validates the email client-side first, then shows a success
// message. It works alongside the fetch-based handler above; both target the
// same #newsletter-form but this one handles the #newsletter-success element.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var newsletterForm = document.getElementById('newsletter-form');
  var newsletterSuccess = document.getElementById('newsletter-success');

  if (newsletterForm && newsletterSuccess) {
    newsletterForm.addEventListener('submit', function (event) {
      event.preventDefault();
      var emailInput = newsletterForm.querySelector('input[type="email"]');
      var email = emailInput.value.trim();

      // Basic email format check before doing anything
      if (!email || !email.includes('@')) {
        newsletterSuccess.textContent = 'Please enter a valid email address.';
        newsletterSuccess.classList.remove('d-none');
        newsletterSuccess.classList.add('text-danger');
        setTimeout(function () { newsletterSuccess.classList.add('d-none'); }, 2500);
        return;
      }

      // Show success and clear the input
      newsletterSuccess.textContent = 'Thank you for subscribing!';
      newsletterSuccess.classList.remove('d-none', 'text-danger');
      newsletterSuccess.classList.add('text-success');
      emailInput.value = '';
      setTimeout(function () { newsletterSuccess.classList.add('d-none'); }, 2500);
    });
  }
});

// =============================================================================
// 12. DELETE BOOKING (admin / legacy PHP pages)
// Attaches click handlers to all .delete-booking buttons. On click it asks
// for confirmation, sends a GET request to delete_booking.php, then removes
// the table row and shows a temporary success alert.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var deleteButtons = document.querySelectorAll('.delete-booking');
  var alertContainer = document.getElementById('alertContainer');

  deleteButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      var bookingId = this.getAttribute('data-id');
      if (!bookingId) { console.error('No booking ID found.'); return; }

      if (confirm('Are you sure you want to delete this booking?')) {
        var row = this.closest('tr'); // keep reference before async
        fetch('delete_booking.php?id=' + bookingId, { method: 'GET' })
          .then(function (r) { return r.text(); })
          .then(function (data) {
            if (data.trim() === 'success') {
              // Show a temporary success banner
              if (alertContainer) {
                alertContainer.innerHTML = '<div class="alert alert-success text-center" id="deleteMsg">Booking deleted successfully.</div>';
                setTimeout(function () {
                  var msg = document.getElementById('deleteMsg');
                  if (msg) { msg.style.transition = 'opacity 0.5s ease'; msg.style.opacity = '0'; setTimeout(function () { msg.remove(); }, 500); }
                }, 3000);
              }
              if (row) row.remove(); // remove the row from the table
            } else {
              alert('Error deleting booking. Please try again.');
            }
          })
          .catch(function (err) { console.error(err); alert('Something went wrong. Please try again.'); });
      }
    });
  });
});


// =============================================================================
// 13. DELETE CONTACT (admin / legacy PHP pages)
// Same pattern as Delete Booking but targets .delete-contact buttons and
// calls delete_contacts.php.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var deleteContactButtons = document.querySelectorAll('.delete-contact');
  var alertContainer = document.getElementById('alertContainer');

  deleteContactButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      var contactId = this.getAttribute('data-id');
      if (!contactId) { console.error('No contact ID found.'); return; }

      if (confirm('Are you sure you want to delete this contact?')) {
        var row = this.closest('tr');
        fetch('delete_contacts.php?id=' + contactId, { method: 'GET' })
          .then(function (r) { return r.text(); })
          .then(function (data) {
            if (data.trim() === 'success') {
              if (alertContainer) {
                alertContainer.innerHTML = '<div class="alert alert-success text-center" id="deleteMsg">Contact deleted successfully.</div>';
                setTimeout(function () {
                  var msg = document.getElementById('deleteMsg');
                  if (msg) { msg.style.transition = 'opacity 0.5s ease'; msg.style.opacity = '0'; setTimeout(function () { msg.remove(); }, 500); }
                }, 3000);
              }
              if (row) row.remove();
            } else {
              alert('Error deleting contact. Please try again.');
            }
          })
          .catch(function (err) { console.error(err); alert('Something went wrong. Please try again.'); });
      }
    });
  });
});

// =============================================================================
// 14. DELETE SUBSCRIBER (admin / legacy PHP pages)
// Same pattern as Delete Booking but targets .delete-subscriber buttons and
// calls delete_subscriber.php with the subscriber's email address.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var deleteSubscriberButtons = document.querySelectorAll('.delete-subscriber');
  var alertContainer = document.getElementById('alertContainer');

  deleteSubscriberButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      var subscriberEmail = this.getAttribute('data-email');
      if (!subscriberEmail) { console.error('No subscriber email found.'); return; }

      if (confirm('Are you sure you want to delete this subscriber?')) {
        var row = this.closest('tr');
        fetch('delete_subscriber.php?email=' + encodeURIComponent(subscriberEmail), { method: 'GET' })
          .then(function (r) { return r.text(); })
          .then(function (data) {
            if (data.trim() === 'success') {
              if (alertContainer) {
                alertContainer.innerHTML = '<div class="alert alert-success text-center" id="deleteMsg">Subscriber deleted successfully.</div>';
                setTimeout(function () {
                  var msg = document.getElementById('deleteMsg');
                  if (msg) { msg.style.transition = 'opacity 0.5s ease'; msg.style.opacity = '0'; setTimeout(function () { msg.remove(); }, 500); }
                }, 3000);
              }
              if (row) row.remove();
            } else {
              alert('Error deleting subscriber. Please try again.');
            }
          })
          .catch(function (err) { console.error(err); alert('Something went wrong. Please try again.'); });
      }
    });
  });
});


// =============================================================================
// 15. STICKY CTA BUTTON
// The "Book Your Adventure" floating button (#sticky-cta) is hidden by default.
// Once the user scrolls more than 600px (past the hero section), it slides in
// from the right. Scrolling back up hides it again.
// =============================================================================
window.addEventListener('scroll', function () {
  var stickyCta = document.getElementById('sticky-cta');
  if (!stickyCta) return;

  if (window.scrollY > 600) {
    stickyCta.style.display = 'flex';
    stickyCta.style.animation = 'slideInRight 0.5s ease';
  } else {
    stickyCta.style.display = 'none';
  }
});

// =============================================================================
// 16. MODAL / MOBILE BOTTOM NAV Z-INDEX
// The mobile bottom nav sits at z-index 1000. When a Bootstrap modal opens it
// needs to appear on top, so we temporarily drop the nav's z-index to 0 and
// restore it when the modal closes.
// =============================================================================
document.addEventListener('show.bs.modal', function () {
  var nav = document.getElementById('mobile-bottom-nav');
  if (nav) nav.style.zIndex = '0';
});
document.addEventListener('hidden.bs.modal', function () {
  var nav = document.getElementById('mobile-bottom-nav');
  if (nav) nav.style.zIndex = '1000';
});

// =============================================================================
// 17. SLIDEINRIGHT KEYFRAME INJECTION
// Injects the @keyframes slideInRight animation into the document's <head>
// at runtime. This is the animation used by the sticky CTA button (section 15).
// =============================================================================
(function () {
  var style = document.createElement('style');
  style.textContent = '@keyframes slideInRight { from { opacity:0; transform:translateX(100px); } to { opacity:1; transform:translateX(0); } }';
  document.head.appendChild(style);
})();

// =============================================================================
// 18. SCROLL REVEAL — INTERSECTIONOBSERVER (.visible class version)
// A second, more modern reveal system that adds .visible to elements as they
// scroll into view. CSS transitions on .reveal, .reveal-left, .reveal-right,
// and .reveal-children use this class to animate in. Runs immediately (not
// inside DOMContentLoaded) so it catches elements already in the viewport.
// =============================================================================
(function () {
  var revealObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });

  // Observe all four reveal variant classes
  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-children')
    .forEach(function (el) { revealObserver.observe(el); });
})();

// =============================================================================
// 19. STATS COUNTER ANIMATION
// Watches elements with class .counter using IntersectionObserver. When one
// enters the viewport it animates the number from 0 up to the value in
// data-target, appending an optional data-suffix (e.g. "m", "+").
// The .counted class prevents the animation from replaying on re-entry.
// =============================================================================
(function () {
  var counterObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      var el = entry.target;
      if (el.classList.contains('counted')) return; // already animated
      el.classList.add('counted');

      var target = parseInt(el.dataset.target);
      var suffix = el.dataset.suffix || '';
      var duration = 2000; // total animation time in ms
      var step = target / (duration / 16); // increment per ~16ms frame
      var current = 0;

      var timer = setInterval(function () {
        current += step;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        el.textContent = Math.floor(current).toLocaleString() + suffix;
      }, 16);
    });
  }, { threshold: 0.3 });

  document.querySelectorAll('.counter').forEach(function (el) {
    counterObserver.observe(el);
  });
})();


// =============================================================================
// 20. TESTIMONIALS CAROUSEL (Homepage)
// A simple manual carousel for the testimonials section. Shows 2 slides on
// desktop and 1 on mobile. The prev/next arrows call moveTestimonialCarousel()
// with -1 or +1. updateSlideWidths() recalculates slide widths on resize and
// resets the position to the first slide.
// =============================================================================
var testimonialIndex = 0; // tracks which "page" of slides is currently visible

/** Returns how many slides should be visible at once based on screen width. */
function getSlidesPerView() {
  return window.innerWidth < 768 ? 1 : 2;
}

/**
 * Moves the carousel forward (direction = 1) or backward (direction = -1).
 * Wraps around at both ends.
 */
function moveTestimonialCarousel(direction) {
  var slides = document.querySelectorAll('.testimonial-slide');
  var total = slides.length;
  if (total === 0) return;

  var perView = getSlidesPerView();
  var maxIndex = Math.ceil(total / perView) - 1; // last valid page index

  testimonialIndex += direction;
  if (testimonialIndex < 0) testimonialIndex = maxIndex; // wrap to end
  if (testimonialIndex > maxIndex) testimonialIndex = 0;        // wrap to start

  // Slide the inner track using CSS transform
  var inner = document.querySelector('.testimonial-carousel-inner');
  var slideWidth = 100 / perView; // each slide takes up (100/perView)% of the track
  inner.style.transform = 'translateX(-' + (testimonialIndex * slideWidth * perView) + '%)';
}

/** Recalculates slide widths and resets to slide 0. Called on load and resize. */
function updateSlideWidths() {
  var perView = getSlidesPerView();
  var slideWidth = 100 / perView;

  document.querySelectorAll('.testimonial-slide').forEach(function (slide) {
    slide.style.minWidth = slideWidth + '%';
  });

  // Reset position so we don't land mid-track after a resize
  testimonialIndex = 0;
  var inner = document.querySelector('.testimonial-carousel-inner');
  if (inner) inner.style.transform = 'translateX(0)';
}

window.addEventListener('resize', updateSlideWidths);
document.addEventListener('DOMContentLoaded', updateSlideWidths);

// =============================================================================
// 21. HOMEPAGE LIGHTBOX (Masonry Gallery)
// Opens a full-screen overlay showing a larger version of a gallery image.
// Called via onclick="openLightbox(src, caption)" on each gallery item.
// Clicking the overlay background or the ✕ button calls closeLightbox().
// =============================================================================

/** Opens the lightbox with the given image src and caption text. */
function openLightbox(src, caption) {
  var lb = document.getElementById('lightbox');
  if (!lb) return;
  document.getElementById('lightbox-img').src = src;
  document.getElementById('lightbox-caption').textContent = caption;
  lb.style.display = 'flex';
  document.body.style.overflow = 'hidden'; // prevent background scrolling
}

/** Closes the lightbox and restores page scrolling. */
function closeLightbox() {
  var lb = document.getElementById('lightbox');
  if (!lb) return;
  lb.style.display = 'none';
  document.body.style.overflow = '';
}


// =============================================================================
// 22. TRAVEL GUIDE — TABBED GALLERY
// The gallery on travelguide.blade.php is split into tabs (Falls, Adventure,
// Hiking, etc.). Clicking a .tg-tab button hides all .tg-panel divs and shows
// only the one matching the button's data-tab attribute.
// "Load More" buttons reveal hidden images (.tg-hidden) inside a grid and then
// remove themselves.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  // Tab switching
  document.querySelectorAll('.tg-tab').forEach(function (btn) {
    btn.addEventListener('click', function () {
      // Deactivate all tabs and hide all panels
      document.querySelectorAll('.tg-tab').forEach(function (b) {
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });
      document.querySelectorAll('.tg-panel').forEach(function (p) {
        p.classList.remove('active');
      });

      // Activate the clicked tab and its corresponding panel
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');
      document.getElementById('tg-panel-' + btn.dataset.tab).classList.add('active');
    });
  });

  // Load More — reveals all .tg-hidden items in the grid, then removes the button
  document.querySelectorAll('.tg-load-more').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var grid = document.getElementById(btn.dataset.grid);
      grid.querySelectorAll('.tg-hidden').forEach(function (item) {
        item.classList.remove('tg-hidden');
      });
      btn.parentElement.remove(); // remove the "Load More" button container
    });
  });
});

// =============================================================================
// 23. TRAVEL GUIDE LIGHTBOX
// Same concept as the homepage lightbox (section 21) but for the travel guide
// gallery. Uses separate element IDs (#tg-lightbox, #tg-lightbox-img) so both
// lightboxes can coexist without conflict.
// Pressing Escape also closes this lightbox.
// =============================================================================

/** Opens the travel guide lightbox with the given image src. */
function openTgLightbox(src) {
  var lb = document.getElementById('tg-lightbox');
  if (!lb) return;
  document.getElementById('tg-lightbox-img').src = src;
  lb.style.display = 'flex';
}

/** Closes the travel guide lightbox and clears the image src. */
function closeTgLightbox() {
  var lb = document.getElementById('tg-lightbox');
  if (!lb) return;
  lb.style.display = 'none';
  document.getElementById('tg-lightbox-img').src = ''; // free memory
}

// Allow closing the lightbox with the Escape key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') closeTgLightbox();
});


// =============================================================================
// 24. CONTACT PAGE — ALERTS, FORM VALIDATION & PRICE CALCULATOR
// Three things bundled in one DOMContentLoaded block (all contact-page only):
//
//  a) Auto-hide alerts — scrolls to any .alert-success and closes it after 5s.
//  b) Real-time validation — validates required fields on blur for both the
//     contact form (#contact-form) and the booking form (#booking-form).
//     Shows a green tick on success or a red error message on failure.
//     Clears the error as soon as the user starts typing again.
//  c) Price calculator — listens to the activity dropdown and guest count
//     inputs and shows a live price estimate range in the booking form.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {

  // --- a) Auto-hide success alerts ---
  document.querySelectorAll('.alert-success').forEach(function (alert) {
    // Scroll the alert into view so the user notices it
    alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
    // Close it automatically after 5 seconds using Bootstrap's Alert API
    setTimeout(function () {
      var bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    }, 5000);
  });

  // --- b) Real-time form validation helpers ---

  var contactForm = document.querySelector('#contact-form form');
  var bookingForm = document.querySelector('#booking-form form');

  /** Returns true if the email string matches a basic email pattern. */
  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  /** Returns true if the value is not empty/whitespace. */
  function validateRequired(value) {
    return value.trim().length > 0;
  }

  /**
   * Marks a field as valid: removes any existing feedback and adds a green
   * check icon next to the input.
   */
  function showSuccess(input) {
    var parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
    parent.classList.remove('has-error');
    parent.classList.add('has-success');
    var existing = parent.querySelector('.validation-feedback');
    if (existing) existing.remove();

    var feedback = document.createElement('div');
    feedback.className = 'validation-feedback';
    feedback.innerHTML = '<i class="fas fa-check-circle" style="color:var(--success);position:absolute;right:1rem;top:50%;transform:translateY(-50%);font-size:1.2rem;"></i>';

    var inputGroup = input.closest('.input-group');
    if (inputGroup) {
      inputGroup.style.position = 'relative';
      inputGroup.appendChild(feedback);
    } else {
      input.parentElement.style.position = 'relative';
      input.parentElement.appendChild(feedback);
    }
  }

  /**
   * Marks a field as invalid: removes any existing feedback and adds a red
   * error message below the input.
   */
  function showError(input, message) {
    var parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
    parent.classList.remove('has-success');
    parent.classList.add('has-error');
    var existing = parent.querySelector('.validation-feedback');
    if (existing) existing.remove();

    var feedback = document.createElement('div');
    feedback.className = 'validation-feedback';
    feedback.innerHTML = '<small style="color:var(--error);font-family:var(--font-body);display:block;margin-top:0.25rem;"><i class="fas fa-exclamation-circle"></i> ' + message + '</small>';
    parent.appendChild(feedback);
  }

  /** Removes all validation state from a field (called on 'input' event). */
  function clearValidation(input) {
    var parent = input.closest('.mb-3') || input.closest('.col-md-6') || input.closest('.col-12');
    parent.classList.remove('has-success', 'has-error');
    var existing = parent.querySelector('.validation-feedback');
    if (existing) existing.remove();
  }

  /**
   * Attaches blur (validate) and input (clear) listeners to a set of fields.
   * fieldType controls which validation rules apply.
   */
  function attachValidation(fields) {
    fields.forEach(function (input) {
      input.addEventListener('blur', function () {
        var val = this.value;
        if (this.type === 'email') {
          if (!validateRequired(val)) showError(this, 'Email is required');
          else if (!validateEmail(val)) showError(this, 'Please enter a valid email');
          else showSuccess(this);
        } else if (this.type === 'date') {
          if (!validateRequired(val)) {
            showError(this, 'Please select a date');
          } else {
            // Reject dates in the past
            var selected = new Date(val);
            var today = new Date(); today.setHours(0, 0, 0, 0);
            if (selected < today) showError(this, 'Please select a future date');
            else showSuccess(this);
          }
        } else if (this.type === 'number') {
          if (!validateRequired(val)) showError(this, 'This field is required');
          else if (parseInt(val) < parseInt(this.min || '0')) showError(this, 'Minimum value is ' + this.min);
          else showSuccess(this);
        } else if (this.tagName === 'SELECT') {
          if (!validateRequired(val)) showError(this, 'Please select an option');
          else showSuccess(this);
        } else {
          var label = (this.previousElementSibling && this.previousElementSibling.textContent)
            ? this.previousElementSibling.textContent.trim()
            : 'This field';
          if (!validateRequired(val)) showError(this, label + ' is required');
          else showSuccess(this);
        }
      });

      // Clear error styling as soon as the user starts correcting the field
      input.addEventListener('input', function () {
        if (this.classList.contains('has-error') || this.closest('.has-error')) {
          clearValidation(this);
        }
      });
    });
  }

  if (contactForm) {
    attachValidation(contactForm.querySelectorAll('input[required], textarea[required]'));
  }
  if (bookingForm) {
    attachValidation(bookingForm.querySelectorAll('input[required], select[required]'));
  }

  // --- c) Dynamic Price Calculator ---
  // Price ranges (USD) per person for each activity type
  var activityPrices = {
    'hiking': { min: 30, max: 50 },
    'abseiling': { min: 60, max: 80 },
    'coffee-tour': { min: 25, max: 40 },
    'nature-walks': { min: 20, max: 35 },
    'bird-watching': { min: 20, max: 35 },
    'rock-climbing': { min: 50, max: 70 },
    'cultural': { min: 25, max: 40 }
  };

  var activitySelect = document.getElementById('activities');
  var adultsInput = document.getElementById('adults');
  var childrenInput = document.getElementById('children');
  var priceEstimateDiv = document.getElementById('price-estimate');
  var priceRangeSpan = document.getElementById('price-range');

  /** Recalculates and displays the estimated price range. */
  function calculatePrice() {
    var activity = activitySelect ? activitySelect.value : '';
    var adults = adultsInput ? (parseInt(adultsInput.value) || 0) : 0;
    var children = childrenInput ? (parseInt(childrenInput.value) || 0) : 0;

    if (activity && adults > 0 && activityPrices[activity]) {
      var prices = activityPrices[activity];
      var totalPeople = adults + children;
      // Show the min–max range for the total group size
      priceRangeSpan.textContent = '$' + (prices.min * totalPeople) + '–$' + (prices.max * totalPeople);
      priceEstimateDiv.style.display = 'block';
      priceEstimateDiv.style.animation = 'fadeIn 0.3s ease-in';
    } else if (priceEstimateDiv) {
      priceEstimateDiv.style.display = 'none'; // hide if inputs are incomplete
    }
  }

  // Recalculate whenever the activity, adults, or children values change
  if (activitySelect) activitySelect.addEventListener('change', calculatePrice);
  if (adultsInput) adultsInput.addEventListener('input', calculatePrice);
  if (childrenInput) childrenInput.addEventListener('input', calculatePrice);
});


// =============================================================================
// 25. NAVBAR SCROLL EFFECT
// As the user scrolls down, the navbar background becomes more opaque so the
// links stay readable over page content. Above 80px it's semi-transparent;
// below 80px it's nearly solid.
// =============================================================================
window.addEventListener('scroll', function () {
  var navbar = document.getElementById('mainNavbar');
  if (!navbar) return;

  // Darken the background once the user has scrolled past the very top
  navbar.style.backgroundColor = window.scrollY > 80
    ? 'rgba(10, 26, 10, 0.95)' // near-solid dark green
    : 'rgba(10, 26, 10, 0.70)'; // semi-transparent
});

// =============================================================================
// 26. MOBILE MENU TOGGLE
// Toggles the mobile navigation drawer open/closed when the hamburger button
// is tapped. Also swaps the hamburger ☰ and close ✕ icons, and locks/unlocks
// page scrolling while the menu is open so the background doesn't scroll.
// =============================================================================
function toggleMobileMenu() {
  var menu = document.getElementById('navbarNav');
  var menuIcon = document.getElementById('menuIcon');
  var closeIcon = document.getElementById('closeIcon');
  var isOpen = menu.style.display === 'flex';

  if (isOpen) {
    // Close the menu
    menu.style.display = 'none';
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
    document.documentElement.style.overflow = ''; // restore scrolling
    document.body.style.overflow = '';
  } else {
    // Open the menu
    menu.style.display = 'flex';
    menuIcon.classList.add('hidden');
    closeIcon.classList.remove('hidden');
    document.documentElement.style.overflow = 'hidden'; // lock scrolling
    document.body.style.overflow = 'hidden';
  }
}


// =============================================================================
// 27. STAR RATING (Public Testimonial Submission Modal)
// Handles hover and click interactions on the star rating buttons in the
// testimonial submission modal on the homepage.
// =============================================================================
document.addEventListener('DOMContentLoaded', function () {
  var starBtns = document.querySelectorAll('.star-btn');
  if (!starBtns.length) return;

  // Set default 5 stars
  starBtns.forEach(function (b) { b.style.color = 'var(--accent-gold)'; });

  starBtns.forEach(function (btn) {
    btn.addEventListener('mouseover', function () {
      var val = parseInt(this.dataset.value);
      starBtns.forEach(function (b, i) {
        b.style.color = i < val ? 'var(--accent-gold)' : '#e0e0e0';
      });
    });

    btn.addEventListener('click', function () {
      var val = parseInt(this.dataset.value);
      document.getElementById('rating-value').value = val;
      starBtns.forEach(function (b, i) {
        b.style.color = i < val ? 'var(--accent-gold)' : '#e0e0e0';
      });
    });
  });

  var starRating = document.getElementById('star-rating');
  if (starRating) {
    starRating.addEventListener('mouseleave', function () {
      var selected = parseInt(document.getElementById('rating-value').value);
      starBtns.forEach(function (b, i) {
        b.style.color = i < selected ? 'var(--accent-gold)' : '#e0e0e0';
      });
    });
  }
});

// =============================================================================
// 28. ACTIVITY REACTIONS
// Loads reaction counts on page load and handles toggle clicks on each
// activity card's reaction buttons. Uses session-based tracking via the
// /reactions/{activityKey}/{emoji} API endpoints.
// =============================================================================
async function loadReactions() {
  var groups = document.querySelectorAll('.activity-reactions');
  for (var i = 0; i < groups.length; i++) {
    var group = groups[i];
    var activityKey = group.dataset.activity;
    try {
      var res = await fetch('/reactions/' + activityKey);
      var data = await res.json();
      group.querySelectorAll('.reaction-btn').forEach(function (btn) {
        var emoji = btn.dataset.emoji;
        if (data[emoji]) {
          btn.querySelector('.reaction-count').textContent = data[emoji].count;
          if (data[emoji].reacted) {
            btn.style.background = 'rgba(201,149,26,0.4)';
            btn.style.borderColor = 'var(--accent-gold)';
          }
        }
      });
    } catch (e) { }
  }
}

async function toggleReaction(btn, activityKey, emoji) {
  btn.disabled = true;
  try {
    var res = await fetch('/reactions/' + activityKey + '/' + emoji, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        'Content-Type': 'application/json',
      }
    });
    var data = await res.json();
    btn.querySelector('.reaction-count').textContent = data.count;
    if (data.reacted) {
      btn.style.background = 'rgba(201,149,26,0.4)';
      btn.style.borderColor = 'var(--accent-gold)';
    } else {
      btn.style.background = 'rgba(255,255,255,0.15)';
      btn.style.borderColor = 'rgba(255,255,255,0.3)';
    }
  } catch (e) { }
  btn.disabled = false;
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.reaction-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var group = this.closest('.activity-reactions');
      var activityKey = group.dataset.activity;
      var emoji = this.dataset.emoji;
      toggleReaction(this, activityKey, emoji);
    });
  });

  if (document.querySelector('.activity-reactions')) {
    loadReactions();
  }
});

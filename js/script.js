document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.slide');
  let currentSlide = 0;

  if (slides.length > 0) {
    // Set the first slide as active immediately
    slides[currentSlide].classList.add('active');

    setInterval(() => {
      // Remove active class from the current slide
      slides[currentSlide].classList.remove('active');

      // Move to the next slide
      currentSlide = (currentSlide + 1) % slides.length;

      // Add active class to the new current slide
      slides[currentSlide].classList.add('active');
    }, 5000); // Change slide every 5 seconds
  }
});
// Back to Top Button Logic
document.addEventListener('DOMContentLoaded', () => {
  const backToTopButton = document.getElementById('back-to-top');

  if (backToTopButton) {
    // Show or hide the button based on scroll position
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) { // Show button after scrolling 300px
        backToTopButton.style.display = 'block';
      } else {
        backToTopButton.style.display = 'none';
      }
    });

    // Smooth scroll to top on click
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const reveals = document.querySelectorAll('.reveal');

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('active');
        observer.unobserve(entry.target); // Remove if you want animation only once
      }
    });
  }, {
    threshold: 0.15 // Adjust for when the animation should trigger
  });

  reveals.forEach(section => {
    observer.observe(section);
  });
});

// Dynamic Copyright Year
document.addEventListener('DOMContentLoaded', () => {
    const copyrightSpan = document.getElementById('copyright');
    if (copyrightSpan) {
        const currentYear = new Date().getFullYear();
        copyrightSpan.textContent = `© ${currentYear} Sipi Falls. All Rights Reserved.`;
    }
});

// AJAX Newsletter Form Submission
document.addEventListener('DOMContentLoaded', () => {
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterSuccess = document.getElementById('newsletter-success');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function (event) {
            event.preventDefault(); // Stop the default page reload

            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const email = emailInput.value;
            const submitButton = newsletterForm.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;

            // Basic client-side validation
            if (!email || !email.includes('@')) {
                alert('Please enter a valid email address.');
                return;
            }

            // Disable button to prevent multiple submissions
            submitButton.disabled = true;
            submitButton.innerHTML = 'Signing Up...';
            newsletterSuccess.classList.add('d-none'); // Hide previous messages

            try {
                // This is where you will put your actual backend API endpoint
                const response = await fetch('/api/subscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ email: email }),
                });

                const result = await response.json();

                if (response.ok) {
                    newsletterSuccess.textContent = 'Thank you for subscribing!';
                    newsletterSuccess.classList.remove('d-none');
                    emailInput.value = ''; // Clear the input
                } else {
                    // Display error message from the server
                    alert(result.message || 'An error occurred. Please try again.');
                }

            } catch (error) {
                console.error('Submission error:', error);
                alert('Could not connect to the server. Please try again later.');
            } finally {
                // Re-enable the button
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            }
        });
    }
});

// Extra Tips Modal Content for Travel Guide
// Only runs on travelguide.html
if (document.getElementById('extraTipsModal')) {
  document.addEventListener('DOMContentLoaded', function () {
    const tips = [
      'Carry some cash – ATMs are limited in the Sipi area.',
      'Start hikes early in the morning for the best weather and fewer crowds.',
      'Hire a local guide for safety and to learn hidden stories about the falls.',
      'Bring a waterproof bag for your electronics and valuables.',
      'Respect local customs – ask before taking photos of people.',
      'Try the local coffee – it’s some of the best in Uganda!',
      'Wear layers – weather can change quickly in the mountains.',
      'Stay on marked trails to protect the environment and for your safety.',
      'Book your accommodation in advance during peak season.',
      'Don’t forget insect repellent and sunscreen!'
    ];
    const tipsList = document.getElementById('extra-tips-list');
    const modal = document.getElementById('extraTipsModal');
    if (tipsList && modal) {
      modal.addEventListener('show.bs.modal', function () {
        // Clear previous tips (if any)
        tipsList.innerHTML = '';
        // Add each tip as a list item
        tips.forEach(tip => {
          const li = document.createElement('li');
          li.innerHTML = `<i class="fas fa-leaf text-success me-2"></i> ${tip}`;
          li.classList.add('mb-2');
          tipsList.appendChild(li);
        });
      });
    }
  });
}

// Enable tooltips for Quick Facts cards (Bootstrap 5)
document.addEventListener('DOMContentLoaded', function () {
  const factCards = document.querySelectorAll('.quick-fact-card');
  factCards.forEach(card => {
    const tip = card.getAttribute('data-tip');
    if (tip) {
      card.setAttribute('title', tip);
      // Initialize Bootstrap tooltip
      if (window.bootstrap && bootstrap.Tooltip) {
        new bootstrap.Tooltip(card);
      }
    }
  });
});

//navigation for the active links
document.addEventListener('DOMContentLoaded', () => {
  const navLinks = document.querySelectorAll('.nav-link');
  const currentPath = window.location.pathname;

  navLinks.forEach(link => {
    // Normalize paths to handle relative URLs
    const linkPath = new URL(link.href, window.location.origin).pathname;
    if (linkPath === currentPath) {
      link.classList.add('active');
      link.setAttribute('aria-current', 'page');
    }
  });
});

// Image Slider Logic
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('.slide');
  let currentSlide = 0;

  // Show first slide immediately
  slides[0].classList.add('active');

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === index);
    });
  }

  setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }, 8000); // Matches 8s animation
});

// Back to Top Button Logic
document.addEventListener('DOMContentLoaded', () => {
  // Back to Top Button
  const backToTop = document.getElementById('back-to-top');
  window.addEventListener('scroll', () => {
    backToTop.style.display = window.scrollY > 300 ? 'flex' : 'none';
  });
  backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Newsletter Form Feedback
  const form = document.getElementById('newsletter-form');
  const feedback = document.getElementById('newsletter-feedback');
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
      });
      const result = await response.json();
      feedback.textContent = result.message || 'Subscribed successfully!';
      feedback.style.color = 'var(--secondary-teal)';
      feedback.style.display = 'block';
      form.reset();
    } catch (error) {
      feedback.textContent = 'Error subscribing. Please try again.';
      feedback.style.color = 'var(--highlight-coral)';
      feedback.style.display = 'block';
    }
  });
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
// Intersection Observer for Reveal Animations
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
    // Newsletter Signup Interactivity
    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterSuccess = document.getElementById('newsletter-success');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            if (!email || !email.includes('@')) {
                newsletterSuccess.textContent = 'Please enter a valid email address.';
                newsletterSuccess.classList.remove('d-none');
                newsletterSuccess.classList.add('text-danger');
                setTimeout(() => newsletterSuccess.classList.add('d-none'), 2500);
                return;
            }
            newsletterSuccess.textContent = 'Thank you for subscribing!';
            newsletterSuccess.classList.remove('d-none', 'text-danger');
            newsletterSuccess.classList.add('text-success');
            emailInput.value = '';
            setTimeout(() => newsletterSuccess.classList.add('d-none'), 2500);
        });
    }

    // Booking Form Validation
    const bookingForm = document.querySelector('form[action="submit-booking.php"]');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function (event) {
            if (!bookingForm.checkValidity()) {
                event.preventDefault();
                bookingForm.classList.add('was-validated');
                // Optionally, scroll to first invalid field
                const firstInvalid = bookingForm.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        });
    }
});

// Animated Counters for About Us Page
document.addEventListener('DOMContentLoaded', function() {
  const counters = document.querySelectorAll('.counter');
  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      const count = +counter.innerText;
      const increment = Math.ceil(target / 100);
      if(count < target) {
        counter.innerText = count + increment > target ? target : count + increment;
        setTimeout(updateCount, 20);
      } else {
        counter.innerText = target;
      }
    };
    updateCount();
  });
});

//deleting bookings
document.addEventListener('DOMContentLoaded', function () {
  // Select all delete buttons
  // and the alert container for success messages
  const deleteButtons = document.querySelectorAll('.delete-booking');
  const alertContainer = document.getElementById('alertContainer');

  deleteButtons.forEach(button => {// Add click event listener to each button
    button.addEventListener('click', function (event) {
      event.preventDefault();// Prevent default anchor click behavior for buttons

      const bookingId = this.getAttribute('data-id');// Get the booking ID from the button's data attribute

      if (!bookingId) {// If no booking ID is found, log an error and exit
        console.error("No booking ID found.");
        return;
      }
      // Confirm deletion with the user
      if (confirm('Are you sure you want to delete this booking?')) {
        fetch(`delete_booking.php?id=${bookingId}`, {// Send a GET request to delete the booking
          method: 'GET'// Use GET method for deletion
        })
        .then(response => response.text())// Parse the response as text
        .then(data => {
          if (data.trim() === 'success') { // .trim() just in case
            // Show alert in placeholder
            alertContainer.innerHTML = `
              <div class="alert alert-success text-center" id="deleteMsg">
                Booking deleted successfully.
              </div>
            `;

            // Fade out after 3 seconds
            setTimeout(() => {
              const msg = document.getElementById('deleteMsg');
              if (msg) {
                msg.style.transition = "opacity 0.5s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 500);
              }
            }, 3000);

            // Remove the row from the table
            this.closest('tr').remove();
          } else {
            alert('Error deleting booking. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Something went wrong. Please try again.');
        });
      }
    });
  });
});

// Handle delete contact action
document.addEventListener('DOMContentLoaded', function () {
  const deleteContactButtons = document.querySelectorAll('.delete-contact');
  const alertContainer = document.getElementById('alertContainer');

  deleteContactButtons.forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      const contactId = this.getAttribute('data-id');

      if (!contactId) {
        console.error("No contact ID found.");
        return;
      }

      if (confirm('Are you sure you want to delete this contact?')) {
        fetch(`delete_contacts.php?id=${contactId}`, {
          method: 'GET'
        })
        .then(response => response.text())
        .then(data => {
          if (data.trim() === 'success') {
            alertContainer.innerHTML = `
              <div class="alert alert-success text-center" id="deleteMsg">
                Contact deleted successfully.
              </div>
            `;

            setTimeout(() => {
              const msg = document.getElementById('deleteMsg');
              if (msg) {
                msg.style.transition = "opacity 0.5s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 500);
              }
            }, 3000);

            this.closest('tr').remove();
          } else {
            alert('Error deleting contact. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Something went wrong. Please try again.');
        });
      }
    });
  });
});

// Handle delete subscriber action
document.addEventListener('DOMContentLoaded', function () {
  const deleteSubscriberButtons = document.querySelectorAll('.delete-subscriber');
  const alertContainer = document.getElementById('alertContainer');

  deleteSubscriberButtons.forEach(button => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      const subscriberEmail = this.getAttribute('data-email');

      if (!subscriberEmail) {
        console.error("No subscriber email found.");
        return;
      }

      if (confirm('Are you sure you want to delete this subscriber?')) {
        fetch(`delete_subscriber.php?email=${encodeURIComponent(subscriberEmail)}`, {
          method: 'GET'
        })
        .then(response => response.text())
        .then(data => {
          if (data.trim() === 'success') {
            alertContainer.innerHTML = `
              <div class="alert alert-success text-center" id="deleteMsg">
                Subscriber deleted successfully.
              </div>
            `;

            setTimeout(() => {
              const msg = document.getElementById('deleteMsg');
              if (msg) {
                msg.style.transition = "opacity 0.5s ease";
                msg.style.opacity = "0";
                setTimeout(() => msg.remove(), 500);
              }
            }, 3000);

            this.closest('tr').remove();
          } else {
            alert('Error deleting subscriber. Please try again.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Something went wrong. Please try again.');
        });
      }
    });
  });
});

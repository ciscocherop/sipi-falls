<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipi Falls</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="images/logo.png" type="image/x-icon">
   <style>
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include '../includes/navbar.php'; ?>

  <!-- Warm Welcome Message -->
  <section class="welcome-section   container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 ">
        <h1 class="display-4 ms-3">Ready for Sipi? Let’s Begin the <span style="margin-left: 70%;">Journey!</span></h1>
        <p class="p-4 fs-4">We’re thrilled you’re interested in exploring Sipi Falls! Our team is here to assist you with <br>
          any questions or to help plan your unforgettable adventure. Feel free to reach out—we can’t wait to welcome you! <br>
          For any kind of inquiries, please use the contact form below or book your adventure directly through our booking form.
        </p>
      </div>
    </div>
  </section>

  <!-- Contact Form -->
  <section class="container p-5" style="background: #228B22; border-radius: 1.5rem;">
    <div class="row justify-content-center align-items-center g-4">
      <!-- Image Column -->
      <div class="col-lg-5 mb-4 mb-lg-0 p-0 contact-image">
        <img src="../images/group.jpg" alt="Contact Sipi Falls" class="img-fluid h-100 w-100 d-block" style="object-fit: cover; min-height: 320px; max-height: 400px; border-top-left-radius: 1.5rem; border-bottom-left-radius: 1.5rem; border-top-right-radius: 0; border-bottom-right-radius: 0;">
      </div>
      <!-- Form Column -->
      <div class="col-lg-7">
        <div class="card shadow rounded-4 p-5 border-2">
          <h2 class="mb-4 text-success text-center fs-2">Let's Get Intouch</h2>
          <form action="submit-contact.php" method="POST">
            <div class="mb-3 row g-2">
              <div class="col-12 col-md-6">
                <label for="name" class="form-label">First Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your first name">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <label for="last-name" class="form-label">Last Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                  <input type="text" class="form-control" id="last-name" name="last-name" required placeholder="Enter your last name">
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Booking Form -->
  <section class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow rounded-4 p-5 border-2">
          <h2 class="mb-4 text-success text-center fs-2">Book Your Adventure</h2>
          <form action="submit-booking.php" method="POST">
            <div class="mb-3">
              <label for="full-name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="full-name" name="full-name" required placeholder="Enter your full name">
            </div>
            <div class="mb-3">
              <label for="email-booking" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email-booking" name="email-booking" required placeholder="Enter your email address">
            </div>
            <div class="mb-3">
              <label for="travel-date" class="form-label">Preferred Travel Date</label>
              <input type="date" class="form-control" id="travel-date" name="travel-date" required>
            </div>
            <div class="mb-3 row g-2">
              <div class="col-md-6">
                <label for="adults" class="form-label">Number of Adults</label>
                <input type="number" class="form-control" id="adults" name="adults" min="1" required placeholder="Adults">
              </div>
              <div class="col-md-6">
                <label for="children" class="form-label">Number of Children</label>
                <input type="number" class="form-control" id="children" name="children" min="0" placeholder="Children">
              </div>
            </div>
            <div class="mb-3">
              <label for="activities" class="form-label">Preferred Activities</label>
              <select id="activities" name="activities" class="form-select" required>
                <option value="" disabled selected>Select an activity</option>
                <option value="hiking">Hiking the Waterfalls</option>
                <option value="abseiling">Abseiling</option>
                <option value="coffee-tour">Coffee Tour</option>
                <option value="nature-walks">Nature Walks</option>
                <option value="bird-watching">Bird Watching</option>
                <option value="rock-climbing">Rock Climbing</option>
                <option value="cultural">Cultural Experiences</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="budget" class="form-label">Budget Range (Optional)</label>
              <select id="budget" name="budget" class="form-select">
                <option value="">Select Range</option>
                <option value="50-100">$50 - $100</option>
                <option value="100-200">$100 - $200</option>
                <option value="200+">$200+</option>
              </select>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="agree" name="agree">
              <label class="form-check-label" for="agree">I agree to receive updates</label>
            </div>
            <button type="submit" class="btn btn-success w-100 py-2">
              Submit Booking <i class="fas fa-arrow-right ms-2"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQs -->
  <section class="container py-5">
    <h2 class="text-center mb-5 text-success">Frequently Asked Questions</h2>
    <div class="row g-4 justify-content-center">
      <!-- Best time to visit -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow rounded-4 p-4 text-center">
          <div class="mb-3">
            <i class="fas fa-calendar-alt fa-2x text-success"></i>
          </div>
          <h5 class="mb-3">What’s the best time to visit Sipi Falls?</h5>
          <p>The best times are during the dry seasons, June to August and December to February, for clear views and safe trails.</p>
        </div>
      </div>
      <!-- Guides included -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow rounded-4 p-4 text-center">
          <div class="mb-3">
            <i class="fas fa-user-tie fa-2x text-success"></i>
          </div>
          <h5 class="mb-3">Are guides included in the booking?</h5>
          <p>Yes, professional guides are included with all activity bookings to ensure your safety and enjoyment.</p>
        </div>
      </div>
      <!-- What to pack -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow rounded-4 p-4 text-center">
          <div class="mb-3">
            <i class="fas fa-hiking fa-2x text-success"></i>
          </div>
          <h5 class="mb-3">What should I pack for the activities?</h5>
          <p>Pack sturdy hiking shoes, a rain jacket, sunscreen, insect repellent, a reusable water bottle, and a camera.</p>
        </div>
      </div>
      <!-- How to cancel -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow rounded-4 p-4 text-center">
          <div class="mb-3">
            <i class="fas fa-times-circle fa-2x text-success"></i>
          </div>
          <h5 class="mb-3">How do I cancel a booking?</h5>
          <p>You can cancel free of charge up to 48 hours before your trip by contacting us via email or phone.</p>
        </div>
      </div>
      <!-- Age limit -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow rounded-4 p-4 text-center">
          <div class="mb-3">
            <i class="fas fa-child fa-2x text-success"></i>
          </div>
          <h5 class="mb-3">Is there an age limit for activities?</h5>
          <p>Most activities are suitable for ages 12 and up, but please contact us for specific restrictions.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php include '../includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="../js/script.js"></script>
</body>
</html>

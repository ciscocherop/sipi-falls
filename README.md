# Sipi Falls Uganda — Tourism Website

A full-stack tourism web application for **Sipi Falls Uganda**, built to handle online bookings, visitor inquiries, newsletter subscriptions, and content management for a real adventure tourism business in Kapchorwa, Eastern Uganda.

**Live site:** ipifalls.resnetsystems.site

---

## What It Does

**Public-facing site:**
- Homepage with activities showcase, testimonials, and photo gallery
- Travel guide page with dynamic content managed from the admin panel
- About page with tour guide profiles
- Contact & booking page with real-time price estimation based on selected activities and group size
- Newsletter subscription with welcome email and unsubscribe flow
- Activity reactions (emoji responses on activity cards)
- Fully responsive design across all devices

**Admin dashboard (protected):**
- Manage incoming bookings — view, update status (pending/confirmed/cancelled), delete
- Read and respond to contact messages — mark as read/unread
- Approve or reject visitor-submitted testimonials
- Manage newsletter subscribers — compose and broadcast newsletters
- Manage accommodation listings
- Manage tour guide profiles
- Edit site content (travel guide page, contact details) without touching code
- User management for admin accounts

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2, Laravel 11 |
| Frontend | Blade templates, Bootstrap 5, vanilla JS |
| Database | MySQL (production), SQLite (local dev) |
| Mail | SMTP via resend |
| Auth | Laravel session-based auth with admin middleware |
| Hosting | Shared hosting (cPanel) |
| SEO | Google Search Console, Google Analytics (GA4), XML sitemap |

---

## Key Features Built

- **Booking system** — form submission, email notification to admin, confirmation email to visitor, status management from dashboard
- **Newsletter system** — subscribe/unsubscribe with signed URLs, broadcast composer in admin
- **Dynamic content** — site content editable from admin panel stored in DB, no redeploy needed
- **Email notifications** — multiple Mailable classes for bookings, contact messages, newsletter welcome and broadcast
- **Activity price estimator** — JS-based real-time price range calculator on the booking form
- **Testimonials moderation** — visitors submit, admin approves before public display
- **SEO ready** — meta tags, Open Graph, Twitter Card, XML sitemap, Google Analytics, Google Site Verification

---

## Local Setup

```bash
git clone https://github.com/ciscocherop/sipi-falls
cd sipi-falls
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Update `.env` with your database and mail credentials before running.

---

## Project Structure

```
app/
  Http/Controllers/
    admin/          # All admin panel controllers
    Auth/           # Login controller
  Mail/             # Mailable classes for all email types
  Models/           # Eloquent models
resources/
  views/
    layouts/        # Main Blade layout with SEO tags
    pages/          # Public pages (home, about, contact, travelguide)
    partials/       # Reusable components (nav, footer)
    admin/          # Admin dashboard views
    emails/         # Email templates
routes/
  web.php           # All routes (public, auth, admin)
database/
  migrations/       # All table migrations
```

---

## Author

Built by Cherop Sisco — a full-stack web application developed for a real tourism business, covering everything from frontend UI to backend admin tooling, email automation, and production deployment.

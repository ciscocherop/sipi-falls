<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="u23QGD0dNqmD68KUBBYmwz2vyQlRansiOz2AwGFH_fc" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0FQE0XDVZY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-0FQE0XDVZY');
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sipi Falls - Keep Sipping!!')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (compiled) -->
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    
    <!-- Custom CSS (legacy - will be gradually replaced) -->
    {{-- style.css unlinked — all rules migrated to app.css. Delete this line once confirmed. --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    <!-- Primary SEO -->
    <meta name="description" content="Experience the magic of Sipi Falls, Uganda. Three magnificent waterfalls, abseiling, coffee tours, hiking and cultural experiences in Kapchorwa, Eastern Uganda.">
    <meta name="keywords" content="Sipi Falls Uganda, Sipi Falls tour, abseiling Uganda, Kapchorwa waterfalls, Uganda adventure tourism, coffee tours Uganda, Mount Elgon hiking">
    <meta name="author" content="Sipi Falls Uganda">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph — for WhatsApp, Facebook sharing -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Sipi Falls Uganda">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/gallery/falls/waterfall-base.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@@sipifalls">
    <meta name="twitter:image" content="{{ asset('images/gallery/falls/waterfall-base.jpg') }}">

    <!-- JSON-LD Structured Data — Tourist Attraction -->
    <script type="application/ld+json">
    @verbatim
    {
      "@context": "https://schema.org",
      "@type": "TouristAttraction",
      "name": "Sipi Falls Uganda",
      "description": "Three breathtaking waterfalls on the slopes of Mount Elgon in Kapchorwa, Eastern Uganda. Offering abseiling, hiking, coffee tours, bird watching and cultural experiences.",
      "url": "https://www.sipifalls.com",
      "image": "https://www.sipifalls.com/images/gallery/falls/waterfall-base.jpg",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Kapchorwa",
        "addressRegion": "Eastern Uganda",
        "addressCountry": "UG"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "1.3341674",
        "longitude": "34.3741673"
      },
      "telephone": "+256703558174",
      "openingHours": "Mo-Su 06:00-18:00",
      "touristType": ["Adventure", "Nature", "Cultural"],
      "sameAs": [
        "https://www.facebook.com/sipifalls",
        "https://www.instagram.com/sipifalls"
      ]
    }
    @endverbatim
    </script>

    <!-- Yield for page specific overrides -->
    @stack('seo')
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    
    <!-- Page-specific styles -->
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')
    
    <!-- Main Content -->
    <div id="main-content">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <!-- Scroll Reveal Animation -->

    
    <!-- Page-specific scripts -->
    @stack('scripts')
</body>
</html>

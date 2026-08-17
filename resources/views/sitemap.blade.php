<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    {{-- ================================================
         HOMEPAGE
         ================================================ --}}
    <url>
        <loc>{{ $pages[0]['url'] }}</loc>
        <lastmod>{{ $lastmod }}</lastmod>
        <changefreq>{{ $pages[0]['changefreq'] }}</changefreq>
        <priority>{{ $pages[0]['priority'] }}</priority>
        <image:image>
            <image:loc>{{ asset('images/gallery/falls/waterfall-base.jpg') }}</image:loc>
            <image:title>Sipi Falls Main Waterfall — 100m drop, Kapchorwa Uganda</image:title>
        </image:image>
        <image:image>
            <image:loc>{{ asset('images/Sipi-Falls.jpg') }}</image:loc>
            <image:title>Sipi Falls Uganda panoramic view</image:title>
        </image:image>
    </url>

    {{-- ================================================
         TRAVEL GUIDE
         ================================================ --}}
    <url>
        <loc>{{ $pages[1]['url'] }}</loc>
        <lastmod>{{ $lastmod }}</lastmod>
        <changefreq>{{ $pages[1]['changefreq'] }}</changefreq>
        <priority>{{ $pages[1]['priority'] }}</priority>
        <image:image>
            <image:loc>{{ asset('images/naturewalk.jpg') }}</image:loc>
            <image:title>Hiking the Sipi Falls trails, Uganda</image:title>
        </image:image>
        <image:image>
            <image:loc>{{ asset('images/abseil3.jpg') }}</image:loc>
            <image:title>Abseiling Sipi Falls — 100m cliff descent</image:title>
        </image:image>
    </url>

    {{-- ================================================
         ABOUT US
         ================================================ --}}
    <url>
        <loc>{{ $pages[2]['url'] }}</loc>
        <lastmod>{{ $lastmod }}</lastmod>
        <changefreq>{{ $pages[2]['changefreq'] }}</changefreq>
        <priority>{{ $pages[2]['priority'] }}</priority>
        <image:image>
            <image:loc>{{ asset('images/BANNER.jpg') }}</image:loc>
            <image:title>Sipi Falls Uganda — About Us</image:title>
        </image:image>
    </url>

    {{-- ================================================
         CONTACT / BOOKING
         ================================================ --}}
    <url>
        <loc>{{ $pages[3]['url'] }}</loc>
        <lastmod>{{ $lastmod }}</lastmod>
        <changefreq>{{ $pages[3]['changefreq'] }}</changefreq>
        <priority>{{ $pages[3]['priority'] }}</priority>
    </url>

</urlset>

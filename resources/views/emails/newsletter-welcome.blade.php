<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            line-height: 1.6;
            color: #4a4a4a;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .header {
            background-color: #0d1f0d;
            padding: 32px 24px;
            text-align: center;
        }
        .header h1 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #E8B923;
            margin: 0 0 6px;
            letter-spacing: 0.05em;
        }
        .header p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 12px;
            color: rgba(255,255,255,0.65);
            margin: 0;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
        .welcome-banner {
            background-color: #1a6b1a;
            padding: 20px 24px;
            text-align: center;
        }
        .welcome-banner h2 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            margin: 0 0 4px;
        }
        .welcome-banner p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 13px;
            color: rgba(255,255,255,0.8);
            margin: 0;
        }
        .content {
            padding: 32px 28px;
        }
        .content p {
            margin: 0 0 16px;
            font-size: 15px;
            color: #4a4a4a;
        }
        .confirmation-badge {
            background-color: #F0FDF4;
            border: 1px solid #1a6b1a;
            border-left: 4px solid #1a6b1a;
            border-radius: 0 4px 4px 0;
            padding: 14px 18px;
            margin: 20px 0;
            display: flex;
            align-items: center;
        }
        .confirmation-badge p {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
            color: #1a6b1a;
        }
        .what-to-expect {
            background-color: #f9f9f9;
            border: 1px solid #e8e8e8;
            border-top: 4px solid #E8B923;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
        }
        .what-to-expect h3 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: #c9951a;
            margin: 0 0 12px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .expect-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #4a4a4a;
        }
        .expect-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #E8B923;
            flex-shrink: 0;
            margin-top: 6px;
        }
        .cta-button {
            display: block;
            width: fit-content;
            margin: 24px auto 8px;
            background-color: #1a6b1a;
            color: #ffffff;
            text-decoration: none;
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            padding: 12px 28px;
            border-radius: 6px;
            text-align: center;
            letter-spacing: 0.05em;
        }
        .footer {
            background-color: #0d1f0d;
            padding: 24px 20px;
            text-align: center;
        }
        .footer p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 12px;
            color: rgba(255,255,255,0.5);
            margin: 4px 0;
        }
        .footer a {
            color: #E8B923;
            text-decoration: none;
        }
        .unsubscribe-section {
            border-top: 1px solid rgba(255,255,255,0.12);
            margin-top: 14px;
            padding-top: 12px;
        }
        .unsubscribe-section p {
            font-size: 11px;
            color: rgba(255,255,255,0.35);
            margin: 3px 0;
        }
        .unsubscribe-section a {
            color: rgba(255,255,255,0.45);
            text-decoration: underline;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>🌊 Sipi Falls</h1>
            <p>Keep Sipping</p>
        </div>

        <div class="welcome-banner">
            <h2>Welcome aboard! 🎉</h2>
            <p>You're now part of the Sipi Falls community</p>
        </div>

        <div class="content">
            <p>Hi there,</p>

            <p>Thank you for subscribing to the Sipi Falls newsletter! We're thrilled to have you with us.</p>

            <div class="confirmation-badge">
                <p>✓ &nbsp; {{ $subscriber->email }} is now subscribed</p>
            </div>

            <p>Here's what you can look forward to in your inbox:</p>

            <div class="what-to-expect">
                <h3>What you'll receive</h3>
                <div class="expect-item">
                    <div class="expect-dot"></div>
                    <span><strong>Travel tips &amp; guides</strong> — insider knowledge on the best trails, viewpoints, and hidden spots around Sipi Falls</span>
                </div>
                <div class="expect-item">
                    <div class="expect-dot"></div>
                    <span><strong>Seasonal updates</strong> — the best times to visit, weather tips, and what's happening at the falls</span>
                </div>
                <div class="expect-item">
                    <div class="expect-dot"></div>
                    <span><strong>Special offers</strong> — exclusive deals on tours, activities, and accommodation for our subscribers</span>
                </div>
                <div class="expect-item">
                    <div class="expect-dot"></div>
                    <span><strong>Stories &amp; culture</strong> — tales from the Sabiny people and the magical landscape of Mount Elgon</span>
                </div>
            </div>

            <p>In the meantime, explore our travel guide to start planning your visit:</p>

            <a href="{{ url('/travelguide') }}" class="cta-button">
                Explore the Travel Guide →
            </a>

            <p style="font-size: 13px; color: #888; text-align: center; margin-top: 8px;">
                We won't spam you — only genuinely useful content, sent sparingly.
            </p>
        </div>

        <div class="footer">
            <p><strong style="color: rgba(255,255,255,0.8);">Sipi Falls</strong> · Kapchorwa, Uganda</p>
            <p><a href="mailto:info@sipifalls.com">info@sipifalls.com</a></p>

            <div class="unsubscribe-section">
                <p>You're receiving this because you subscribed at sipifalls.com.</p>
                <p>
                    <a href="{{ $unsubscribeUrl }}">Unsubscribe at any time</a>
                </p>
            </div>
        </div>

    </div>
</body>
</html>

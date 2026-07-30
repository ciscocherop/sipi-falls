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
            padding: 28px 24px;
            text-align: center;
        }
        .header h1 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #E8B923;
            margin: 0 0 4px;
            letter-spacing: 0.05em;
        }
        .header p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 12px;
            color: rgba(255,255,255,0.65);
            margin: 0;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }
        .content {
            padding: 32px 28px;
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 15px;
            color: #4a4a4a;
            line-height: 1.8;
        }
        .content p {
            margin: 0 0 16px;
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
            border-top: 1px solid rgba(255,255,255,0.15);
            margin-top: 16px;
            padding-top: 14px;
        }
        .unsubscribe-section p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 11px;
            color: rgba(255,255,255,0.35);
            margin: 4px 0;
        }
        .unsubscribe-section a {
            color: rgba(255,255,255,0.5);
            text-decoration: underline;
            font-size: 11px;
        }
        .unsubscribe-section a:hover {
            color: #E8B923;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>🏞️ Sipi Falls</h1>
            <p>Keep Sipping</p>
        </div>

        <div class="content">
            {!! nl2br(e($content)) !!}
        </div>

        <div class="footer">
            <p><strong style="color: rgba(255,255,255,0.8);">Sipi Falls Tourism</strong></p>
            <p>{{ $contactInfo['contact_address'] ?? 'Kapchorwa, Uganda' }}</p>
            <p>
                <a href="mailto:{{ $contactInfo['contact_email'] ?? 'info@sipifalls.com' }}">
                    {{ $contactInfo['contact_email'] ?? 'info@sipifalls.com' }}
                </a>
                &nbsp;|&nbsp;
                <a href="tel:{{ str_replace(' ', '', $contactInfo['contact_phone'] ?? '+256703558174') }}">
                    {{ $contactInfo['contact_phone'] ?? '+256 703558174' }}
                </a>
            </p>

            <div class="unsubscribe-section">
                <p>You're receiving this because you subscribed to the Sipi Falls newsletter.</p>
                <p>
                    <a href="{{ $unsubscribeUrl }}">Unsubscribe</a>
                </p>
            </div>
        </div>

    </div>
</body>
</html>

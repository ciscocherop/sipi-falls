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
        }
        .content p {
            margin: 0 0 16px;
            font-size: 15px;
            color: #4a4a4a;
        }
        .highlight-box {
            background-color: #F0FDF4;
            border-left: 4px solid #1a6b1a;
            border-radius: 0 4px 4px 0;
            padding: 16px 20px;
            margin: 20px 0;
        }
        .highlight-box p {
            margin: 0;
            font-size: 14px;
            color: #1a6b1a;
            font-weight: 600;
        }
        .subject-line {
            background-color: #f9f9f9;
            border: 1px solid #e8e8e8;
            border-left: 4px solid #E8B923;
            border-radius: 0 4px 4px 0;
            padding: 12px 16px;
            margin: 16px 0 20px;
            font-size: 14px;
            color: #333;
            font-weight: 600;
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
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Sipi Falls</h1>
            <p>Keep Sipping</p>
        </div>

        <div class="content">
            <p>Hello <strong>{{ $contactMessage->first_name }}</strong>,</p>

            <p>Thank you for reaching out to us! We've received your message and our team will get back to you as soon as possible — usually within 24 hours.</p>

            <div class="highlight-box">
                <p>✓ Your message has been received successfully</p>
            </div>

            <p>Here's a summary of what you sent us:</p>

            <p style="font-size: 13px; color: #888; margin: 0 0 4px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em;">Subject</p>
            <div class="subject-line">{{ $contactMessage->subject }}</div>

            <p>In the meantime, feel free to explore our <a href="{{ url('/travelguide') }}" style="color: #1a6b1a; text-decoration: none; font-weight: 600;">travel guide</a> to start planning your Sipi Falls adventure.</p>

            <p>We look forward to connecting with you! 🌊</p>

            <p>Warm regards,<br>
            <strong>The Sipi Falls Team</strong></p>
        </div>

        <div class="footer">
            <p>Sipi Falls, Kapchorwa, Uganda</p>
            <p><a href="mailto:info@sipifalls.com">info@sipifalls.com</a></p>
            <p style="margin-top: 12px; font-size: 11px; color: rgba(255,255,255,0.3);">
                This email was sent in response to a contact form submission on sipifalls.com
            </p>
        </div>

    </div>
</body>
</html>

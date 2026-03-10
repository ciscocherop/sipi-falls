<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #228B22 0%, #6FCF97 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #E8B923;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .content {
            padding: 30px 20px;
        }
        .content p {
            margin: 0 0 15px;
        }
        .footer {
            background: #2C3E50;
            color: #F5F5F5;
            padding: 20px;
            text-align: center;
            font-size: 12px;
        }
        .footer a {
            color: #6FCF97;
            text-decoration: none;
        }
        .unsubscribe {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #444;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏞️ Sipi Falls</h1>
            <p>Experience the Beauty of Uganda</p>
        </div>
        
        <div class="content">
            {!! nl2br(e($content)) !!}
        </div>
        
        <div class="footer">
            <p><strong>Sipi Falls Tourism</strong></p>
            <p>{{ $contactInfo['contact_address'] ?? 'Kapchorwa, Uganda' }}</p>
            <p>
                <a href="mailto:{{ $contactInfo['contact_email'] ?? 'info@sipifalls.com' }}">{{ $contactInfo['contact_email'] ?? 'info@sipifalls.com' }}</a> | 
                <a href="tel:{{ str_replace(' ', '', $contactInfo['contact_phone'] ?? '+256703558174') }}">{{ $contactInfo['contact_phone'] ?? '+256 703558174' }}</a>
            </p>
            
            <div class="unsubscribe">
                <p>You're receiving this email because you subscribed to our newsletter.</p>
                <p>If you no longer wish to receive these emails, you can unsubscribe at any time.</p>
            </div>
        </div>
    </div>
</body>
</html>

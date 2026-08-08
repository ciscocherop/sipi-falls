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
            font-size: 20px;
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
        .alert-banner {
            background-color: #FFFBEB;
            border-bottom: 3px solid #E8B923;
            padding: 14px 24px;
            text-align: center;
        }
        .alert-banner p {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: #c9951a;
            margin: 0;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .content {
            padding: 28px 28px 24px;
        }
        .content p {
            margin: 0 0 14px;
            font-size: 14px;
            color: #4a4a4a;
        }
        .sender-details {
            background-color: #f9f9f9;
            border: 1px solid #e8e8e8;
            border-top: 4px solid #1a6b1a;
            border-radius: 4px;
            padding: 18px 20px;
            margin: 0 0 20px;
        }
        .sender-details h3 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 12px;
            font-weight: 700;
            color: #1a6b1a;
            margin: 0 0 12px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .detail-row {
            margin: 0 0 8px;
            font-size: 14px;
            color: #4a4a4a;
        }
        .detail-label {
            font-weight: 700;
            color: #666;
            display: inline-block;
            min-width: 80px;
        }
        .detail-value a {
            color: #1a6b1a;
            text-decoration: none;
        }
        .message-box {
            background-color: #ffffff;
            border: 1px solid #e8e8e8;
            border-left: 4px solid #E8B923;
            border-radius: 0 4px 4px 0;
            padding: 18px 20px;
            margin: 0 0 24px;
        }
        .message-box h3 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 12px;
            font-weight: 700;
            color: #c9951a;
            margin: 0 0 10px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .message-box p {
            font-size: 15px;
            color: #333;
            line-height: 1.8;
            margin: 0;
            white-space: pre-wrap;
        }
        .cta-button {
            display: block;
            width: fit-content;
            margin: 0 auto 8px;
            background-color: #1a6b1a;
            color: #ffffff !important;
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
            padding: 20px;
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
            <h1>Sipi Falls Admin</h1>
            <p>New Contact Message</p>
        </div>

        <div class="alert-banner">
            <p>📬 New message received on the website</p>
        </div>

        <div class="content">

            <div class="sender-details">
                <h3>Sender Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">
                        <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Subject:</span>
                    <span class="detail-value">{{ $contactMessage->subject }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Received:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($contactMessage->created_at)->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <div class="message-box">
                <h3>Message</h3>
                <p>{{ $contactMessage->message }}</p>
            </div>

            <div style="text-align: center; margin-bottom: 8px;">
                <a href="{{ route('admin.contact-messages.show', $contactMessage->id) }}" class="cta-button">
                    View &amp; Reply in Dashboard →
                </a>
            </div>
            <p style="text-align: center; font-size: 12px; color: #aaa; margin: 0;">
                Log in to the admin dashboard to read and respond
            </p>

        </div>

        <div class="footer">
            <p>Sipi Falls Admin Notification</p>
            <p><a href="{{ url('/admin/dashboard') }}">Open Dashboard</a></p>
            <p style="margin-top: 12px; font-size: 11px; color: rgba(255,255,255,0.3);">
                This notification was sent automatically from sipifalls.com
            </p>
        </div>

    </div>
</body>
</html>

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
        .ref-badge {
            display: inline-block;
            background-color: #f5f5f0;
            border-left: 4px solid #E8B923;
            padding: 10px 16px;
            margin: 4px 0 20px;
            font-weight: 700;
            font-size: 15px;
            color: #1a6b1a;
            border-radius: 0 4px 4px 0;
        }
        .booking-details {
            background-color: #f9f9f9;
            border: 1px solid #e8e8e8;
            border-top: 4px solid #1a6b1a;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
        }
        .booking-details h3 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: #1a6b1a;
            margin: 0 0 14px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .detail-row {
            display: flex;
            margin: 8px 0;
            font-size: 14px;
        }
        .detail-label {
            font-weight: 600;
            color: #666;
            min-width: 140px;
        }
        .detail-value {
            color: #333;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            background-color: #FFFBEB;
            color: #c9951a;
            border: 1px solid #c9951a;
        }
        .next-steps {
            background-color: #F0FDF4;
            border: 1px solid #1a6b1a;
            border-radius: 4px;
            padding: 18px 20px;
            margin: 20px 0;
        }
        .next-steps h3 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: #1a6b1a;
            margin: 0 0 10px;
        }
        .next-steps ul {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
            color: #4a4a4a;
        }
        .next-steps li {
            margin-bottom: 6px;
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
            <h1>Sipi Falls</h1>
            <p>Keep Sipping</p>
        </div>

        <div class="content">
            <p>Hello <strong>{{ $booking->fullname }}</strong>,</p>

            <p>Thank you for your booking request! We have received it and our team will contact you shortly to arrange payment and confirm your trip details.</p>

            <p>Your booking reference:</p>
            <div class="ref-badge">#{{ $booking->id }}</div>

            <div class="booking-details">
                <h3>Your Booking Summary</h3>

                <div class="detail-row">
                    <span class="detail-label">Reference:</span>
                    <span class="detail-value">#{{ $booking->id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Name:</span>
                    <span class="detail-value">{{ $booking->fullname }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $booking->email }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Travel Date:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($booking->date_of_travel)->format('F j, Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Group Size:</span>
                    <span class="detail-value">{{ $booking->num_adults }} adult{{ $booking->num_adults != 1 ? 's' : '' }}{{ $booking->num_children > 0 ? ', ' . $booking->num_children . ' child' . ($booking->num_children != 1 ? 'ren' : '') : '' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Activities:</span>
                    <span class="detail-value">{{ $booking->preferred_activities }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status:</span>
                    <span class="status-badge">Pending</span>
                </div>
            </div>

            <div class="next-steps">
                <h3>What happens next?</h3>
                <ul>
                    <li>Our team will review your request and contact you within 24 hours</li>
                    <li>We will discuss payment options and finalize your booking</li>
                    <li>Once payment is confirmed, you'll receive a full confirmation email</li>
                    <li>We'll also send you a detailed guide for what to bring and expect</li>
                </ul>
            </div>

            <p>If you have any questions in the meantime, feel free to reply to this email or reach us directly.</p>

            <p>We look forward to welcoming you to Sipi Falls! 🌊</p>

            <p>Warm regards,<br>
            <strong>The Sipi Falls Team</strong></p>
        </div>

        <div class="footer">
            <p>Sipi Falls, Kapchorwa, Uganda</p>
            <p><a href="mailto:info@sipifalls.com">info@sipifalls.com</a></p>
            <p style="margin-top: 12px; font-size: 11px; color: rgba(255,255,255,0.3);">
                This email was sent in response to a booking request on sipifalls.com
            </p>
        </div>

    </div>
</body>
</html>

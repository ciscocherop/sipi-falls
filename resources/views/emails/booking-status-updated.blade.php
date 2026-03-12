<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: var(--font-body);
            line-height: 1.6;
            color: var(--neutral-gray);
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: var(--primary-green);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .header h1 {
            font-family: var(--font-display);
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 10px 0;
        }
        .status-confirmed {
            background-color: #22C55E;
            color: white;
        }
        .status-pending {
            background-color: #F59E0B;
            color: white;
        }
        .status-cancelled {
            background-color: #EF4444;
            color: white;
        }
        .booking-details {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid var(--primary-green);
        }
        .booking-details h3 {
            font-family: var(--font-display);
        }
        .detail-row {
            margin: 10px 0;
        }
        .detail-label {
            font-weight: bold;
            color: #666;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sipi Falls Tours</h1>
    </div>

    <div class="content">
        <h2 style="font-family: var(--font-display);">Booking Status Update</h2>
        
        <p>Hello {{ $booking->fullname }},</p>

        @if($booking->status === 'confirmed')
            <p>Great news! Your booking has been <strong>confirmed</strong>! 🎉</p>
            <p>We're excited to welcome you to Sipi Falls. Your adventure awaits!</p>
        @elseif($booking->status === 'cancelled')
            <p>Your booking has been <strong>cancelled</strong>.</p>
            <p>If this was a mistake or you'd like to reschedule, please contact us.</p>
        @else
            <p>Your booking status has been updated to: 
                <span class="status-badge status-{{ $booking->status }}">{{ $booking->status }}</span>
            </p>
        @endif

        <div class="booking-details">
            <h3>Booking Details</h3>
            
            <div class="detail-row">
                <span class="detail-label">Name:</span> {{ $booking->fullname }}
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Email:</span> {{ $booking->email }}
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Travel Date:</span> {{ $booking->date_of_travel->format('F j, Y') }}
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Guests:</span> {{ $booking->num_adults }} Adults, {{ $booking->num_children }} Children
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Activities:</span> {{ $booking->preferred_activities }}
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Status:</span> 
                <span class="status-badge status-{{ $booking->status }}">{{ $booking->status }}</span>
            </div>
        </div>

        @if($booking->status === 'confirmed')
            <h3 style="font-family: var(--font-display);">What's Next?</h3>
            <ul>
                <li>We'll contact you 2 days before your visit with final details</li>
                <li>Please arrive 15 minutes before your scheduled time</li>
                <li>Bring comfortable hiking shoes and water</li>
                <li>Don't forget your camera! 📸</li>
            </ul>
        @endif

        <p>If you have any questions, feel free to reply to this email or contact us.</p>

        <p>Best regards,<br>
        <strong>Sipi Falls Tours Team</strong></p>
    </div>

    <div class="footer">
        <p>Sipi Falls, Uganda | Email: info@sipifalls.com</p>
        <p>This is an automated message. Please do not reply directly to this email.</p>
    </div>
</body>
</html>

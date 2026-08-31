<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; background: #f4f4f4; margin:0; padding:0; }
        .wrap { max-width: 600px; margin: 20px auto; background: white; border-radius: 8px; overflow: hidden; }
        .header { background: #0d1f0d; padding: 20px 24px; }
        .header h1 { color: #E8B923; margin: 0; font-size: 18px; }
        .header p { color: rgba(255,255,255,0.6); margin: 4px 0 0; font-size: 12px; }
        .body { padding: 24px; }
        .row { display: flex; padding: 8px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
        .label { font-weight: 600; color: #666; min-width: 140px; }
        .value { color: #333; }
        .reply-note { background: #F0FDF4; border-left: 4px solid #1a6b1a; padding: 12px 16px; margin-top: 20px; font-size: 13px; color: #1a6b1a; font-weight: 600; }
        .footer { background: #0d1f0d; padding: 16px; text-align: center; font-size: 11px; color: rgba(255,255,255,0.4); }
    </style>
</head>
<body>
<div class="wrap">
    <div class="header">
        <h1>New Booking Request</h1>
        <p>Received {{ now()->format('M j, Y \a\t H:i') }}</p>
    </div>
    <div class="body">
        <div class="row"><span class="label">Name:</span><span class="value">{{ $booking->fullname }}</span></div>
        <div class="row"><span class="label">Email:</span><span class="value">{{ $booking->email }}</span></div>
        <div class="row"><span class="label">Travel Date:</span><span class="value">{{ \Carbon\Carbon::parse($booking->date_of_travel)->format('F j, Y') }}</span></div>
        <div class="row"><span class="label">Adults:</span><span class="value">{{ $booking->num_adults }}</span></div>
        <div class="row"><span class="label">Children:</span><span class="value">{{ $booking->num_children }}</span></div>
        <div class="row"><span class="label">Activities:</span><span class="value">{{ $booking->preferred_activities }}</span></div>
        <div class="row"><span class="label">Booking ID:</span><span class="value">#{{ $booking->id }}</span></div>

        <div class="reply-note">
            💡 Hit Reply to respond directly to {{ $booking->fullname }} at {{ $booking->email }}
        </div>
    </div>
    <div class="footer">Sipi Falls Uganda · sipifalls.resnetsystems.site</div>
</div>
</body>
</html>

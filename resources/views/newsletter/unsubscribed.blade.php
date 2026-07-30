<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $alreadyDone ? 'Already Unsubscribed' : 'Unsubscribed' }} — Sipi Falls</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: #f5f5f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            max-width: 480px;
            width: 100%;
            overflow: hidden;
            text-align: center;
        }
        .card-header {
            background: #0d1f0d;
            padding: 2rem;
        }
        .card-header h1 {
            font-family: 'Montserrat', Arial, sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: #E8B923;
            letter-spacing: 0.05em;
        }
        .card-header p {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.5);
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-top: 0.25rem;
        }
        .card-body {
            padding: 2.5rem 2rem;
        }
        .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .card-body h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #1a6b1a;
            margin-bottom: 0.75rem;
        }
        .card-body p {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.7;
            margin-bottom: 1rem;
        }
        .card-body a {
            display: inline-block;
            margin-top: 0.5rem;
            background: #1a6b1a;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.65rem 1.75rem;
            border-radius: 6px;
            letter-spacing: 0.05em;
            transition: background 0.2s;
        }
        .card-body a:hover { background: #E8B923; color: #0d1f0d; }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>Sipi Falls</h1>
            <p>Keep Sipping</p>
        </div>
        <div class="card-body">
            @if($alreadyDone)
                <div class="icon">✅</div>
                <h2>Already Unsubscribed</h2>
                <p>This email address has already been removed from our newsletter list. You won't receive any further emails from us.</p>
            @else
                <div class="icon">👋</div>
                <h2>Successfully Unsubscribed</h2>
                <p>You've been removed from the Sipi Falls newsletter. We're sorry to see you go!</p>
                <p>You won't receive any more newsletter emails from us. If you change your mind, you can re-subscribe any time from our website.</p>
            @endif
            <a href="{{ url('/') }}">← Back to Sipi Falls</a>
        </div>
    </div>
</body>
</html>

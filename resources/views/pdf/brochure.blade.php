<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $service->title }} Brochure</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #111; margin: 0; padding: 0; background: #fff; }
        .header { background: #000; color: #eab308; padding: 50px 40px; text-align: center; border-bottom: 5px solid #eab308; }
        .content { padding: 50px 60px; }
        .title { font-size: 36px; font-weight: bold; margin-bottom: 25px; color: #000; border-left: 8px solid #eab308; padding-left: 20px; }
        .description { font-size: 18px; line-height: 1.8; margin-bottom: 40px; color: #444; }
        .features-box { background: #fdfbf0; border: 1px solid #eab308; padding: 30px; border-radius: 20px; }
        .features { list-style: none; padding: 0; margin: 0; }
        .features li { margin-bottom: 15px; padding-left: 30px; position: relative; font-size: 16px; font-weight: bold; }
        .features li:before { content: '✓'; position: absolute; left: 0; color: #eab308; font-weight: bold; font-size: 20px; }
        .contact-box { margin-top: 50px; background: #000; color: #fff; padding: 30px; border-radius: 20px; text-align: center; }
        .contact-box h3 { color: #eab308; margin-top: 0; font-size: 24px; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; padding: 30px; font-size: 12px; color: #666; border-top: 1px solid #eee; background: #fff; }
        .brand-text { color: #eab308; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/vantagelogo.png') }}" alt="Vantage Logo" style="height: 80px; width: auto; margin-bottom: 15px;">
        <h1 style="margin: 0; letter-spacing: 5px;">VANTAGE</h1>
        <p style="margin: 10px 0 0; font-size: 14px; opacity: 0.8; text-transform: uppercase;">Premium Digital & Event Solutions</p>
    </div>

    <div class="content">
        <h2 class="title">{{ strtoupper($service->title) }}</h2>
        <p class="description">{{ $service->content }}</p>

        <div class="features-box">
            <h3 style="margin-top: 0; border-bottom: 1px solid #eab308; padding-bottom: 10px; margin-bottom: 20px;">CORE FEATURES</h3>
            <ul class="features">
                @foreach($service->features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
        </div>

        <div class="contact-box">
            <h3>READY TO START?</h3>
            <p>Our team of experts is ready to bring your vision to life with precision and excellence.</p>
            <div style="margin-top: 20px; display: inline-block; text-align: left;">
                <p>📧 <span class="brand-text">info@vantagedigitalagency.co.ke</span></p>
                <p>📞 <span class="brand-text">+254 780 088088</span></p>
                <p>💬 <span class="brand-text">WhatsApp: +254 780 088088</span></p>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} <span style="color: #000; font-weight: bold;">VANTAGE DIGITAL AGENCY</span>. All rights reserved. <br>
        <span style="color: #eab308;">www.vantagedigitalagency.co.ke</span>
    </div>
</body>
</html>

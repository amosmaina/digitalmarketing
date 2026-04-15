<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $service->title }} Brochure</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; margin: 0; padding: 0; }
        .header { background: #4f46e5; color: white; padding: 40px; text-align: center; }
        .content { padding: 40px; }
        .title { font-size: 32px; font-weight: bold; margin-bottom: 20px; color: #4f46e5; }
        .description { font-size: 18px; line-height: 1.6; margin-bottom: 30px; }
        .features { list-style: none; padding: 0; }
        .features li { margin-bottom: 10px; padding-left: 20px; position: relative; }
        .features li:before { content: '•'; position: absolute; left: 0; color: #4f46e5; font-weight: bold; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; padding: 20px; font-size: 12px; color: #666; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="header">
        <h1>DIGITAL SERVICES</h1>
        <p>Premium Solutions for Modern Businesses</p>
    </div>

    <div class="content">
        <h2 class="title">{{ $service->title }}</h2>
        <p class="description">{{ $service->content }}</p>

        <h3>Core Features:</h3>
        <ul class="features">
            @foreach($service->features as $feature)
                <li>{{ $feature }}</li>
            @endforeach
        </ul>

        <div style="margin-top: 40px;">
            <h3>Interested?</h3>
            <p>Contact us at amohmaish2002@gmail.com for a customized quote.</p>
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Digital Services. All rights reserved. | www.digitalservices.com
    </div>
</body>
</html>

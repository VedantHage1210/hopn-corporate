<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You — HOPn</title>
    <style>
        body { margin: 0; padding: 0; background: #0f1523; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; }
        .wrapper { max-width: 600px; margin: 32px auto; background: #1a2235; border-radius: 12px; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0a0f1e 0%, #1e2d4f 100%); padding: 40px 40px 32px; text-align: center; border-bottom: 2px solid #4f6ef7; }
        .header h1 { margin: 0; font-size: 26px; font-weight: 800; color: #fff; letter-spacing: -0.5px; }
        .header .tagline { margin: 8px 0 0; color: #7c8db5; font-size: 14px; }
        .body { padding: 40px; text-align: center; }
        .icon { font-size: 48px; margin-bottom: 16px; }
        .body h2 { margin: 0 0 12px; font-size: 22px; color: #fff; }
        .body p { color: #94a3b8; font-size: 15px; line-height: 1.7; margin: 0 0 20px; }
        .highlight-box { background: #0f1523; border: 1px solid #2d3a52; border-radius: 8px; padding: 20px; margin: 24px 0; text-align: left; }
        .highlight-box p { margin: 0; font-size: 14px; color: #7c8db5; }
        .highlight-box strong { color: #e2e8f0; }
        .cta { margin-top: 28px; }
        .cta a { display: inline-block; background: #4f6ef7; color: #fff; text-decoration: none; padding: 13px 30px; border-radius: 8px; font-weight: 600; font-size: 14px; }
        .divider { height: 1px; background: #2d3a52; margin: 32px 0; }
        .footer { padding: 20px 40px; border-top: 1px solid #2d3a52; text-align: center; font-size: 12px; color: #4a5568; }
        .social { margin: 12px 0; }
        .social a { color: #4f6ef7; text-decoration: none; margin: 0 8px; font-size: 12px; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>HOPn</h1>
        <p class="tagline">Digital Transformation &amp; Innovation</p>
    </div>
    <div class="body">
        <div class="icon">✅</div>
        <h2>Thank you, {{ $leadData['name'] ?? 'there' }}!</h2>

        @php
            $messages = [
                'contact'              => "We've received your message and one of our team members will get back to you within 1–2 business days.",
                'proposal'             => "Your proposal request has been received. Our team will review your requirements and prepare a tailored response within 2–3 business days.",
                'partner-inquiry'      => "We're excited about your interest in partnering with HOPn. Our partnerships team will reach out to you shortly.",
                'training-application' => "Your training application has been submitted. We'll review it and contact you soon with next steps.",
            ];
        @endphp

        <p>{{ $messages[$formType] ?? "We've received your submission and will be in touch soon." }}</p>

        <div class="highlight-box">
            <p>Your submission reference:</p>
            <p><strong>{{ $leadData['name'] }} — {{ ucwords(str_replace('-', ' ', $formType)) }}</strong></p>
            <p style="margin-top:8px;">Submitted: {{ now()->format('d M Y, H:i') }}</p>
        </div>

        <p style="font-size:13px;color:#4a5568;">If you have any urgent questions in the meantime, reply directly to this email or contact us at <a href="mailto:{{ config('mail.from.address') }}" style="color:#4f6ef7;">{{ config('mail.from.address') }}</a>.</p>

        <div class="cta">
            <a href="{{ config('app.url') }}">Visit HOPn.eu →</a>
        </div>
    </div>
    <div class="footer">
        <div class="social">
            <a href="{{ config('app.url') }}">Website</a>
            <a href="https://linkedin.com/company/hopn">LinkedIn</a>
        </div>
        <p style="margin:0;">© {{ date('Y') }} HOPn. All rights reserved.</p>
        <p style="margin:4px 0 0;">You received this because you submitted a form on {{ config('app.url') }}.</p>
    </div>
</div>
</body>
</html>

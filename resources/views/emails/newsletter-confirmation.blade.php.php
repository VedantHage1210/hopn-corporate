<!DOCTYPE html>
<html lang="{{ $locale }}" @if($locale === 'ar') dir="rtl" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOPn Newsletter</title>
    <style>
        body { margin: 0; padding: 0; background: #0f1523; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; }
        .wrapper { max-width: 560px; margin: 32px auto; background: #1a2235; border-radius: 12px; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0a0f1e 0%, #1e2d4f 100%); padding: 32px 40px; border-bottom: 2px solid #4f6ef7; }
        .header h1 { margin: 0; font-size: 20px; font-weight: 700; color: #fff; }
        .body { padding: 36px 40px; font-size: 15px; line-height: 1.7; color: #cbd5e1; }
        .cta { margin-top: 28px; text-align: center; }
        .cta a { display: inline-block; background: #4f6ef7; color: #fff; text-decoration: none; padding: 13px 30px; border-radius: 8px; font-weight: 600; font-size: 14px; }
        .fallback { margin-top: 20px; font-size: 12px; color: #64748b; word-break: break-all; }
        .footer { padding: 20px 40px; border-top: 1px solid #2d3a52; text-align: center; font-size: 12px; color: #4a5568; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header"><h1>HOPn</h1></div>
    <div class="body">
        @if($locale === 'de')
            <p>Fast geschafft — bitte bestätigen Sie Ihr Abonnement des HOPn-Newsletters, indem Sie auf die Schaltfläche unten klicken.</p>
        @elseif($locale === 'ar')
            <p>خطوة أخيرة — يرجى تأكيد اشتراكك في نشرة HOPn الإخبارية بالنقر على الزر أدناه.</p>
        @else
            <p>Almost there — please confirm your subscription to the HOPn newsletter by clicking the button below.</p>
        @endif

        <div class="cta">
            <a href="{{ $confirmUrl }}">
                @if($locale === 'de') Abonnement bestätigen
                @elseif($locale === 'ar') تأكيد الاشتراك
                @else Confirm Subscription @endif
            </a>
        </div>

        <p class="fallback">{{ $confirmUrl }}</p>

        @if($locale === 'de')
            <p style="margin-top:24px;">Wenn Sie sich nicht angemeldet haben, ignorieren Sie diese E-Mail einfach — es passiert nichts weiter.</p>
        @elseif($locale === 'ar')
            <p style="margin-top:24px;">إذا لم تقم بالتسجيل، يمكنك تجاهل هذا البريد الإلكتروني بأمان.</p>
        @else
            <p style="margin-top:24px;">If you didn't sign up for this, you can safely ignore this email.</p>
        @endif
    </div>
    <div class="footer">HOPn &middot; {{ config('app.url') }}</div>
</div>
</body>
</html>
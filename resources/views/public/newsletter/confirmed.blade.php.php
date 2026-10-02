<x-layouts.public :title="$lang === 'de' ? 'Newsletter bestätigt' : ($lang === 'ar' ? 'تم تأكيد الاشتراك' : 'Newsletter Confirmed')">
@if($lang === 'ar') @php request()->attributes->set('dir', 'rtl'); @endphp @endif

<section style="padding:120px 0; background:#080D1A; min-height:50vh;" @if($lang === 'ar') dir="rtl" @endif>
    <div class="container-shell hopn-reveal" style="max-width:560px; text-align:center;">

        @if($success)
            <div style="width:64px; height:64px; margin:0 auto 24px; border-radius:50%; background:rgba(16,185,129,0.12); display:flex; align-items:center; justify-content:center; font-size:28px;">✓</div>
            <h1 style="font-size:clamp(26px,4vw,34px); font-weight:800; color:white; margin-bottom:12px;">
                @if($lang === 'de') Abonnement bestätigt
                @elseif($lang === 'ar') تم تأكيد اشتراكك
                @else You're subscribed @endif
            </h1>
            <p style="color:#CBD5E1; font-size:15px; line-height:1.7;">
                @if($lang === 'de') Vielen Dank — Ihre E-Mail-Adresse wurde bestätigt. Sie erhalten künftig Neuigkeiten von HOPn.
                @elseif($lang === 'ar') شكرًا لك — تم تأكيد بريدك الإلكتروني. ستتلقى تحديثات HOPn القادمة.
                @else Thank you — your email is confirmed. You'll receive future updates from HOPn. @endif
            </p>
        @else
            <h1 style="font-size:clamp(26px,4vw,34px); font-weight:800; color:white; margin-bottom:12px;">
                @if($lang === 'de') Link ungültig oder abgelaufen
                @elseif($lang === 'ar') الرابط غير صالح أو منتهي الصلاحية
                @else Link not valid @endif
            </h1>
            <p style="color:#CBD5E1; font-size:15px; line-height:1.7;">
                @if($lang === 'de') Dieser Bestätigungslink wurde bereits verwendet oder ist abgelaufen. Sie können sich erneut anmelden.
                @elseif($lang === 'ar') تم استخدام رابط التأكيد هذا من قبل أو انتهت صلاحيته. يمكنك التسجيل مرة أخرى.
                @else This confirmation link has already been used or has expired. You can sign up again. @endif
            </p>
        @endif

        <a href="{{ route('home', ['lang' => $lang]) }}" class="btn-primary" style="display:inline-block; margin-top:32px; text-decoration:none;">
            @if($lang === 'de') Zur Startseite
            @elseif($lang === 'ar') العودة إلى الصفحة الرئيسية
            @else Back to Home @endif
        </a>
    </div>
</section>
</x-layouts.public>
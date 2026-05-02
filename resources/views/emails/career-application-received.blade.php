<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received — HOPn</title>
    <style>
        body { margin: 0; padding: 0; background: #0f1523; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; }
        .wrapper { max-width: 600px; margin: 32px auto; background: #1a2235; border-radius: 12px; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0a0f1e 0%, #1e2d4f 100%); padding: 40px; text-align: center; border-bottom: 2px solid #4f6ef7; }
        .header h1 { margin: 0 0 4px; font-size: 26px; font-weight: 800; color: #fff; }
        .header p { margin: 0; color: #7c8db5; font-size: 14px; }
        .body { padding: 40px; }
        .body h2 { margin: 0 0 16px; font-size: 20px; color: #fff; text-align: center; }
        .body p { color: #94a3b8; font-size: 15px; line-height: 1.7; margin: 0 0 16px; }
        .job-box { background: linear-gradient(135deg, #1e2d4f, #0f1523); border: 1px solid #4f6ef7; border-radius: 10px; padding: 20px 24px; margin: 24px 0; text-align: center; }
        .job-box .role { font-size: 18px; font-weight: 700; color: #fff; margin: 0 0 4px; }
        .job-box .company { font-size: 13px; color: #4f6ef7; margin: 0; }
        .steps { margin: 24px 0; }
        .step { display: flex; align-items: flex-start; margin-bottom: 16px; }
        .step-num { min-width: 28px; height: 28px; background: #4f6ef7; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: #fff; margin-right: 14px; margin-top: 1px; }
        .step-text { font-size: 14px; color: #94a3b8; line-height: 1.5; }
        .step-text strong { color: #e2e8f0; }
        .cta { text-align: center; margin-top: 28px; }
        .cta a { display: inline-block; background: #4f6ef7; color: #fff; text-decoration: none; padding: 13px 30px; border-radius: 8px; font-weight: 600; font-size: 14px; }
        .footer { padding: 20px 40px; border-top: 1px solid #2d3a52; text-align: center; font-size: 12px; color: #4a5568; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>HOPn</h1>
        <p>Careers</p>
    </div>
    <div class="body">
        <div style="text-align:center;font-size:44px;margin-bottom:16px;">🚀</div>
        <h2>Your application is in!</h2>
        <p style="text-align:center;">Hi <strong style="color:#fff;">{{ $applicationData['name'] ?? 'there' }}</strong>, thanks for applying to HOPn. We've received your application and our team will review it shortly.</p>

        <div class="job-box">
            <p class="role">{{ $jobTitle }}</p>
            <p class="company">HOPn</p>
        </div>

        <p>Here's what happens next:</p>

        <div class="steps">
            <div class="step">
                <span class="step-num">1</span>
                <div class="step-text"><strong>Application Review</strong> — Our hiring team will review your CV and application within 5–7 business days.</div>
            </div>
            <div class="step">
                <span class="step-num">2</span>
                <div class="step-text"><strong>Initial Interview</strong> — If your profile matches, we'll reach out to schedule a 30-minute intro call.</div>
            </div>
            <div class="step">
                <span class="step-num">3</span>
                <div class="step-text"><strong>Decision</strong> — We aim to keep the process efficient and respectful of your time.</div>
            </div>
        </div>

        <p style="font-size:13px;color:#4a5568;">Questions? Reply directly to this email or contact us at <a href="mailto:{{ config('mail.from.address') }}" style="color:#4f6ef7;">{{ config('mail.from.address') }}</a>.</p>

        <div class="cta">
            <a href="{{ config('app.url') }}/careers">View All Open Positions →</a>
        </div>
    </div>
    <div class="footer">
        © {{ date('Y') }} HOPn. All rights reserved. · {{ config('app.url') }}
    </div>
</div>
</body>
</html>

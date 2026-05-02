<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Application — HOPn HR</title>
    <style>
        body { margin: 0; padding: 0; background: #0f1523; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; }
        .wrapper { max-width: 600px; margin: 32px auto; background: #1a2235; border-radius: 12px; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0a0f1e 0%, #1e2d4f 100%); padding: 32px 40px; border-bottom: 2px solid #4f6ef7; }
        .header h1 { margin: 0 0 6px; font-size: 20px; font-weight: 700; color: #fff; }
        .badge { display: inline-block; padding: 3px 12px; background: #4f6ef7; border-radius: 20px; font-size: 11px; font-weight: 700; color: #fff; text-transform: uppercase; letter-spacing: 0.5px; }
        .body { padding: 36px 40px; }
        .field { margin-bottom: 18px; }
        .field-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #7c8db5; margin-bottom: 4px; }
        .field-value { font-size: 15px; color: #e2e8f0; background: #0f1523; padding: 10px 14px; border-radius: 6px; border-left: 3px solid #4f6ef7; }
        .divider { height: 1px; background: #2d3a52; margin: 24px 0; }
        .cta { margin-top: 28px; text-align: center; }
        .cta a { display: inline-block; background: #4f6ef7; color: #fff; text-decoration: none; padding: 13px 30px; border-radius: 8px; font-weight: 600; font-size: 14px; }
        .footer { padding: 20px 40px; border-top: 1px solid #2d3a52; text-align: center; font-size: 12px; color: #4a5568; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>📋 New Job Application</h1>
        <span class="badge">HR Notification</span>
    </div>
    <div class="body">
        <p style="color:#94a3b8;font-size:14px;margin-top:0;">A new application has been submitted for the following position on {{ now()->format('d M Y, H:i') }}.</p>

        <div class="field">
            <div class="field-label">Position Applied For</div>
            <div class="field-value" style="font-weight:700;color:#4f6ef7;">{{ $jobTitle }}</div>
        </div>

        <div class="divider"></div>

        <div class="field">
            <div class="field-label">Applicant Name</div>
            <div class="field-value">{{ $applicationData['name'] ?? '—' }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email</div>
            <div class="field-value">{{ $applicationData['email'] ?? '—' }}</div>
        </div>

        @if (!empty($applicationData['phone']))
        <div class="field">
            <div class="field-label">Phone</div>
            <div class="field-value">{{ $applicationData['phone'] }}</div>
        </div>
        @endif

        @if (!empty($applicationData['cover_letter']))
        <div class="field">
            <div class="field-label">Cover Letter</div>
            <div class="field-value" style="white-space:pre-line;">{{ $applicationData['cover_letter'] }}</div>
        </div>
        @endif

        @if (!empty($applicationData['cv_path']))
        <div class="field">
            <div class="field-label">CV File</div>
            <div class="field-value">{{ basename($applicationData['cv_path']) }} <span style="color:#4a5568;">(stored in /storage/career-cv/)</span></div>
        </div>
        @endif

        <div class="cta">
            <a href="{{ config('app.url') }}/admin/applicants">Review in Admin Panel →</a>
        </div>
    </div>
    <div class="footer">
        HOPn HR System · {{ config('app.url') }} · Automated notification — do not reply.
    </div>
</div>
</body>
</html>

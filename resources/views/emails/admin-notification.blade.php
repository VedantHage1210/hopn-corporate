<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead — HOPn</title>
    <style>
        body { margin: 0; padding: 0; background: #0f1523; font-family: 'Segoe UI', Arial, sans-serif; color: #e2e8f0; }
        .wrapper { max-width: 600px; margin: 32px auto; background: #1a2235; border-radius: 12px; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0a0f1e 0%, #1e2d4f 100%); padding: 32px 40px; border-bottom: 2px solid #4f6ef7; }
        .header img { height: 36px; }
        .header h1 { margin: 12px 0 0; font-size: 22px; font-weight: 700; color: #fff; letter-spacing: -0.3px; }
        .badge { display: inline-block; margin-top: 8px; padding: 3px 12px; background: #4f6ef7; border-radius: 20px; font-size: 12px; font-weight: 600; color: #fff; text-transform: uppercase; letter-spacing: 0.5px; }
        .body { padding: 36px 40px; }
        .field { margin-bottom: 20px; }
        .field-label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #7c8db5; margin-bottom: 4px; }
        .field-value { font-size: 15px; color: #e2e8f0; line-height: 1.6; background: #0f1523; padding: 10px 14px; border-radius: 6px; border-left: 3px solid #4f6ef7; }
        .cta { margin-top: 32px; text-align: center; }
        .cta a { display: inline-block; background: #4f6ef7; color: #fff; text-decoration: none; padding: 13px 30px; border-radius: 8px; font-weight: 600; font-size: 14px; }
        .footer { padding: 20px 40px; border-top: 1px solid #2d3a52; text-align: center; font-size: 12px; color: #4a5568; }
        .divider { height: 1px; background: #2d3a52; margin: 24px 0; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>🔔 New Lead Received</h1>
        <span class="badge">{{ ucwords(str_replace('-', ' ', $formType)) }}</span>
    </div>
    <div class="body">
        <p style="color:#94a3b8;font-size:14px;margin-top:0;">A new submission has arrived via the <strong style="color:#fff;">{{ ucwords(str_replace('-', ' ', $formType)) }}</strong> form on {{ config('app.name') }}.</p>

        <div class="divider"></div>

        <div class="field">
            <div class="field-label">Full Name</div>
            <div class="field-value">{{ $leadData['name'] ?? '—' }}</div>
        </div>

        <div class="field">
            <div class="field-label">Email Address</div>
            <div class="field-value">{{ $leadData['email'] ?? '—' }}</div>
        </div>

        @if (!empty($leadData['phone']))
        <div class="field">
            <div class="field-label">Phone</div>
            <div class="field-value">{{ $leadData['phone'] }}</div>
        </div>
        @endif

        @if (!empty($leadData['company']))
        <div class="field">
            <div class="field-label">Company</div>
            <div class="field-value">{{ $leadData['company'] }}</div>
        </div>
        @endif

        @if (!empty($leadData['service_interest']))
        <div class="field">
            <div class="field-label">Service of Interest</div>
            <div class="field-value">{{ $leadData['service_interest'] }}</div>
        </div>
        @endif

        @if (!empty($leadData['budget_range']))
        <div class="field">
            <div class="field-label">Budget Range</div>
            <div class="field-value">{{ $leadData['budget_range'] }}</div>
        </div>
        @endif

        @if (!empty($leadData['partner_type']))
        <div class="field">
            <div class="field-label">Partner Type</div>
            <div class="field-value">{{ ucwords(str_replace('_', ' ', $leadData['partner_type'])) }}</div>
        </div>
        @endif

        @if (!empty($leadData['program_of_interest']))
        <div class="field">
            <div class="field-label">Program of Interest</div>
            <div class="field-value">{{ $leadData['program_of_interest'] }}</div>
        </div>
        @endif

        @if (!empty($leadData['message']))
        <div class="field">
            <div class="field-label">Message</div>
            <div class="field-value" style="white-space:pre-line;">{{ $leadData['message'] }}</div>
        </div>
        @endif

        <div class="divider"></div>

        @if (!empty($leadData['source_url']))
        <p style="font-size:12px;color:#4a5568;margin:0 0 4px;">Source URL: {{ $leadData['source_url'] }}</p>
        @endif
        @if (!empty($leadData['utm_source']))
        <p style="font-size:12px;color:#4a5568;margin:0;">UTM: {{ $leadData['utm_source'] }} / {{ $leadData['utm_medium'] ?? '—' }} / {{ $leadData['utm_campaign'] ?? '—' }}</p>
        @endif

        <div class="cta">
            <a href="{{ config('app.url') }}/admin/leads">View in Admin Panel →</a>
        </div>
    </div>
    <div class="footer">
        HOPn — {{ config('app.url') }} · This is an automated notification.
    </div>
</div>
</body>
</html>

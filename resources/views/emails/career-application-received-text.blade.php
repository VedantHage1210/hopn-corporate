Application Received — HOPn Careers
=====================================

Hi {{ $applicationData['name'] ?? 'there' }},

Thank you for applying for the {{ $jobTitle }} position at HOPn.

We have received your application and our team will review it within 5–7 business days.

What happens next:
1. Application Review — our hiring team reviews your CV
2. Initial Interview — a 30-minute intro call if your profile matches
3. Decision — we keep the process efficient

Questions? Email us at {{ config('mail.from.address') }}

View all open positions: {{ config('app.url') }}/careers

© {{ date('Y') }} HOPn — {{ config('app.url') }}

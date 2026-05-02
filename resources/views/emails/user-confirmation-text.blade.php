Thank you for contacting HOPn!
===============================

Hi {{ $leadData['name'] ?? 'there' }},

We have received your {{ ucwords(str_replace('-', ' ', $formType)) }} submission.

@if($formType === 'contact')
One of our team members will get back to you within 1–2 business days.
@elseif($formType === 'proposal')
Our team will review your requirements and prepare a tailored response within 2–3 business days.
@elseif($formType === 'partner-inquiry')
Our partnerships team will reach out to you shortly.
@elseif($formType === 'training-application')
We will review your application and contact you soon with next steps.
@else
We will be in touch soon.
@endif

If you have urgent questions, please email us at {{ config('mail.from.address') }}.

Visit us: {{ config('app.url') }}

© {{ date('Y') }} HOPn. All rights reserved.

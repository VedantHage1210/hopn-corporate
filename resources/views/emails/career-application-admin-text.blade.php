New Job Application — HOPn HR
==============================

Position: {{ $jobTitle }}
Date:     {{ now()->format('d M Y, H:i') }}

APPLICANT DETAILS
-----------------
Name:  {{ $applicationData['name'] ?? '—' }}
Email: {{ $applicationData['email'] ?? '—' }}
Phone: {{ $applicationData['phone'] ?? '—' }}

@if(!empty($applicationData['cover_letter']))
Cover Letter:
{{ $applicationData['cover_letter'] }}
@endif

CV File: {{ $applicationData['cv_path'] ?? '—' }}

Review in admin: {{ config('app.url') }}/admin/applicants

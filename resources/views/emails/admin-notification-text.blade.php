HOPn — New Lead: {{ ucwords(str_replace('-', ' ', $formType)) }}
=====================================================

Name:    {{ $leadData['name'] ?? '—' }}
Email:   {{ $leadData['email'] ?? '—' }}
Phone:   {{ $leadData['phone'] ?? '—' }}
Company: {{ $leadData['company'] ?? '—' }}

@if(!empty($leadData['message']))
Message:
{{ $leadData['message'] }}
@endif

Source: {{ $leadData['source_url'] ?? '—' }}
UTM:    {{ $leadData['utm_source'] ?? '—' }} / {{ $leadData['utm_medium'] ?? '—' }} / {{ $leadData['utm_campaign'] ?? '—' }}

View in admin: {{ config('app.url') }}/admin/leads

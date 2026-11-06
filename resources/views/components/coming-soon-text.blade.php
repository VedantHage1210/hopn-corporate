@php $l = request()->route('lang', app()->getLocale()); @endphp
{{ $l === 'ar' ? 'قريبًا' : ($l === 'de' ? 'Demnächst verfügbar' : 'Coming soon') }}

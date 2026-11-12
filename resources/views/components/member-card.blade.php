@props(['member', 'lang' => 'en'])
@php
    $pick = function (string $base) use ($member, $lang) {
        $v = $lang === 'ar' ? ($member->{$base.'_ar'} ?? null) : ($lang === 'de' ? ($member->{$base.'_de'} ?? null) : null);
        return $v ?: ($member->{$base.'_en'} ?? '');
    };
    $role = $pick('role');
    $bio  = $pick('bio');
@endphp
<x-people-styles />
<article class="hopn-person hopn-reveal">
    @if($member->photo)
        <img class="hopn-person-photo" loading="lazy" decoding="async" src="{{ $member->photo }}" alt="{{ $member->name }}">
    @else
        <div class="hopn-person-photo" aria-hidden="true">{{ mb_strtoupper(mb_substr($member->name, 0, 1)) }}</div>
    @endif
    <h3 class="hopn-person-name">{{ $member->name }}</h3>
    @if($role)<p class="hopn-person-role">{{ $role }}</p>@endif
    @if($bio)<p class="hopn-person-bio">{{ $bio }}</p>@endif
    @if($member->linkedin)
    <a class="hopn-person-link" href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $member->name }} on LinkedIn">LinkedIn →</a>
    @endif
</article>

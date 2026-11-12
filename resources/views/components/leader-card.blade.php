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
<article class="hopn-person hopn-person--lead hopn-reveal">
    @if($member->photo)
        <img class="hopn-person-photo" loading="lazy" decoding="async" src="{{ $member->photo }}" alt="{{ $member->name }}">
    @else
        <div class="hopn-person-photo" aria-hidden="true">{{ mb_strtoupper(mb_substr($member->name, 0, 1)) }}</div>
    @endif
    <span class="hopn-person-tag">{{ $member->leaderLabel($lang) }}</span>
    <h3 class="hopn-person-name">{{ $member->name }}</h3>
    @if($role)<p class="hopn-person-role">{{ $role }}</p>@endif
    @if($bio)<p class="hopn-person-bio">{{ $bio }}</p>@endif
    @if($member->linkedin)
    <a class="hopn-person-link" href="{{ $member->linkedin }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $member->name }} on LinkedIn">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45z"/></svg>
        LinkedIn
    </a>
    @endif
</article>

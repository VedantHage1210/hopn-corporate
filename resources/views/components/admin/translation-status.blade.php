{{--
    Reusable translation-completeness badge for admin listing pages.
    Usage (bare EN convention, e.g. name/name_de/name_ar):
        <x-admin.translation-status :item="$service" :fields="['name', 'summary']" />
    Usage (explicit _en convention, e.g. title_en/title_de/title_ar):
        <x-admin.translation-status :item="$product" :fields="['title']" en-suffix="_en" />
--}}
@props(['item', 'fields' => ['name'], 'enSuffix' => ''])
@php
    $langs = ['en' => $enSuffix, 'de' => '_de', 'ar' => '_ar'];
    $status = [];
    foreach ($langs as $code => $suffix) {
        $filled = true;
        foreach ($fields as $field) {
            $col = $field . $suffix;
            if (empty($item->{$col} ?? null)) {
                $filled = false;
                break;
            }
        }
        $status[$code] = $filled;
    }
@endphp
<span class="inline-flex items-center gap-1" title="Translation completeness">
    @foreach($status as $code => $filled)
        <span class="inline-flex h-5 w-7 items-center justify-center rounded text-[10px] font-bold uppercase
            {{ $filled ? 'bg-green-900/50 text-green-300 border border-green-700' : 'bg-slate-800 text-slate-500 border border-slate-700' }}">
            {{ $code }}
        </span>
    @endforeach
</span>

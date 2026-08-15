@php($lang = request()->route('lang', 'en'))
@if($paginator->hasPages())
    <nav class="mt-6 flex items-center justify-between text-sm text-slate-300" @if($lang === 'ar') dir="rtl" @endif>
        <div>
            @if($paginator->onFirstPage())
                <span class="opacity-50">@if($lang === 'ar') السابق @elseif($lang === 'de') Zurück @else Previous @endif</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="hover:text-white">@if($lang === 'ar') السابق @elseif($lang === 'de') Zurück @else Previous @endif</a>
            @endif
        </div>
        <div>
            @if($lang === 'ar') صفحة {{ $paginator->currentPage() }} من {{ $paginator->lastPage() }}
            @elseif($lang === 'de') Seite {{ $paginator->currentPage() }} von {{ $paginator->lastPage() }}
            @else Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }} @endif
        </div>
        <div>
            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="hover:text-white">@if($lang === 'ar') التالي @elseif($lang === 'de') Weiter @else Next @endif</a>
            @else
                <span class="opacity-50">@if($lang === 'ar') التالي @elseif($lang === 'de') Weiter @else Next @endif</span>
            @endif
        </div>
    </nav>
@endif

@if($paginator->hasPages())
    <nav class="mt-6 flex items-center justify-between text-sm text-slate-300">
        <div>
            @if($paginator->onFirstPage())
                <span class="opacity-50">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="hover:text-white">Previous</a>
            @endif
        </div>
        <div>Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</div>
        <div>
            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="hover:text-white">Next</a>
            @else
                <span class="opacity-50">Next</span>
            @endif
        </div>
    </nav>
@endif

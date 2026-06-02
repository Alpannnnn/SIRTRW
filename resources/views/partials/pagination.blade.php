@if ($paginator->hasPages())
    <div class="flex justify-between items-center mt-6 flex-wrap gap-4 pt-4 border-t border-slate-100">
        {{-- Left: Info text --}}
        <div class="text-sm text-slate-500 font-semibold">
            Menampilkan <span class="text-slate-900 font-bold">{{ $paginator->firstItem() }}</span> sampai <span class="text-slate-900 font-bold">{{ $paginator->lastItem() }}</span> dari <span class="text-slate-900 font-bold">{{ $paginator->total() }}</span> hasil
        </div>

        {{-- Right: Pagination links --}}
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 bg-slate-50 text-slate-400 cursor-not-allowed" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 hover:text-teal-700 hover:border-teal-600 transition shadow-xs" rel="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center justify-center w-8 h-8 text-slate-400 font-bold" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-teal-700 text-white font-extrabold text-sm shadow-xs" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 hover:text-teal-700 hover:border-teal-600 font-bold text-sm transition shadow-xs">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 hover:text-teal-700 hover:border-teal-600 transition shadow-xs" rel="next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            @else
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-slate-200 bg-slate-50 text-slate-400 cursor-not-allowed" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
            @endif
        </nav>
    </div>
@endif

@if ($paginator->hasPages() || $paginator->total() > 0)
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-2">
        {{-- Showing X to Y of Z results --}}
        <div class="text-black fw-bold text-lg nunito-semibold ms-1">
            Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
        </div>

        {{-- Pagination Buttons --}}
        @if ($paginator->hasPages() && $paginator->lastPage() > 1)
            <nav>
                <ul class="pagination mb-0 d-flex align-items-center gap-1">
                    {{-- Previous --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link px-3 py-1 fw-semibold border">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link px-3 py-1 fw-semibold text-dark border"
                               href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Page numbers --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">
                                <span class="page-link px-3 py-1 fw-semibold border">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link px-3 py-1 fw-semibold text-white bg-dark border border-dark">
                                            {{ $page }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link px-3 py-1 fw-semibold text-dark border"
                                           href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link px-3 py-1 fw-semibold text-dark border"
                               href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link px-3 py-1 fw-semibold border">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
@endif

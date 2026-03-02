@if ($paginator->hasPages())
<nav>
    <ul class="pagination pagination-rounded mb-0">
        {{-- Previous --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() ?? '#' }}" aria-label="Previous">
                <i class="bx bx-chevron-left"></i>
            </a>
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() ?? '#' }}" aria-label="Next">
                <i class="bx bx-chevron-right"></i>
            </a>
        </li>
    </ul>
</nav>
@endif

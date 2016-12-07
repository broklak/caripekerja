@if ($paginator->hasPages())
    <div class="pagination-container">
        <nav class="pagination">
            <ul>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="blank"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span><a class="current-page">{{ $page }}</a></span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
            </ul>
        </nav>

        <nav class="pagination-next-prev">
            <ul>

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li><a class="prev">&laquo;</a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" class="prev">&laquo;</a></li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" class="next">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif

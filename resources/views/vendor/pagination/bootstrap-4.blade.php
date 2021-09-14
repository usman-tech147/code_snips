@if ($paginator->hasPages())
    <nav id="pagination_nav_bar">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" style="border-radius: 20px;border-color: black; margin: 5px" aria-hidden="true"> << </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" style="border-radius: 20px;border-color: black;color: green; margin: 5px" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       aria-label="@lang('pagination.previous')"> << </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link" style="border-radius: 20px;border-color: black; margin: 5px">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" aria-current="page">
                                <span class="page-link" style="border-radius: 20px; margin: 5px; background-color: black; color: white">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" style="border-radius: 20px;border-color: black;color: green; margin: 5px" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" style="border-radius: 20px;border-color: black;color: green; margin: 5px;" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')"> >> </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" style="border-radius: 20px;border-color: black; margin: 5px;" aria-hidden="true"> >> </span>
                </li>
            @endif
        </ul>
    </nav>
@endif

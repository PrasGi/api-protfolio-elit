<!-- resources/views/vendor/pagination/pagination.blade.php -->

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link border-0 text-muted rounded-circle d-flex align-items-center justify-content-center" style="background-color: #f8f9fa; width: 40px; height: 40px; ">Prev</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link border-0 text-dark rounded-circle d-flex align-items-center justify-content-center" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="background-color: #f8f9fa; width: 40px; height: 40px; ">Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link border-0 text-muted rounded-circle d-flex align-items-center justify-content-center" style="background-color: #f8f9fa; width: 40px; height: 40px;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <span class="page-link border border-primary text-primary rounded-circle d-flex align-items-center justify-content-center" style="background-color: #ffffff; width: 40px; height: 40px;">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 text-dark rounded-circle d-flex align-items-center justify-content-center" href="{{ $url }}" style="background-color: #f8f9fa; width: 40px; height: 40px;">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link border-0 text-dark rounded-circle d-flex align-items-center justify-content-center" href="{{ $paginator->nextPageUrl() }}" rel="next" style="background-color: #f8f9fa; width: 40px; height: 40px;">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link border-0 text-muted rounded-circle d-flex align-items-center justify-content-center" style="background-color: #f8f9fa; width: 40px; height: 40px;">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

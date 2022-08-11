@if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-label="@lang('pagination.previous')">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Precedent</a>
                </li>
            @else
                <li class="page-item" aria-label="@lang('pagination.previous')">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" tabindex="-1" aria-disabled="true">Precedent</a>
                </li>
            @endif
            @foreach ($elements as $element)

                    @if (is_string($element))
                        <a class="page-item disabled">{{ $element }}</a>
                    @endif


                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant</a>
                </li>
            @endif
        </ul>
    </nav>
@endif

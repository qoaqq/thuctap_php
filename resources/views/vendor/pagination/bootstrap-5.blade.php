@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    @if ($paginator->currentPage() > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif

                    @php
                        $start = $paginator->currentPage() - 1;
                        $end = $paginator->currentPage() + 1;
                        if ($start < 1) {
                            $start = 1;
                            $end = min($paginator->lastPage(), $start + 2);
                        }
                        if ($end > $paginator->lastPage()) {
                            $end = $paginator->lastPage();
                            $start = max(1, $end - 2);
                        }
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="@lang('pagination.next')">&raquo;</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

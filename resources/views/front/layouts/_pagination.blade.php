@if ($paginator->lastPage() > 1)
    <ul id="page">
        <a href="{{ $paginator->url(1) }}">
            <li>
                上一頁
            </li>
        </a>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <a href="{{ $paginator->url($i) }}">
                <li >
                    {{ $i }}
                </li>
            </a>
        @endfor
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >
            <li >
                下一頁
            </li>
        </a>
    </ul>
@endif

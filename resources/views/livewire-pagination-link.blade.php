<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
 
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>

<!--
@if($paginator->hasPages())
    <u1 class="pagination pagination-rounded justify-content-center mt-4">
        @if($paginator->onFirstPage())
        <li class="page-item disabled"><a href="javascript:;" class="page-link">Prev</a></li>
        @else
        <li class="page-item"><a href="javascript:;" rel="prev" wire:click="previousPage" class="page-link">Prev</a></li>
        @endif

        @foreach($elements as $element)
            @if(is_string($element))
                <li class="page-item disabled"><a class="page-link"><span>{{$element}}</span></a></li>
            @endif

            @if(is_array($element))
                @foreach($element as $page=>$url)
                    @if($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link"><span>{{$page}}</span></a></li>
                    @else
                    <li class="page-item"><a href="javascript:;" wire:click="gotoPage({{$page}})" class="page-link"><span>{{$page}}</span></a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if($paginator->hasMorePages())
            <li class="page-item"><a href="javascript:;" wire:click="nextPage" rel="next" class="page-link">Next</a></li>
            @else
            <li class="page-item disabled"><a href="javascript:;" class="page-link">Next</a></li>
        @endif
    </u1>
@endif
-->
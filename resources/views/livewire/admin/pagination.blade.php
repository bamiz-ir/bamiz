@if($paginator->hasPages())
    <div>
        <ul class="pagination">
            {{-- Start Privious --}}
            @if ($paginator->onFirstPage())
                <li style="cursor: no-drop !important;" disabled><a>قبلی</a></li>
            @else
                <li><a style="cursor: pointer !important;" wire:click="previousPage">قبلی</a></li>
            @endif
            {{-- end Previous --}}
            @foreach ($elements as $element)
                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page ==  $paginator->currentPage())
                            <li style="cursor: pointer !important;" class="active"><a  wire:loading.attr="disabled" wire:click="gotoPage({{$page}})"
                                   class="active">{{$page}}</a></li>
                        @else
                            <li style="cursor: pointer !important;"><a wire:loading.attr="disabled" wire:click="gotoPage({{$page}})">{{$page}}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Start Next --}}
            @if ($paginator->hasMorePages())
                <li style="cursor: pointer !important;"><a wire:click="nextPage" >بعدی</a></li>
            @else
                <li style="cursor: no-drop !important;" disabled><a>بعدی</a></li>
            @endif
            {{-- End Next --}}
        </ul>
    </div>
@endif

@section('title', 'Início')

<div>

    <div class="pt-3 pb-2  osahan-categories">


        @include('livewire.search-bar')

    </div>
    <div class="py-3 osahan-promos">

        <div class="promo-slider pb-0 mb-0">
            @foreach($slides as $slide)
                <div class="osahan-slider-item mx-2">
                    <a href="{{ $slide->link }}">
                        <img src="storage/app/{{ $slide->foto }}"
                             class="img-fluid mx-auto rounded"
                             alt="{{ $slide->titulo  }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>

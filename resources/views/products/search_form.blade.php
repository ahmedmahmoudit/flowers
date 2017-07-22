<form class="" role="form" method="GET" action="{{ route('search') }}">
    <ul class="c-shop-filter-search-1 list-unstyled">
        <li>
            <label class="control-label c-font-uppercase c-font-bold">{{ __('Search Term') }}</label>
            <input type="text" name="term" class="form-control c-square c-theme input-lg" value="{{ $searchTerm }}" placeholder="{{ __('Product name, Sku or Item number') }}">
        </li>
        {{--<li>--}}
            {{--<label class="control-label c-font-uppercase c-font-bold">{{ __('Category') }}</label>--}}
            {{--<select name="category" class="form-control c-square c-theme">--}}
                {{--<option value="">{{ __('All Category') }}</option>--}}
                {{--@foreach($parentCategories as $parentCategory)--}}
                    {{--<option value="{{ $parentCategory->slug }}"--}}
                            {{--@if($selectedCategory === $parentCategory->slug)--}}
                            {{--selected--}}
                            {{--@endif--}}
                    {{-->{{$parentCategory->name}}</option>--}}
                    {{--@foreach($parentCategory->children as $childCategory)--}}
                        {{--<option value="{{ $childCategory->slug }}"--}}
                                {{--@if($selectedCategory === $childCategory->slug)--}}
                                {{--selected--}}
                                {{--@endif--}}
                        {{-->{{$childCategory->name}}</option>--}}
                    {{--@endforeach--}}
                {{--@endforeach--}}
            {{--</select>--}}
        {{--</li>--}}
        <li>
            <label class="control-label c-font-uppercase c-font-bold">{{ __('Store') }}</label>
            <select name="store" class="form-control c-square c-theme">
                <option value="">{{ __('All Stores') }}</option>
                @foreach($stores as $store)
                    <option value="{{ $store->slug }}"
                            @if($selectedStore === $store->slug)
                            selected
                            @endif
                    >{{$store->name}}</option>
                @endforeach
            </select>
        </li>

        <li>
            <label class="control-label c-font-uppercase c-font-bold">Price</label>
            <p class="price-display">Price: {{$priceRangeFrom}} - {{$priceRangeTo}}</p>
            <div class="c-price-range-slider c-theme-1 input-group">
                <input type="hidden" name="pricefrom" id="pricefrom" value="{{ $priceRangeFrom }}" />
                <input type="hidden" name="priceto" id="priceto" value="{{ $priceRangeTo }}" />
                <input type="text" class="c-price-slider" data-slider-min="{{ $priceRangeMin }}" data-slider-max="{{ $priceRangeMax }}" data-slider-step="1" data-slider-value="[{{$priceRangeFrom}},{{$priceRangeTo}}]">
            </div>

        </li>

    </ul>

    <button type="submit" style="margin:50px 0px" class="col-xs-12 btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{ __('Search') }}</button>

</form>

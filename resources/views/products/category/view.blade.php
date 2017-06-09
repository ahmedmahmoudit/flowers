@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => $category->name, 'nav'=>true])
        <li><a href="{{ route('products.index') }}">{{ __('Products') }}</a></li>
        <li>/</li>
        <li><a href="{{ route('products.category.index',$category->parent->slug) }}">{{ ucfirst($category->parent->name) }}</a></li>
        <li>/</li>
        <li class="c-active"><a href="{{ route('products.category.index',$category->slug) }}">{{ ucfirst($category->name) }}</a></li>
    @endcomponent

    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-MENU-2 -->

            <!-- BEGIN: CONTENT/SHOPS/SHOP-FILTER-SEARCH-1 -->
            <ul class="c-shop-filter-search-1 list-unstyled">
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Category</label>
                    <select class="form-control c-square c-theme">
                        <option value="0">All Category</option>
                        <option value="1">Art</option>
                        <option value="2">Baby</option>
                        <option value="3">Books</option>
                        <option value="4">Business &amp; Industrial</option>
                        <option value="5">Cameras &amp; Photo</option>
                        <option value="6">Cell Phones &amp; Accessories</option>
                        <option value="7">Clothing, Shoes &amp; Accessories</option>
                        <option value="8">Coins &amp; Paper Money</option>
                        <option value="9">Collectibles</option>
                        <option value="10">Computers/Tablets &amp; Networking</option>
                    </select>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Store</label>
                    <select class="form-control c-square c-theme">
                        <option value="0">All Stores</option>
                        <option value="1">Art</option>
                        <option value="2">Baby</option>
                        <option value="3">Books</option>
                        <option value="4">Business &amp; Industrial</option>
                        <option value="5">Cameras &amp; Photo</option>
                        <option value="6">Cell Phones &amp; Accessories</option>
                        <option value="7">Clothing, Shoes &amp; Accessories</option>
                        <option value="8">Coins &amp; Paper Money</option>
                        <option value="9">Collectibles</option>
                        <option value="10">Computers/Tablets &amp; Networking</option>
                    </select>
                </li>

                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Range Slider Color</label>
                    <p>Price Range: $1 - $ 500</p>
                    <div class="c-price-range-slider c-theme-1 input-group">
                        <input type="text" class="c-price-slider" value="" data-slider-min="1" data-slider-max="500" data-slider-step="1" data-slider-value="[100,250]">
                    </div>
                </li>


            </ul><!-- END: CONTENT/SHOPS/SHOP-FILTER-SEARCH-1 -->

        </div>
        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-1 -->
            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="c-content-box c-size-lg c-bg-grey-1">
                        <div class="c-content-title-4">
                            <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ $category->name }}</span></h3>
                        </div>
                        <div class="row">
                            @foreach($category->products as $product)
                                @include('products.item_grid',['cartItems'=>$cartItems,'cols'=>4])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- END: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-1 -->

            <!-- BEGIN: CONTENT/SHOPS/SHOP-PRODUCT-TAB-2 -->

        </div>
    </div>


@endsection
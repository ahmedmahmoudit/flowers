@extends('layouts.master')

@section('content')
    <div class="c-content-box c-size-md">

        <div class="container">

            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-product-gallery">
                            <div class="c-product-gallery-content">
                                <div class="c-zoom">
                                    <img src="/img/1.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/2.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/3.jpg">
                                </div>
                                <div class="c-zoom">
                                    <img src="/img/4.jpg">
                                </div>
                            </div>
                            <div class="row c-product-gallery-thumbnail">
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/1.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/2.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/img/3.jpg">
                                </div>
                                <div class="col-xs-3 c-product-thumb c-product-thumb-last">
                                    <img src="/img/4.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-product-meta">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Warm Winter Jacket</h3>
                                <div class="c-line-left"></div>
                            </div>
                            <div class="c-product-badge">
                                <div class="c-product-sale">Sale</div>
                                <div class="c-product-new">New</div>
                            </div>
                            <div class="c-product-review">
                                <div class="c-product-rating">
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star-half-o c-font-red"></i>
                                </div>
                                <div class="c-product-write-review">
                                    <a class="c-font-red" href="#">Write a review</a>
                                </div>
                            </div>
                            <div class="c-product-price">$99.00</div>
                            <div class="c-product-short-desc">
                                Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.
                            </div>
                            <div class="row c-product-variant">
                                <div class="col-sm-12 col-xs-12">
                                    <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Size:</p>
                                    <div class="c-product-size">
                                        <select>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                    <div class="c-product-color">
                                        <p class="c-product-meta-label c-font-uppercase c-font-bold">Color:</p>
                                        <select>
                                            <option value="Red">Red</option>
                                            <option value="Black">Black</option>
                                            <option value="Beige">Beige</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="c-product-add-cart c-margin-t-20">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="c-input-group c-spinner">
                                            <p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">QTY:</p>
                                            <input type="text" class="form-control c-item-1" value="1">
                                            <div class="c-input-group-btn-vertical">
                                                <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-up"></i></button>
                                                <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-down"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                        <button class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
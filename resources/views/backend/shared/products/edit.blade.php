@extends('backend.layouts.master')
@section('title', 'Products')

@section('styles')
    @parent

    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {!! Form::open(['route'=>[Request::segment(1).'.products.update', $product->id],'method'=>'PUT','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputSku">Product ID (SKU)</label>
                                <input type="text" name="sku" class="form-control" id="exampleInputSku" value="{{$product->sku or old('sku')}}" disabled>
                                <p class="help-block"></p>
                            </div>
                            @if(Auth::user()->isManager())
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Select Store</label>
                                        <select class="form-control" name="store" value="{{old('store')}}">
                                            @foreach($stores as $store)
                                                @if($product->store_id == $store->id)
                                                    <option value="{{$store->id}}" selected> {{$store->name_en}} </option>
                                                @endif

                                                @if(old('store') == $store->id)
                                                    <option value="{{$store->id}}" selected> {{$store->name_en}} </option>
                                                @endif

                                                <option value="{{$store->id}}"> {{$store->name_en}} </option>
                                            @endforeach
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            @else
                                <div class="col-xs-6">
                                    <label>Product Status</label>
                                    <select class="form-control" name="active" value="{{$product->active or old('active')}}">
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">Name English</label>
                                <input type="text" name="name_en" class="form-control" id="inputNameEn" placeholder="Enter English Name" value="{{$product->name_en or old('name_en')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">Name Arabic</label>
                                <input type="text" name="name_ar" class="form-control" id="inputNameAr" placeholder="Enter Arabic Name" value="{{$product->name_ar or old('name_ar')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputHeight">Height</label>
                                <input type="text" name="height" class="form-control" id="inputHeight" placeholder="Enter Height" value="{{$product->detail->height or old('height')}}" required>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputWidth">Width</label>
                                <input type="text" name="width" class="form-control" id="inputWidth" placeholder="Enter Width" value="{{$product->detail->width or old('width')}}" required>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        {{--IF manager will render status in this section --}}
                        @if(Auth::user()->isManager())
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>Product Status</label>
                                    <select class="form-control" name="active" value="{{$product->active or old('active')}}">
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputPrice">Price</label>
                                <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Enter Price" value="{{$product->detail->price or old('price')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputWeight">Weight</label>
                                <input type="text" name="weight" class="form-control" id="inputWeight" placeholder="Enter Weight" value="{{$product->detail->weight or old('weight')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="checkbox">
                                    <label>
                                        @if($product->detail->is_sale || old('is_sale'))
                                            <input type="checkbox" id="is-sale" value="1" name="is_sale" value="{{old('is_sale')}}" checked="true">
                                        @else
                                            <input type="checkbox" id="is-sale" value="1" name="is_sale" value="{{old('is_sale')}}">
                                        @endif
                                        For Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputSalePrice">Sale Price</label>
                                <input type="text" name="sale_price" class="form-control for-sale" id="inputSalePrice" placeholder="Enter Sale Price" value="{{$product->detail->sale_price or old('sale_price')}}" {{$product->detail->is_sale == '1' ? '' : 'disabled'}}>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="inputStartDate">Start Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="start_sale_date" value="{{$product->detail->start_sale_date != null ? $product->detail->start_sale_date->format('d-m-Y') : old('start_sale_date')}}" id="inputStartDate" placeholder="Select Start Date" {{$product->detail->is_sale == '1' ? '' : 'disabled'}}>
                                </div>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="inputEndDate">End Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="end_sale_date" value="{{$product->detail->end_sale_date != null ? $product->detail->end_sale_date->format('d-m-Y') : old('end_sale_date')}}" id="inputEndDate" placeholder="Select End Date" {{$product->detail->is_sale == '1' ? '' : 'disabled'}}>
                                </div>
                                <p class="help-block"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputDescriptionEn">Description English</label>
                                <input type="text" name="description_en" value="{{$product->detail->description_en or old('description_en')}}" class="form-control" id="inputDescriptionEn" placeholder="Enter English Description">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputDescriptionAr">Description Arabic</label>
                                <input type="text" name="description_ar" value="{{$product->detail->description_ar or old('description_ar')}}" class="form-control" id="inputDescriptionAr" placeholder="Enter Arabic Description">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputQty">Quantity</label>
                                <input type="text" name="qty" value="{{$product->detail->quantity or old('qty')}}" class="form-control" id="inputQty" placeholder="Enter Quantity">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputMainImage">Main Image</label>
                                <input type="file" name="main_image" id="inputMainImage">
                                <div style="float: right;padding-right: 50%;"><img width="100" src="{{asset('uploads/products/'.$product->detail->main_image)}}"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-10">
                            <div class="form-control" style="height: auto;">
                                <div class="scroller" style="min-height:300px;"
                                     data-always-visible="1">
                                    @foreach($categories as $category)
                                        <div class="col-lg-4">
                                            <ul class="list-unstyled">
                                                @if($category->parent_id == 0)
                                                    <li>
                                                        <label>
                                                            {!! Form::radio('parent_id',$category->id, (in_array($category->id,$categoriesList,true)) ? true : false,['required'] ) !!}
                                                            {{ $category->name }}
                                                        </label>
                                                        @if(count($category->children) > 0)
                                                            <ul class="list-unstyled" style="padding-top: 10px;">
                                                                @foreach($category->children as $child)
                                                                    <li>
                                                                        <label>
                                                                            {!! Form::checkbox('categories[]',$child->id,(in_array($child->id,$categoriesList,true)) ? true : false) !!}
                                                                            {{ $child->name }}
                                                                        </label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @if(in_array($loop->index,[2,5,8,12]))
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                            <span class="help-block">* at least one category must be choosen</span>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--@foreach ($categories->chunk(3) as $array)--}}
                                {{--@foreach($array as $category)--}}
                                    {{--<div class="col-lg-4">--}}
                                        {{--<ul class="list-unstyled">--}}
                                            {{--<li>--}}
                                                {{--<label>--}}
                                                    {{--{!! Form::checkbox('categories[]',$category->id,(in_array($category->id,$categoriesList,true)) ? true : false) !!}--}}
                                                    {{--{{ $category->name }}--}}
                                                {{--</label>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product Images</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="images[]" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="images[]" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="images[]" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="images[]" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="image[]" id="exampleInputFile">
                            </div>
                        </div>

                        @if($product->productImages->first())
                            <div class="col-xs-6">
                                <table class="table table-striped">
                                    <tr>
                                        <td>image</td>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                    @foreach($product->productImages as $image)
                                        <tr>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <td><a href="{{asset('uploads/products/'.$image->image)}}"> {{$image->image}} </a></td>
                                            <td><a href="{{ route('manager.products.image.destroy', $image->id) }}" data-method="POST" data-laravel-method="delete" class="btn btn-danger btn-xs margin confirm-delete">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> Update </button>
                    </div>
                </div>
                <!-- /.box -->
                {!!  Form::close() !!}
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(window).bind("load", function() {
                if ($('#is-sale').is(':checked')) {
                    $('.for-sale').removeAttr('disabled');
                }
            });

            $('#is-sale').on('click', function(){
                $('.for-sale').prop('disabled', function(i, v) { return !v; });
            });

            $('#inputStartDate').datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy',
                startDate: '0d'
            });

            $('#inputEndDate').datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy',
                startDate: '+1d'
            });
        });
    </script>
@endsection

@extends('backend.layouts.master')
@section('title', __('adminPanel.products'))

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
                {!! Form::open(['route'=>[Request::segment(1).'.products.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.add_product_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputSku">{{__('adminPanel.product_id_sku')}}</label>
                                <input type="text" name="sku" class="form-control" id="exampleInputSku" placeholder="Enter product ID" value="{{old('sku')}}">
                                <p class="help-block"></p>
                            </div>
                            @if(Auth::user()->isManager())
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>{{__('adminPanel.select_store')}}</label>
                                        <select class="form-control" name="store" value="{{old('store')}}">
                                            @foreach($stores as $store)

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
                                    <label>{{__('adminPanel.product_status')}}</label>
                                    <select class="form-control" name="active" value="{{old('active')}}">
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">{{__('adminPanel.english_name')}}</label>
                                <input type="text" name="name_en" class="form-control" id="inputNameEn" placeholder="{{__('adminPanel.enter_english_name')}}" value="{{old('name_en')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">{{__('adminPanel.arabic_name')}}</label>
                                <input type="text" name="name_ar" class="form-control" id="inputNameAr" placeholder="{{__('adminPanel.enter_arabic_name')}}" value="{{old('name_ar')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputHeight">{{__('adminPanel.height')}}</label>
                                <input type="text" name="height" class="form-control" id="inputHeight" placeholder="Enter Height" value="{{old('height')}}" required>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputWidth">{{__('adminPanel.width')}}</label>
                                <input type="text" name="width" class="form-control" id="inputWidth" placeholder="Enter Width" value="{{old('width')}}" required>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        {{--IF manager will render status in this section --}}
                        @if(Auth::user()->isManager())
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>{{__('adminPanel.product_status')}}</label>
                                    <select class="form-control" name="active" value="{{old('active')}}">
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
                        <h3 class="box-title">{{__('adminPanel.add_product_details_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputPrice">{{__('adminPanel.price')}}</label>
                                <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Enter Price" value="{{old('price')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputWeight">{{__('adminPanel.weight')}}</label>
                                <input type="text" name="weight" class="form-control" id="inputWeight" placeholder="Enter Wright" value="{{old('weight')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-sale" value="1" name="is_sale" value="{{old('is_sale')}}">
                                        {{__('adminPanel.for_sale')}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputSalePrice">{{__('adminPanel.sale_price')}}</label>
                                <input type="text" name="sale_price" class="form-control for-sale" id="inputSalePrice" placeholder="Enter Sale Price" value="{{old('sale_price')}}" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputStartDate">{{__('adminPanel.start_date')}}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="start_sale_date" value="{{old('start_sale_date')}}" id="inputStartDate" placeholder="Select Start Date" disabled>
                                </div>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="inputEndDate">{{__('adminPanel.end_date')}}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="end_sale_date" value="{{old('end_sale_date')}}" id="inputEndDate" placeholder="Select End Date" disabled>
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputDescriptionEn">{{__('adminPanel.english_description')}}</label>
                                <input type="text" name="description_en" value="{{old('description_en')}}" class="form-control" id="inputDescriptionEn" placeholder="Enter English Description">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputDescriptionAr">{{__('adminPanel.arabic_description')}}</label>
                                <input type="text" name="description_ar" value="{{old('description_ar')}}" class="form-control" id="inputDescriptionAr" placeholder="Enter Arabic Description">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputQty">{{__('adminPanel.qty')}}</label>
                                <input type="text" name="qty" value="{{old('qty')}}" class="form-control" id="inputQty" placeholder="Enter Quantity">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputMainImage">{{__('adminPanel.main_image')}}</label>
                                <input type="file" name="main_image" id="inputMainImage" style="font-size: larger;">
                                <p class="help-block">Image Size 700x900</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.add_product_category')}}</h3>
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
                        <h3 class="box-title">{{__('adminPanel.add_product_images')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                            <input type="file" name="image[]" id="exampleInputFile">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.save')}}</button>
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

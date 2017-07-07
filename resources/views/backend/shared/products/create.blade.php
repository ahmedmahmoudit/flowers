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
                {!! Form::open(['route'=>[Request::segment(1).'.products.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputSku">Product ID (SKU)</label>
                                <input type="text" name="sku" class="form-control" id="exampleInputSku" placeholder="Enter product ID" value="{{old('sku')}}">
                                <p class="help-block"></p>
                            </div>
                            @if(Auth::user()->isManager())
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Select Store</label>
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
                                    <label>Product Status</label>
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
                                <label for="inputNameEn">Name English</label>
                                <input type="text" name="name_en" class="form-control" id="inputNameEn" placeholder="Enter English Name" value="{{old('name_en')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">Name Arabic</label>
                                <input type="text" name="name_ar" class="form-control" id="inputNameAr" placeholder="Enter Arabic Name" value="{{old('name_ar')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        {{--IF manager will render status in this section --}}
                        @if(Auth::user()->isManager())
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>Product Status</label>
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
                        <h3 class="box-title">Add Product Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputPrice">Price</label>
                                <input type="text" name="price" class="form-control" id="inputPrice" placeholder="Enter Price" value="{{old('price')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputWeight">Weight</label>
                                <input type="text" name="weight" class="form-control" id="inputWeight" placeholder="Enter Wright" value="{{old('weight')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="is-sale" value="1" name="is_sale" value="{{old('is_sale')}}">
                                        For Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputSalePrice">Sale Price</label>
                                <input type="text" name="sale_price" class="form-control for-sale" id="inputSalePrice" placeholder="Enter Sale Price" value="{{old('sale_price')}}" disabled>
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
                                    <input type="text" class="form-control pull-right for-sale" name="start_sale_date" value="{{old('start_sale_date')}}" id="inputStartDate" placeholder="Select Start Date" disabled>
                                </div>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="inputEndDate">End Date</label>
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
                                <label for="inputDescriptionEn">Description English</label>
                                <input type="text" name="description_en" value="{{old('description_en')}}" class="form-control" id="inputDescriptionEn" placeholder="Enter English Description">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputDescriptionAr">Description Arabic</label>
                                <input type="text" name="description_ar" value="{{old('description_ar')}}" class="form-control" id="inputDescriptionAr" placeholder="Enter Arabic Description">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputQty">Quantity</label>
                                <input type="text" name="qty" value="{{old('qty')}}" class="form-control" id="inputQty" placeholder="Enter Quantity">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputMainImage">Main Image</label>
                                <input type="file" name="main_image" id="inputMainImage">
                                <p class="help-block">Image Size 700x900</p>
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
                        <div class="form-group">
                            @foreach ($categories->chunk(3) as $array)
                                @foreach($array as $category)
                                    <div class="col-lg-4">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label>
                                                    {!! Form::checkbox('categories[]',$category->id,(in_array($category->id,$categoriesList,true)) ? true : false) !!}
                                                    {{ $category->name }}
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="images[]" id="exampleInputFile">
                            <p class="help-block">Image Size 700x900</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" id="exampleInputFile">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
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

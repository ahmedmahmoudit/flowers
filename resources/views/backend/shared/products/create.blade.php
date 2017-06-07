@extends('backend.layouts.master')
@section('title', 'Products')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {!! Form::open(['route'=>['manager.products.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputSku">Product ID (SKU)</label>
                                <input type="text" name="sku" class="form-control" id="exampleInputSku" placeholder="Enter product ID">
                                <p class="help-block"></p>
                            </div>
                            @if(Auth::user()->isManager())
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Select Store</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            @else
                                <div class="col-xs-6">
                                    <label>Product Status</label>
                                    <select class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Name English</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Name Arabic</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        @if(Auth::user()->isManager())
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label>Product Status</label>
                                    <select class="form-control">
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
                                <label for="exampleInputOrder">Price</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Weight</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                        For Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Sale Price</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Start Date</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order" disabled>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">End Date</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Description English</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Description Arabic</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleInputOrder">Quantity</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="exampleInputFile">Main Image</label>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>
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
                            <input type="file" name="image[]" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" id="exampleInputFile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" id="exampleInputFile">
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

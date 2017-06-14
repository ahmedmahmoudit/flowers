@extends('backend.layouts.master')
@section('title', 'Sliders')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.sliders.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputOrder">Order</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="Enter Slider Order">
                                <p class="help-block">If order already exist, old slider's order will be changed and disabled.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="image" id="exampleInputFile">
                                <p class="help-block">Image Size 1920x1080</p>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    {!!  Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

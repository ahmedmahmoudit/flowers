@extends('backend.layouts.master')
@section('title', __('adminPanel.ads'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.new_ad_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.ads.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputLink">{{__('adminPanel.link')}}</label>
                                <input type="text" name="link" class="form-control" id="exampleInputLink" placeholder="{{__('adminPanel.enter_ad_link')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOrder">{{__('adminPanel.order')}}</label>
                                <input type="text" name="order" class="form-control" id="exampleInputOrder" placeholder="{{__('adminPanel.enter_ad_order')}}">
                                <p class="help-block">If order already exist, old ad's order will be changed.</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">{{__('adminPanel.file_input')}}</label>
                                <input type="file" name="image" id="exampleInputFile">
                                <p class="help-block">{{__('adminPanel.image_size_700x900')}}</p>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">{{__('adminPanel.save')}}</button>
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

@extends('backend.layouts.master')
@section('title', __('adminPanel.delivery_policy'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.delivery_policy')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.pages.delivery.update'],'method'=>'POST','role' => 'form']) !!}
                        <div class="box-body">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputTitle">{{__('adminPanel.english_title')}}</label>
                                    {!! Form::text('title_en', (isset($deliveryData) ? $deliveryData->title_en : old('title_en')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputTitleAr">{{__('adminPanel.arabic_title')}}</label>
                                    {!! Form::text('title_ar', (isset($deliveryData) ? $deliveryData->title_ar : old('title_ar')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputBodyEn">{{__('adminPanel.english_body')}}</label>
                                    {!! Form::textarea('body_en', (isset($deliveryData) ? $deliveryData->body_en : old('body_en')) ,['class' => 'form-control','rows' => 20, 'cols' => 100,'required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputBodyAr">{{__('adminPanel.arabic_body')}}</label>
                                    {!! Form::textarea('body_ar', (isset($deliveryData) ? $deliveryData->body_ar : old('body_ar')) ,['class' => 'form-control','rows' => 20, 'cols' => 100,'required']) !!}
                                    <p class="help-block"></p>
                                </div>
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

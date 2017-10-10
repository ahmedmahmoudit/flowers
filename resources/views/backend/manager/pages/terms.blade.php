@extends('backend.layouts.master')
@section('title', __('adminPanel.terms_and_conditions'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.terms_and_conditions')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.pages.terms.update'],'method'=>'POST','role' => 'form']) !!}
                        <div class="box-body">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputTitle">{{__('adminPanel.english_title')}}</label>
                                    {!! Form::text('title_en', (isset($termsData) ? $termsData->title_en : old('title_en')) ,['class' => 'form-control']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputTitleAr">{{__('adminPanel.arabic_title')}}</label>
                                    {!! Form::text('title_ar', (isset($termsData) ? $termsData->title_ar : old('title_ar')) ,['class' => 'form-control']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputBodyEn">{{__('adminPanel.english_body')}}</label>
                                    {!! Form::textarea('body_en', (isset($termsData) ? $termsData->body_en : old('body_en')) ,['class' => 'form-control  editor_en','rows' => 10]) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputBodyAr">{{__('adminPanel.arabic_body')}}</label>
                                    {!! Form::textarea('body_ar', (isset($termsData) ? $termsData->body_ar : old('body_ar')) ,['class' => 'form-control editor_ar','rows' => 10]) !!}
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

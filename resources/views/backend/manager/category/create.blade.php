@extends('backend.layouts.master')
@section('title', __('adminPanel.categories'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.add_category_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.categories.store'],'method'=>'POST','role' => 'form']) !!}
                        <div class="box-body">
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
                                    <label for="inputNameEn">{{__('adminPanel.english_description')}}</label>
                                    {!! Form::textarea('description_en',old('description_en'),['class' => 'form-control']) !!}
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-xs-6">
                                    <label for="inputNameAr">{{__('adminPanel.arabic_description')}}</label>
                                    {!! Form::textarea('description_ar',old('description_ar'),['class' => 'form-control']) !!}
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

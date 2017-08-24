@extends('backend.layouts.master')
@section('title', __('adminPanel.contact_us'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.contact_us')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.pages.contact.update'],'method'=>'POST','role' => 'form']) !!}
                        <div class="box-body">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputAddress">{{__('adminPanel.english_address')}}</label>
                                    {!! Form::text('address_en', (isset($contactData) ? $contactData->address_en : old('address_en')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputAddressAr">{{__('adminPanel.arabic_address')}}</label>
                                    {!! Form::text('address_ar', (isset($contactData) ? $contactData->address_ar : old('address_ar')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>{{__('adminPanel.email')}}</label>
                                    {!! Form::text('email', (isset($contactData) ? $contactData->email : old('email')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>{{__('adminPanel.phone')}}</label>
                                    {!! Form::text('phone', (isset($contactData) ? $contactData->phone : old('phone')) ,['class' => 'form-control','required']) !!}
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

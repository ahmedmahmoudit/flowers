@extends('backend.layouts.master')
@section('title', __('adminPanel.settings'))
@section('styles')
    @parent
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.store_settings')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(['route' => ['admin.settings.update'],'method'=>'POST', 'files' => 'true', 'enctype' =>"multipart/form-data", 'class' => 'form-horizontal']) }}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.english_name')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="name_en" class="form-control"
                                           placeholder="Enter English Name"
                                           value="{{$store->name_en or old('name_en')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.arabic_name')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="name_ar" class="form-control"
                                           placeholder="Enter Arabic Name"
                                           value="{{$store->name_ar or old('name_ar')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.email')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email"
                                           value="{{$store->email or old('email')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.second_email')}}:
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="second_email" class="form-control"
                                           placeholder="Enter Second Email"
                                           value="{{$store->second_email or old('second_email')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.phone')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone"
                                           value="{{$store->phone or old('phone')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.min_delivery_days')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="minimum_delivery_days"
                                            value="{{old('minimum_delivery_days')}}" required>
                                        <option value="same day" @if($store->minimum_delivery_days == 'same day') {{'selected'}} @endif>
                                            Same Day
                                        </option>
                                        <option value="next day" @if($store->minimum_delivery_days == 'next day') {{'selected'}} @endif>
                                            Next Day
                                        </option>
                                        <option value="after 2 days" @if($store->minimum_delivery_days == 'after 2 days') {{'selected'}} @endif>
                                            After 2 Days
                                        </option>
                                    </select>
                                    <p class="help-block">{{__('adminPanel.select_available_delivery')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.start_week_day')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="start_week_day" required>
                                        <option value="saturday" @if($store->start_week_day == 'saturday') {{'selected'}} @endif>
                                            Saturday
                                        </option>
                                        <option value="sunday" @if($store->start_week_day == 'sunday') {{'selected'}} @endif>
                                            Sunday
                                        </option>
                                        <option value="monday" @if($store->start_week_day == 'monday') {{'selected'}} @endif>
                                            Monday
                                        </option>
                                        <option value="tuesday" @if($store->start_week_day == 'tuesday') {{'selected'}} @endif>
                                            Tuesday
                                        </option>
                                        <option value="wednesday" @if($store->start_week_day == 'wednesday') {{'selected'}} @endif>
                                            Wednesday
                                        </option>
                                        <option value="thursday" @if($store->start_week_day == 'thursday') {{'selected'}} @endif>
                                            Thursday
                                        </option>
                                        <option value="friday" @if($store->start_week_day == 'friday') {{'selected'}} @endif>
                                            Friday
                                        </option>
                                    </select>
                                    <p class="help-block">Select start of your business week day</p>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.end_week_day')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="end_week_day" required>
                                        <option value="saturday" @if($store->end_week_day == 'saturday') {{'selected'}} @endif>
                                            Saturday
                                        </option>
                                        <option value="sunday" @if($store->end_week_day == 'sunday') {{'selected'}} @endif>
                                            Sunday
                                        </option>
                                        <option value="monday" @if($store->end_week_day == 'monday') {{'selected'}} @endif>
                                            Monday
                                        </option>
                                        <option value="tuesday" @if($store->end_week_day == 'tuesday') {{'selected'}} @endif>
                                            Tuesday
                                        </option>
                                        <option value="wednesday" @if($store->end_week_day == 'wednesday') {{'selected'}} @endif>
                                            Wednesday
                                        </option>
                                        <option value="thursday" @if($store->end_week_day == 'thursday') {{'selected'}} @endif>
                                            Thursday
                                        </option>
                                        <option value="friday" @if($store->end_week_day == 'friday') {{'selected'}} @endif>
                                            Friday
                                        </option>
                                    </select>
                                    <p class="help-block">Select end of your business week day</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.store_image')}}:
                                </label>
                                <div class="col-md-6">
                                    <input type="file" name="image" id="inputMainImage" style="font-size: larger;">
                                    <p class="help-block">{{ trans('adminPanel.image_size_640x640') }}</p>
                                    @if($store->image)
                                        <div style="float: right;padding-right: 50%;"><img width="100"
                                                                                           src="{{asset('uploads/stores/'.$store->image)}}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.instagram')}}:</label>
                                <div class="col-md-6">
                                    <input type="text" name="instagram_username" class="form-control"
                                           placeholder="Enter Instagram username"
                                           value="{{$store->instagram_username or old('instagram_username')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="col-xs-6">--}}
                                {{--<label class="col-md-3 control-label"> {{__('adminPanel.store_delivery_times')}}:--}}
                                    {{--<span class="required" style="color: red;"> * </span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<ul class="list-unstyled" style="padding-top: 10px;">--}}
                                        {{--<li>--}}
                                            {{--<label>--}}
                                                {{--{!! Form::checkbox('delivery_time1','1', (in_array('1',$deliveryList)) ? true : false) !!}--}}
                                                {{--{{ 'Morning: 9-2pm' }}--}}
                                            {{--</label>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<label>--}}
                                                {{--{!! Form::checkbox('delivery_time2','2', (in_array('2',$deliveryList)) ? true : false) !!}--}}
                                                {{--{{ 'Afternoon: 2-6pm' }}--}}
                                            {{--</label>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<label>--}}
                                                {{--{!! Form::checkbox('delivery_time3','3', (in_array('3',$deliveryList)) ? true : false) !!}--}}
                                                {{--{{ 'Evening: 6-10pm' }}--}}
                                            {{--</label>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="form-group">


                            <div class="col-xs-6">
                                <label>
                                    {{  __('Store Delivery Times')  }}
                                </label>
                                <ul class="list-unstyled" style="padding-top: 10px;">
                                    @foreach($deliveryTimes as $time)
                                        <li>
                                            <label>
                                                {!! Form::checkbox('delivery_times[]',$time->id,in_array($time->id,$storeDeliveryTimes)) !!}
                                                {{ $time->name_en }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-xs-6">
                                <label class="col-md-3 control-label"> {{__('adminPanel.active')}}:
                                    <span class="required" style="color: red;"> * </span>
                                </label>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <input type="hidden" name="active" value="0"/>
                                        <label>
                                            @if($store->active || old('active'))
                                                <input type="checkbox" value="1" name="active"
                                                       value="{{old('active')}}" checked="true">
                                            @else
                                                <input type="checkbox" value="1" name="active"
                                                       value="{{old('active')}}">
                                            @endif
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('adminPanel.active')}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-lg-push-1 pull-right">
                                {{ Form::submit('submit',['class'=>'btn btn-outline btn-circle btn-primary ']) }}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.update')}}</button>
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

@section('scripts')
    @parent


    <script>
      $(function () {
      });
    </script>
@endsection
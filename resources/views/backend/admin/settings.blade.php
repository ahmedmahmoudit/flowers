@extends('backend.layouts.master')
@section('title', 'Settings')
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
                        <h3 class="box-title">Store Settings</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(['route' => ['admin.settings.update'],'method'=>'POST','class' => 'form-horizontal']) }}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"> Minimum Delivery Days:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-5">
                                <input type="text" name="minimum_delivery_days" value="{{$store->minimum_delivery_days or old('minimum_delivery_days')}}" class="form-control" placeholder="Enter Minimum Hours" required>
                                <p class="help-block">Enter Minimum hours to deliver order for example (24)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"> Start Week Day:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-5">
                                <select class="form-control" name="start_week_day" required>
                                    <option value="saturday" @if($store->start_week_day == 'saturday') {{'selected'}} @endif>Saturday</option>
                                    <option value="sunday" @if($store->start_week_day == 'sunday') {{'selected'}} @endif>Sunday</option>
                                    <option value="monday" @if($store->start_week_day == 'monday') {{'selected'}} @endif>Monday</option>
                                    <option value="tuesday" @if($store->start_week_day == 'tuesday') {{'selected'}} @endif>Tuesday</option>
                                    <option value="wednesday" @if($store->start_week_day == 'wednesday') {{'selected'}} @endif>Wednesday</option>
                                    <option value="thursday" @if($store->start_week_day == 'thursday') {{'selected'}} @endif>Thursday</option>
                                    <option value="friday" @if($store->start_week_day == 'friday') {{'selected'}} @endif>Friday</option>
                                </select>
                                <p class="help-block">Select start of your business week day</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"> End Week Day:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-5">
                                <select class="form-control" name="end_week_day" required>
                                    <option value="saturday" @if($store->end_week_day == 'saturday') {{'selected'}} @endif>Saturday</option>
                                    <option value="sunday" @if($store->end_week_day == 'sunday') {{'selected'}} @endif>Sunday</option>
                                    <option value="monday" @if($store->end_week_day == 'monday') {{'selected'}} @endif>Monday</option>
                                    <option value="tuesday" @if($store->end_week_day == 'tuesday') {{'selected'}} @endif>Tuesday</option>
                                    <option value="wednesday" @if($store->end_week_day == 'wednesday') {{'selected'}} @endif>Wednesday</option>
                                    <option value="thursday" @if($store->end_week_day == 'thursday') {{'selected'}} @endif>Thursday</option>
                                    <option value="friday" @if($store->end_week_day == 'friday') {{'selected'}} @endif>Friday</option>
                                </select>
                                <p class="help-block">Select end of your business week day</p>
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
                        <button type="submit" class="btn btn-primary">Update</button>
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
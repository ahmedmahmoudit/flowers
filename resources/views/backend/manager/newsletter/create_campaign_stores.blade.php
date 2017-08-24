@extends('backend.layouts.master')
@section('title', __('adminPanel.store_campaigns'))
@section('styles')
    @parent

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {{ Form::open(['route' => ['manager.newsletter.mailStores'],'method'=>'POST','files' => 'true','class' => 'form-horizontal']) }}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.send_to_store_title')}}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"> {{__('adminPanel.title')}}:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-5">
                                {!! Form::text('title', old('title') ,['class' => 'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">{{__('adminPanel.campaign_content')}}:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-10">
                                {!! Form::textarea('body',old('body'),['class' => 'form-control textarea']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.select_stores')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group" style="text-align: center;font-size: x-large;">
                            {!! Form::checkbox('checkAll', null, null, ['id' => 'checkAll']) !!}
                            {!! Form::label('checkAll', __('adminPanel.check_all_stores'), array('for' => 'checkAll')) !!}
                        </div>
                        <div class="form-group">
                            @foreach ($stores->chunk(3) as $array)
                                @foreach($array as $store)
                                    <div class="col-lg-4">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label>
                                                    {!! Form::checkbox('stores[]',$store->id,(in_array($store->id,[],true)) ? true : false, ['class' => 'coupon']) !!}
                                                    {{ $store->name }}
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.send')}}</button>
                    </div>
                </div>
                {!!  Form::close() !!}
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @parent

    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();

            $("#checkAll").click(function(){
                $('.coupon').not(this).prop('checked', this.checked);
            });
        });
    </script>
@endsection
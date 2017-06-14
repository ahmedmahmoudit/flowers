@extends('backend.layouts.master')
@section('title', 'Campaigns')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Campaign</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(['route' => ['manager.newsletter.campaign'],'method'=>'POST','files' => 'true','class' => 'form-horizontal']) }}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"> title:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-5">
                                {!! Form::text('title', old('title') ,['class' => 'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Campaign Content:
                                <span class="required" style="color: red;"> * </span>
                            </label>
                            <div class="col-md-10">
                                {!! Form::textarea('body',old('body'),['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-lg-push-1 pull-right">
                                {{ Form::submit('submit',['class'=>'btn btn-outline btn-circle btn-primary']) }}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Send To All Subscribers</button>
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
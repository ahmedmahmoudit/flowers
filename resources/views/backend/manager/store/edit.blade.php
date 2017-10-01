@extends('backend.layouts.master')
@section('title', __('adminPanel.new_store_title'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
{{--                {!! Form::model($store,['route' => ['articles.update',$article->id], 'method' => 'patch','files'=>true, 'class'=>'form-horizontal']) !!}--}}
                {!! Form::model($store,['route'=>['manager.stores.update',$store->id],'method'=>'put','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.add_store_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">{{__('adminPanel.english_name')}}</label>
                                <span class="required" style="color: red;"> * </span>
                                {!! Form::text('name_en',null,['placeholder'=>'Enter English Name','class'=>'form-control']) !!}
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">{{__('adminPanel.arabic_name')}}</label>
                                <span class="required" style="color: red;"> * </span>

                                {!! Form::text('name_ar',null,['placeholder'=>'Enter Arabic Name','class'=>'form-control']) !!}
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleEmail">{{__('adminPanel.email')}}</label>
                                <span class="required" style="color: red;"> * </span>
                                {!! Form::text('email',null,['placeholder'=>'Enter Email','class'=>'form-control']) !!}
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="exampleEmail2">{{__('adminPanel.another_email')}}</label>
                                {!! Form::text('second_email',null,['placeholder'=>'Enter Another Email','class'=>'form-control']) !!}
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="examplePhone">{{__('adminPanel.phone')}}</label>
                                {!! Form::text('phone',null,['placeholder'=>'Enter Phone','class'=>'form-control']) !!}
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>{{__('adminPanel.select_country')}}</label>
                                    <span class="required" style="color: red;"> * </span>
                                    <select class="form-control" id="country" name="country_id" value="{{old('country')}}">
                                        <option value="0">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"

                                            @if($country->id === $store->country->id)
                                                selected
                                            @endif

                                            > {{$country->name_en}} </option>
                                        @endforeach
                                    </select>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div style="padding:20px 0;">
                                        <img src="{{ asset('uploads/stores/'.$store->image) }}" style="height:100px;width: 100px"/>
                                    </div>
                                    <label for="exampleInputFile">{{__('adminPanel.upload_store_image')}}</label>
                                    <input type="file" name="image" id="exampleInputFile">
                                </div>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <ul class="list-unstyled" id="show_areas" style="display: flex;margin: 5%;">

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.save')}}</button>
                    </div>
                </div>
                <!-- /.box -->

                {!!  Form::close() !!}
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
            $('#country').on('change', function() {
                var country = this.value;
                $('#show_areas').empty();
                $.get("/manager/areas/" + country, function (result) {
                    $.each(result, function (i, item) {
                        $('#show_areas').append('<li style="padding: 1%;"><label><input name="areas[]" type="checkbox" value="'+item.id+'">'+item.name_en+'</label></li>');
                    });
                });
            });
        });
    </script>
@endsection

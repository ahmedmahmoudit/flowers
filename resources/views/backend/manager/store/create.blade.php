@extends('backend.layouts.master')
@section('title', 'New Store')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {!! Form::open(['route'=>['manager.stores.store'],'method'=>'POST','files' => 'true','role' => 'form','enctype' =>"multipart/form-data"]) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Store</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">Name English</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="name_en" class="form-control" id="inputNameEn" placeholder="Enter English Name" value="{{old('name_en')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">Name Arabic</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="name_ar" class="form-control" id="inputNameAr" placeholder="Enter Arabic Name" value="{{old('name_ar')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleSlugEn">Slug English</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="slug_en" class="form-control" id="exampleSlugEn" placeholder="Enter English Slug" value="{{old('slug_en')}}">
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="exampleSlugAR">Slug Arabic</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="slug_ar" class="form-control" id="exampleSlugAR" placeholder="Enter Arabic Slug" value="{{old('slug_ar')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="examplePhone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="examplePhone" placeholder="Enter Phone" value="{{old('phone')}}">
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="exampleEmail">Email</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="email" class="form-control" id="exampleEmail" placeholder="Enter Email" value="{{old('email')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Store Image</label>
                                    <input type="file" name="image" id="exampleInputFile">
                                </div>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <span class="required" style="color: red;"> * </span>
                                    <select class="form-control" id="country" name="country_id" value="{{old('country')}}">
                                        <option value="0">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}"> {{$country->name_en}} </option>
                                        @endforeach
                                    </select>
                                    <p class="help-block"></p>
                                </div>
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
                        <button type="submit" class="btn btn-primary">Save</button>
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

@extends('backend.layouts.master')
@section('title', 'Categories')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['manager.subcategories.update', $subcategory->id],'method'=>'PUT','role' => 'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label >Parent Category</label>
                                    <span class="required"> * </span>
                                    {!! Form::select('parent_id', $parentCategories , (isset($subcategory->parent) ? $subcategory->parent['id'] : old('parent_id')) ,['class' => 'form-control','required']) !!}
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="inputNameEn">Name English</label>
                                    <input type="text" name="name_en" class="form-control" id="inputNameEn" placeholder="Enter English Name" value="{{$subcategory->name_en or old('name_en')}}">
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-xs-6">
                                    <label for="inputNameAr">Name Arabic</label>
                                    <input type="text" name="name_ar" class="form-control" id="inputNameAr" placeholder="Enter Arabic Name" value="{{$subcategory->name_ar or old('name_ar')}}">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="inputNameEn">Description English</label>
                                    <textarea class="form-control" name="description_en">{{$subcategory->description_en or old('description_en')}}</textarea>
                                    <p class="help-block"></p>
                                </div>
                                <div class="col-xs-6">
                                    <label for="inputNameAr">Description Arabic</label>
                                    <textarea class="form-control" name="description_ar">{{$subcategory->description_ar or old('description_ar')}}</textarea>
                                    <p class="help-block"></p>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
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

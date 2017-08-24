@extends('backend.layouts.master')
@section('title', __('adminPanel.view_store'))

@section('styles')
    @parent

    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.store_details')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">{{__('adminPanel.english_name')}}</label>
                                <p>{{$store->name_en or 'No English Name'}}</p>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">{{__('adminPanel.arabic_name')}}</label>
                                <p>{{$store->name_ar or 'No Arabic Name'}}</p>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="examplePhone">{{__('adminPanel.phone')}}</label>
                                <p>{{$store->phone or 'No Phone'}}</p>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="exampleEmail">{{__('adminPanel.email')}}</label>
                                <p>{{$store->email or 'No Email'}} @if($store->second_email) {{' | '.$store->second_email}}@endif</p>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label >{{__('adminPanel.user')}}</label>
                                @if($store->user_id)
                                    <p>{{$store->user->name}}</p>
                                    <p class="help-block"></p>
                                @else
                                    <p>No User Assigned</p>
                                    <p class="help-block" style="font-size: 12px;">Please Go to Users and select user to be store admin by click on edit and change user's role</p>
                                @endif
                            </div>

                            <div class="col-xs-6">
                                <label>{{__('adminPanel.store_image')}}</label>
                                @if($store->image)
                                    <img src="{{asset('uploads/stores/'.$store->image)}}" style="display: block;width: 100px;"/>
                                @else
                                    <p>No Image Uploaded</p>
                                @endif
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.store_products')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="products-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{__('adminPanel.sku')}}</th>
                                <th>{{__('adminPanel.name')}}</th>
                                <th>{{__('adminPanel.price')}}</th>
                                <th>{{__('adminPanel.weight')}}</th>
                                <th>{{__('adminPanel.qty')}}</th>
                                <th>{{__('adminPanel.status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($store->products as $product)
                                <tr>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->name_en}}</td>
                                    <td>{{$product->detail->price or 'No Price'}}</td>
                                    <td>{{$product->detail->weight or 'No Price'}}</td>
                                    <td>{{$product->detail->quantity or 'No Price'}}</td>
                                    <td>
                                        @if($product->active == '1')
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
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

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#products-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "columnDefs": [
                    { "orderable": false, "targets": -1 }
                ]
            });
        });
    </script>
@endsection

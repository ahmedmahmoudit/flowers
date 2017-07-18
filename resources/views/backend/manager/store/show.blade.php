@extends('backend.layouts.master')
@section('title', 'View Store')

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
                        <h3 class="box-title">Store Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputNameEn">Name English</label>
                                <p>{{$store->name_en or 'No English Name'}}</p>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputNameAr">Name Arabic</label>
                                <p>{{$store->name_ar or 'No Arabic Name'}}</p>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="examplePhone">Phone</label>
                                <p>{{$store->phone or 'No Phone'}}</p>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label for="exampleEmail">Email</label>
                                <p>{{$store->email or 'No Email'}} @if($store->second_email) {{' | '.$store->second_email}}@endif</p>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label >User</label>
                                @if($store->user_id)
                                    <p>{{$store->user->name}}</p>
                                    <p class="help-block"></p>
                                @else
                                    <p>No User Assigned</p>
                                    <p class="help-block" style="font-size: 12px;">Please Go to Users and select user to be store admin by click on edit and change user's role</p>
                                @endif
                            </div>

                            <div class="col-xs-6">
                                <label>Store Image</label>
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
                        <h3 class="box-title">Store Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="products-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sku</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Qty</th>
                                <th>Status</th>
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

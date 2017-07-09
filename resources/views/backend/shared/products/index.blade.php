@extends('backend.layouts.master')
@section('title', 'Products')

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
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="products-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @if(Auth::user()->isManager())
                                    <th>Store</th>
                                @endif
                                <th>Main Image</th>
                                <th>Sku</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Weight</th>
                                <th>Height / Width</th>
                                <th>Qty</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    @if(Auth::user()->isManager())
                                        <td>{{$product->store->name_en or 'Store Disabled'}}</td>
                                    @endif

                                    @if(isset($product->detail->main_image))
                                        <td><img width="50" src="{{asset('uploads/products/original/'.$product->detail->main_image)}}"></td>
                                    @else
                                        <td>No Main Image</td>
                                    @endif

                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->name_en}}</td>
                                    <td>{{$product->detail->price or 'No Price'}}</td>
                                    <td>{{$product->detail->weight or 'No Price'}}</td>
                                    <td>{{$product->detail->height or 'No Height'}} / {{$product->detail->width or 'No Width'}}</td>
                                    <td>{{$product->detail->quantity or 'No Price'}}</td>
                                    <td>
                                        @if($product->active == '1')
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->isManager())
                                            @include('backend.manager._products_actions')
                                        @else
                                            @include('backend.admin._products_actions')
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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

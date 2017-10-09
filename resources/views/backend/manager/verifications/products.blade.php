@extends('backend.layouts.master')
@section('title', __('adminPanel.verification_products'))

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
                        <h3 class="box-title">{{__('adminPanel.all_products_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="products-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @if(Auth::user()->isManager())
                                    <th>{{__('adminPanel.store')}}</th>
                                @endif
                                <th>{{__('adminPanel.main_image')}}</th>
                                <th>{{__('adminPanel.sku')}}</th>
                                <th>{{__('adminPanel.name')}}</th>
                                <th>{{__('adminPanel.status')}}</th>
                                <th>{{__('adminPanel.actions')}}</th>
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
                                    <td>
                                        @if($product->verified == '1')
                                            <span class="label label-success">Verified</span>
                                        @else
                                            <span class="label label-danger">Un-Verified</span>
                                        @endif
                                    </td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @if($product->verified == '1')
                                            <a href="{{ route('manager.verifications.products.un-verify', $product->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red confirm-disable">Un-Verify</a>
                                        @else
                                            <a href="{{ route('manager.verifications.products.verify', $product->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green confirm-activate">Verify</a>
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
              "scrollX": true,
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

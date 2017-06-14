@extends('backend.layouts.master')
@section('title', 'Orders')

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
                        <h3 class="box-title">All Orders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sliderTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Address</th>
                                <th>Delivery Date</th>
                                <th>Coupon</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Net Amount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name or 'No Name'}}</td>
                                    <td>{{$order->order_email}}</td>
                                    <td>{{$order->order_address}}</td>
                                    <td>{{$order->delivery_date . ' ' . $order->delivery_time}}</td>
                                    <td>{{$order->coupon_id ? $order->coupon->code : 'No Coupon'}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->net_amount}}</td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="{{ route('manager.orders.show', $order->id) }}" data-method="GET" data-laravel-method="get" class="btn bg-blue margin">View</a>
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
            $('#sliderTable').DataTable({
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

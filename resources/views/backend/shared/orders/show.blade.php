@extends('backend.layouts.master')
@section('title', 'View Order')

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
                        <h3 class="box-title">Order Details</h3>
                    </div>
                    <div class="box-header with-border">
                        <b class="box-title" style="width:70%;">Email will be sent to customer with status update!</b>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a href="{{ route('manager.orders.shipped', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-ship" {{$order->order_status >= '2' ? 'disabled' : ''}}>Shipped</a>
                        <a href="{{ route('manager.orders.completed', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-orange margin confirm-complete" {{$order->order_status >= '3' ? 'disabled' : ''}}>Completed</a>
                        <a href="{{ route('manager.orders.cancelled', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-cancel" {{$order->order_status >= '3' ? 'disabled' : ''}}>Cancel</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>User Name</label>
                                <p>{{$order->user->name or 'No Name'}}</p>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label>Email</label>
                                <p>{{$order->order_email or 'No Email'}}</p>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Address</label>
                                <p>{{$order->order_address or 'No Address'}}</p>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label>Delivery Date</label>
                                <p>{{$order->delivery_date->format('d-m-Y') . ' ' . $order->delivery_time}}</p>
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Payment Method</label>
                                <p>{{$order->payment_method}}</p>
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label>Order Status</label>
                                <p>{{$order->orderStatusCast($order->order_status)}}</p>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label>Net Amount</label>
                                @if($order->coupon_id)
                                    <p>{{$order->net_amount - $order->coupon->value($order->net_amount,$order->coupon->percentage)}}</p>
                                @else
                                    <p>{{$order->net_amount}}</p>
                                @endif
                                <p class="help-block"></p>
                            </div>

                            <div class="col-xs-6">
                                <label>Coupon</label>
                                <p>{{$order->coupon_id ? $order->coupon->code.' | Value: '.$order->coupon->value($order->net_amount,$order->coupon->percentage) : 'No Coupon'}}</p>
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
                        <h3 class="box-title">Order Items</h3>
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
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderDetails as $item)
                                <tr>
                                    <td>{{$item->product->sku}}</td>
                                    <td>{{$item->product->name_en}}</td>
                                    <td>{{($item->sale_price ? $item->sale_price : $item->price)}}</td>
                                    <td>{{$item->product->detail->weight or 'No Weight'}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->quantity * ($item->sale_price ? $item->sale_price : $item->price)}}</td>
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

            $('.confirm-ship').on('click', function (e) {
                var $this = $(this);
                e.preventDefault();
                $.confirm({
                    title: 'Order Shipped!',
                    content: 'Are you sure to change order status to Shipped, Email will be sent to customer!',
                    type: 'red',
                    buttons: {
                        tryAgain: {
                            text: 'Send',
                            btnClass: 'btn-red',
                            action: function(){
                                $.post({
                                    type: $this.data('method'),
                                    url: $this.attr('href'),
                                    data: {_method: $this.data('laravel-method')},
                                }).done(function (data) {
                                    window.location = data;
                                });
                            }
                        },
                        close: function () {
                        }
                    }
                });
            });

            $('.confirm-complete').on('click', function (e) {
                var $this = $(this);
                e.preventDefault();
                $.confirm({
                    title: 'Order Completed!',
                    content: 'Are you sure to change order status to Completed, Email will be sent to customer!',
                    type: 'red',
                    buttons: {
                        tryAgain: {
                            text: 'Send',
                            btnClass: 'btn-red',
                            action: function(){
                                $.post({
                                    type: $this.data('method'),
                                    url: $this.attr('href'),
                                    data: {_method: $this.data('laravel-method')},
                                }).done(function (data) {
                                    window.location = data;
                                });
                            }
                        },
                        close: function () {
                        }
                    }
                });
            });

            $('.confirm-cancel').on('click', function (e) {
                var $this = $(this);
                e.preventDefault();
                $.confirm({
                    title: 'Order Cancel!',
                    content: 'Are you sure to change order status to Cancelled, Email will be sent to customer!',
                    type: 'red',
                    buttons: {
                        tryAgain: {
                            text: 'Send',
                            btnClass: 'btn-red',
                            action: function(){
                                $.post({
                                    type: $this.data('method'),
                                    url: $this.attr('href'),
                                    data: {_method: $this.data('laravel-method')},
                                }).done(function (data) {
                                    window.location = data;
                                });
                            }
                        },
                        close: function () {
                        }
                    }
                });
            });
        });
    </script>
@endsection

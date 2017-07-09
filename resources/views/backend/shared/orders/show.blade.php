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
                    @if(!Auth::user()->isManager())
                        <div class="box-header with-border">
                            <b class="box-title" style="width:70%;">Email will be sent to customer with status update!</b>
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            @if($order->order_status >= '2' || $statusOfThisPart >= '2')
                                <a href="{{ route(Request::segment(1).'.orders.shipped', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-ship" disabled>Shipped</a>
                            @else
                                <a href="{{ route(Request::segment(1).'.orders.shipped', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-ship">Shipped</a>
                            @endif

                            @if($order->order_status >= '3' || $statusOfThisPart >= '3')
                                <a href="{{ route(Request::segment(1).'.orders.completed', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-orange margin confirm-complete" disabled>Completed</a>
                            @else
                                <a href="{{ route(Request::segment(1).'.orders.completed', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-orange margin confirm-complete">Completed</a>
                            @endif

                            @if($order->order_status >= '3' || $statusOfThisPart >= '3')
                                <a href="{{ route(Request::segment(1).'.orders.cancelled', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-cancel" disabled>Cancel</a>
                            @else
                                <a href="{{ route(Request::segment(1).'.orders.cancelled', $order->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-cancel">Cancel</a>
                            @endif

                        </div>
                    @endif
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
                            @if(Auth::user()->isManager())
                                <div class="col-xs-6">
                                    <label>Net Amount</label>
                                    @if($order->coupon_id)
                                        <p>{{$order->net_amount - $order->coupon->value($order->net_amount,$order->coupon->percentage)}}</p>
                                    @else
                                        <p>{{$order->net_amount}}</p>
                                    @endif
                                    <p class="help-block"></p>
                                </div>
                            @endif

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
                                <th>Height / Width</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!Auth::user()->isManager())
                                @foreach($order->orderDetails as $item)
                                    @if($item->product->store->id == Auth::user()->store->id)
                                        <tr>
                                            <td>{{$item->product->sku}}</td>
                                            <td>{{$item->product->name_en}}</td>
                                            <td>{{($item->sale_price ? $item->sale_price : $item->price)}}</td>
                                            <td>{{$item->product->detail->height or 'No Height'}} / {{$item->product->detail->width or 'No Width'}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->quantity * ($item->sale_price ? $item->sale_price : $item->price)}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @foreach($order->orderDetails as $item)
                                    <tr>
                                        <td>{{$item->product->sku}}</td>
                                        <td>{{$item->product->name_en}}</td>
                                        <td>{{($item->sale_price ? $item->sale_price : $item->price)}}</td>
                                        <td>{{$item->product->detail->height or 'No Height'}} / {{$item->product->detail->width or 'No Width'}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->quantity * ($item->sale_price ? $item->sale_price : $item->price)}}</td>
                                    </tr>
                                @endforeach
                            @endif
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

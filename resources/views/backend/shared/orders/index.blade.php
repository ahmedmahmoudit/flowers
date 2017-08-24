@extends('backend.layouts.master')
@section('title', __('adminPanel.orders'))

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
                        <h3 class="box-title">{{__('adminPanel.all_orders')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sliderTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{__('adminPanel.name')}}</th>
                                <th>{{__('adminPanel.email')}}</th>
                                <th>{{__('adminPanel.address')}}</th>
                                <th>{{__('adminPanel.delivery_date')}}</th>
                                <th>{{__('adminPanel.payment_method')}}</th>
                                <th>{{__('adminPanel.order_status')}}</th>
                                @if(Auth::user()->isManager())
                                    <th>{{__('adminPanel.net_amount')}}</th>
                                @endif
                                <th>{{__('adminPanel.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name or 'No Name'}}</td>
                                    <td>{{$order->order_email}}</td>
                                    <td>{{$order->order_address}}</td>
                                    @if($order->delivery_date)
                                        <td>{{$order->delivery_date->format('d-m-Y') . ' ' . $order->delivery_time}}</td>
                                    @else
                                        <td>{{$order->delivery_time}}</td>
                                    @endif
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->orderStatusCast($order->order_status)}}</td>
                                    @if(Auth::user()->isManager())
                                        <td>{{$order->net_amount}}</td>
                                    @endif
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="{{ route(Request::segment(1).'.orders.show', $order->id) }}" data-method="GET" data-laravel-method="get" class="btn bg-blue margin">View</a>
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

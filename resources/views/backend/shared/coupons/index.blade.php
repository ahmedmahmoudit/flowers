@extends('backend.layouts.master')
@section('title', 'Coupons')

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
                        <h3 class="box-title">All Coupons</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sliderTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Percentage</th>
                                <th>Minimum Charge</th>
                                <th>Due Date</th>
                                <th>Is Limited</th>
                                <th>Consumed</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->percentage}}</td>
                                    <td>{{$coupon->minimum_charge}}</td>
                                    <td>{{$coupon->due_date}}</td>
                                    <td>{{$coupon->is_limited}}</td>
                                    <td>
                                        @if($coupon->consumed == '1')
                                            <span class="label label-danger">Consumed</span>
                                        @else
                                            <span class="label label-success">Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($coupon->active == '1')
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        @if(Auth::user()->isManager())
                                            <a href="{{ route('manager.coupons.destroy', $coupon->id) }}" data-method="POST" data-laravel-method="delete" class="btn bg-red margin confirm-delete">Delete</a>
                                            <a href="{{ route('manager.coupons.show', $coupon->id) }}" data-method="GET" data-laravel-method="get" class="btn bg-blue margin">View</a>
                                            @if($coupon->active == '1')
                                                <a href="{{ route('manager.coupons.disable', $coupon->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-disable">Disable</a>
                                            @else
                                                <a href="{{ route('manager.coupons.activate', $coupon->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-activate">Activate</a>
                                            @endif
                                        @else
                                            @if($coupon->active == '1')
                                                <a href="{{ route('admin.coupons.disable', $coupon->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-disable">Disable</a>
                                            @else
                                                <a href="{{ route('admin.coupons.activate', $coupon->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-activate">Activate</a>
                                            @endif
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

@extends('backend.layouts.master')
@section('title', __('adminPanel.stores'))

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
                        <h3 class="box-title">{{__('adminPanel.all_stores_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sliderTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{__('adminPanel.name')}}</th>
                                <th>{{__('adminPanel.country')}}</th>
                                <th>{{__('adminPanel.phone')}}</th>
                                <th>{{__('adminPanel.email')}}</th>
                                <th>{{__('adminPanel.status')}}</th>
                                <th>{{__('adminPanel.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stores as $store)
                                <tr>
                                    <td>{{$store->name}}</td>
                                    <td>{{$store->country->name}}</td>
                                    <td>{{$store->phone}}</td>
                                    <td>{{$store->email}}</td>
                                    <td>
                                        @if($store->is_approved == '1')
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="{{ route('manager.stores.destroy', $store->id) }}" data-method="POST" data-laravel-method="delete" class="btn bg-red margin confirm-delete">Delete</a>
                                        <a href="{{ route('manager.stores.show', $store->id) }}" data-method="GET" data-laravel-method="get" class="btn bg-blue margin">View</a>
                                        @if($store->is_approved == '1')
                                            <a href="{{ route('manager.stores.disable', $store->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-disable">Disable</a>
                                        @else
                                            <a href="{{ route('manager.stores.activate', $store->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-activate">Activate</a>
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

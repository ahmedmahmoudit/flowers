@extends('backend.layouts.master')
@section('title', 'Sliders')

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
                        <h3 class="box-title">All Slides</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="sliderTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slide)
                                <tr>
                                    <td><a href="{{asset('uploads/slides/'.$slide->image)}}" target="_blank">{{$slide->image}}</a></td>
                                    <td>{{$slide->order}}</td>
                                    <td>
                                        @if($slide->active == '1')
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disable</span>
                                        @endif
                                    </td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="{{ route('manager.sliders.destroy', $slide->id) }}" data-method="POST" data-laravel-method="delete" class="btn bg-red margin confirm-delete">Delete</a>
                                        @if($slide->active == '1')
                                            <a href="{{ route('manager.sliders.disable', $slide->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-red margin confirm-disable">Disable</a>
                                        @else
                                            <a href="{{ route('manager.sliders.activate', $slide->id) }}" data-method="POST" data-laravel-method="post" class="btn bg-green margin confirm-activate">Activate</a>
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

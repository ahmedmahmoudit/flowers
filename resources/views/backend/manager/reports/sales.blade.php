@extends('backend.layouts.master')
@section('title', __('adminPanel.sales'))

@section('styles')
    @parent

    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{__('adminPanel.all_sales_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route'=>['manager.reports.sales'],'method'=>'POST','role' => 'form']) !!}
                        <div class="form-group">
                            <div class="col-xs-5">
                                <label for="exampleInputFrom">{{__('adminPanel.from')}}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="from" value="{{old('from')}}" id="from" placeholder="{{__('adminPanel.select_date')}}" required>
                                </div>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-5">
                                <label for="exampleInputTo">{{__('adminPanel.to')}}</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right for-sale" name="to" value="{{old('to')}}" id="to" placeholder="{{__('adminPanel.select_date')}}" required>
                                </div>
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" style="margin-top: 14%;" class="btn btn-primary">{{__('adminPanel.find_sales')}}</button>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        {!!  Form::close() !!}
                        @if(count($orders) >= 1)
                            <table id="products-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{__('adminPanel.store')}}</th>
                                    <th>{{__('adminPanel.main_image')}}</th>
                                    <th>{{__('adminPanel.sku')}}</th>
                                    <th>{{__('adminPanel.name')}}</th>
                                    <th>{{__('adminPanel.price')}}</th>
                                    <th>{{__('adminPanel.qty')}}</th>
                                    <th>{{__('adminPanel.total_price')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    @foreach($order->orderDetails as $orderProduct)
                                    <tr>
                                        <td>{{$orderProduct->product->store->name_en or 'Store Disabled'}}</td>

                                        @if(isset($orderProduct->product->detail->main_image))
                                            <td><img width="50" src="{{asset('uploads/products/original/'.$orderProduct->product->detail->main_image)}}"></td>
                                        @else
                                            <td>No Main Image</td>
                                        @endif

                                        <td>{{$orderProduct->product->sku}}</td>
                                        <td>{{$orderProduct->product->name_en}}</td>
                                        <td>{{$orderProduct->price or 'No Price'}}</td>
                                        <td>{{$orderProduct->quantity or 'No Price'}}</td>
                                        <td>{{($orderProduct->quantity * $orderProduct->price)}}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        @endif
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
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

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

            $('#from').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
            });

            $('#to').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',
                endDate: '0d'
            });
        });
    </script>
@endsection

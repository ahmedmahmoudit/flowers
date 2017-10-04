@extends('backend.layouts.master')
@section('title', __('adminPanel.products'))

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
                                <th>{{__('adminPanel.price')}}</th>
                                <th>{{__('adminPanel.weight')}}</th>
                                <th>{{__('adminPanel.width_and_height')}}</th>
                                <th>{{__('adminPanel.qty')}}</th>
                                <th>{{__('adminPanel.views')}}</th>
                                <th>{{__('adminPanel.likes')}}</th>
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
                                        <td>
                                            <a href="{{asset('uploads/products/'.$product->detail->main_image)}}">
                                                <img src="{{asset('uploads/products/'.$product->detail->main_image)}}"
                                                     style="width: 100px;"/>
                                            </a>
                                        </td>
                                    @else
                                        <td>No Main Image</td>
                                    @endif

                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->name_en}}</td>
                                    <td>{{$product->detail->price or 'No Price'}}</td>
                                    <td>{{$product->detail->weight or 'No Price'}}</td>
                                    <td>{{$product->detail->height or 'No Height'}}
                                        / {{$product->detail->width or 'No Width'}}</td>
                                    <td>{{$product->detail->quantity or 'No Price'}}</td>
                                    <td>{{Counter::show('product', $product->id) }}</td>
                                    <td>{{$product->userLikes->count()}}</td>
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
            {"orderable": false, "targets": -1}
          ]
        });
      });
    </script>
@endsection

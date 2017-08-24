@extends('backend.layouts.master')
@section('title', __('adminPanel.store_areas'))

@section('styles')
    @parent

    <!-- datatables -->
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {!! Form::open(['route'=>['admin.areas.update'],'method'=>'POST','role' => 'form']) !!}

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.select_areas')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group" style="text-align: center;font-size: x-large;">
                            {!! Form::checkbox('checkAll', null, null, ['id' => 'checkAll']) !!}
                            {!! Form::label('checkAll', __('adminPanel.check_all'), array('for' => 'checkAll')) !!}
                        </div>
                        <div class="form-group">
                            @foreach ($dbAreas->chunk(3) as $array)
                                @foreach($array as $area)
                                    <div class="col-lg-4">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label>
                                                    {!! Form::checkbox('areas[]',$area->id,(in_array($area->id,$areas,true)) ? true : false, ['class' => 'areas']) !!}
                                                    {{ $area->name }}
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.update')}}</button>
                    </div>
                </div>
                <!-- /.box -->

                {!!  Form::close() !!}
            </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    @parent


    <script>
        $(function () {

            $("#checkAll").click(function(){
                $('.areas').not(this).prop('checked', this.checked);
            });
        });
    </script>
@endsection

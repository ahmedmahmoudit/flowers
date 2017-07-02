@extends('backend.layouts.master')
@section('title', 'New Coupon')

@section('styles')
    @parent

    <!-- datatables -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <!-- form start -->
                {!! Form::open(['route'=>[Request::segment(1).'.coupons.store'],'method'=>'POST','role' => 'form']) !!}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="inputPercentage">Percentage</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="percentage" class="form-control" id="inputPercentage" placeholder="Enter Coupon Percentage" value="{{old('percentage')}}">
                                <p class="help-block"></p>
                            </div>
                            <div class="col-xs-6">
                                <label for="inputCode">Code</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="code" class="form-control" id="inputCode" placeholder="Enter Coupon Code" value="{{old('code')}}">
                                <p class="help-block">User will enter this code to get percentage discount</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleMinCharge">Minimum Charge</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="minimum_charge" class="form-control" id="exampleMinCharge" placeholder="Enter Minimum Charge" value="{{old('minimum_charge')}}">
                                <p class="help-block">This Coupon will be applied if total order equal or more than minimum charge</p>
                            </div>

                            <div class="col-xs-6">
                                <label for="inputDueDate">Due Date</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="due_date" class="form-control" id="inputDueDate" placeholder="Select Due Date" value="{{old('due_date')}}">
                                <p class="help-block">Coupon will be available till this due date</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="exampleLimited">Is Limited</label>
                                <span class="required" style="color: red;"> * </span>
                                <input type="text" name="is_limited" class="form-control" id="exampleLimited" placeholder="Enter Number" value="{{old('is_limited')}}">
                                <p class="help-block"> 0 for open uses, 2 means coupon will be used only two times then disabled auto</p>
                            </div>
                        </div>
                    </div>
                    @if(!Auth::user()->isManager())
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    @endif
                </div>
                <!-- /.box -->
                @if(Auth::user()->isManager())
                    <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Select Stores</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="form-group" style="text-align: center;font-size: x-large;">
                            {!! Form::checkbox('checkAll', null, null, ['id' => 'checkAll']) !!}
                            {!! Form::label('checkAll', 'Check All', array('for' => 'checkAll')) !!}
                        </div>
                        <div class="form-group">
                            @foreach ($stores->chunk(3) as $array)
                                @foreach($array as $store)
                                    <div class="col-lg-4">
                                        <ul class="list-unstyled">
                                            <li>
                                                <label>
                                                    {!! Form::checkbox('stores[]',$store->id,(in_array($store->id,[],true)) ? true : false, ['class' => 'coupon']) !!}
                                                    {{ $store->name }}
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                @endif
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

    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <script>
        $(function () {

            $("#checkAll").click(function(){
                $('.coupon').not(this).prop('checked', this.checked);
            });

            $('#inputDueDate').datepicker({
                autoclose: true,
                format: 'dd-mm-yyyy',
                startDate: '0d'
            });
        });
    </script>
@endsection

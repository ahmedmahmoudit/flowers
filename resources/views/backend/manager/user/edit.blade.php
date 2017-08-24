@extends('backend.layouts.master')
@section('title', __('adminPanel.user'))

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('adminPanel.edit_user_title')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(['route' => ['manager.users.update', $user->id],'method'=>'PUT']) }}
                    <div class="box-body">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputName">{{__('adminPanel.name')}}</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name" value="{{$user->name or old('name')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputEmail">{{__('adminPanel.email')}}</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" value="{{$user->email or old('email')}}">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>{{__('adminPanel.user_role')}}</label>
                                <select class="form-control" name="role" id="user_role">
                                    <option value="1" {{$user->role == '1' ? 'Selected' : ''}}>Manager</option>
                                    <option value="2" {{$user->role == '2' ? 'Selected' : ''}}>Admin</option>
                                    <option value="3" {{$user->role == '3' ? 'Selected' : ''}}>User</option>
                                </select>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            @if($user->role == '2')
                                <div class="form-group" id="store_select">
                            @else
                                <div class="form-group" id="store_select" style="display: none;">
                            @endif
                                <label>{{__('adminPanel.stores')}}</label>
                                <select class="form-control" name="store">
                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}" {{$store->user_id == $user->id ? 'Selected' : ''}}>{{$store->name}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('adminPanel.save')}}</button>
                    </div>
                    {!!  Form::close() !!}
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

    <script>
        $(function () {
            $('#user_role').on('change', function() {
                if( this.value == '2' ){
                    $('#store_select').show();
                }else{
                    $('#store_select').hide();
                }
            });
        });
    </script>
@endsection
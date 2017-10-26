@extends('layouts.master')

@section('content')

    @component('partials.breadcrumb',['title' => __('Register an Account'), 'nav'=>true])
        <li class="c-active"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
    @endcomponent

    <div class="c-content-box c-size-lg">
        <div class="c-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1">
                        <h3 class="c-font-34 c-font-center c-font-bold c-font-uppercase c-margin-b-30">
                            {{--                            {{ __('Choose Registration Type') }}--}}
                            {{ __('Store Registration') }}
                        </h3>
                        <div class="c-line-center c-theme-bg"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-tab-2 c-theme c-opt-1">
                        {{--<ul class="nav c-tab-icon-stack c-font-sbold c-font-uppercase">--}}
                        {{--<li class="{{ old('role') ? old('role') == '3' ? 'active' : '' : 'active' }}">--}}
                        {{--<a href="#c-tab2-opt1-1" data-toggle="tab">--}}
                        {{--<span class="fa fa-user" style="font-size: 100px"></span>--}}
                        {{--<span class="c-title">{{ __('As an Individual') }}</span>--}}
                        {{--</a>--}}
                        {{--<div class="c-arrow"></div>--}}
                        {{--</li>--}}
                        {{--<li class="{{ old('role') && old('role') == '1' ? 'active' : ''  }}">--}}
                        {{--<a href="#c-tab2-opt1-2" data-toggle="tab">--}}
                        {{--<span class="fa fa-newspaper-o" style="font-size: 100px"></span>--}}
                        {{--<span class="c-title">{{ __('As a Company') }}</span>--}}
                        {{--</a>--}}
                        {{--<div class="c-arrow"></div>--}}
                        {{--</li>--}}

                        {{--</ul>--}}


                        <div class="c-tab-content">
                            <div class="c-bg-img-center1">
                                <div class="container">
                                    <div class="tab-content">

                                        @include('partials.notifications')

                                        {{--<div class="tab-pane fade in {{ old('role') ? old('role') == '3' ? 'active' : '' : 'active' }} " id="c-tab2-opt1-1">--}}
                                        {{--<div class="c-tab-pane">--}}

                                        {{--<form class="c-form-register c-margin-t-20" method="post" action="{{ route('register') }}" >--}}
                                        {{--<input type="hidden" value="3" name="role"/>--}}

                                        {{--<div class="col-md-6 col-md-offset-3">--}}

                                        {{--@include('auth.register_form')--}}

                                        {{--<div class="form-group c-margin-t-40">--}}
                                        {{--<button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{ __('Register') }}</button>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--</form>--}}

                                        {{--</div>--}}
                                        {{--</div>--}}

                                        <div class="tab-pane fade in active" id="c-tab2-opt1-2">
                                            <div class="c-tab-pane">
                                                <form class="c-form-register c-margin-t-20" method="post"
                                                      action="{{ route('register') }}" enctype="multipart/form-data">
                                                    <input type="hidden" value="2" name="role"/>
                                                    <div class="col-md-6 col-md-offset-3">

                                                        @include('auth.register_form')

                                                        <hr>
                                                        <h2>{{ __('Store Information') }}</h2>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Store Name Arabic') }}
                                                                <span class="red">*</span></label>
                                                            <input type="text" name="store_name_ar"
                                                                   value="{{ old('store_name_ar') }}"
                                                                   class="form-control c-square c-theme"
                                                                   placeholder="{{ __('Store Name Arabic') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Store Name English') }}
                                                                <span class="red">*</span></label>
                                                            <input type="text" name="store_name_en"
                                                                   value="{{ old('store_name_en') }}"
                                                                   class="form-control c-square c-theme"
                                                                   placeholder="{{ __('Store Name English') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Store Email') }} <span
                                                                        class="red">*</span></label>
                                                            <input type="text" name="store_email"
                                                                   value="{{ old('store_email') }}"
                                                                   class="form-control c-square c-theme"
                                                                   placeholder="{{ __('Store Email') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Store Phone') }} <span
                                                                        class="red">*</span></label>
                                                            <input type="text" name="store_phone"
                                                                   value="{{ old('store_phone') }}"
                                                                   class="form-control c-square c-theme"
                                                                   placeholder="{{ __('Store Phone') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Store Country') }} <span
                                                                        class="red">*</span></label>
                                                            <select class="form-control c-square c-theme"
                                                                    name="country_id" required>
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}"
                                                                            @if(old('country_id') == $country->id) selected @endif>{{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                        {{--<label class="control-label">{{ __('Minimum Delivery Days') }} <span class="red">*</span></label>--}}
                                                        {{--<input type="text" name="minimum_delivery_days" value="{{ old('minimum_delivery_days') }}" class="form-control c-square c-theme" placeholder="{{ __('ex: 1') }}">--}}
                                                        {{--<span style="font-size:10px">0 for same day delivery</span>--}}
                                                        {{--</div>--}}
                                                        <div class="form-group">
                                                            <label class=" control-label"> {{ __('Start Week Day') }}
                                                                <span class="required" style="color: red;"> * </span>
                                                            </label>
                                                            <select class="form-control c-square c-theme"
                                                                    name="start_week_day" required>
                                                                <option value="saturday"
                                                                        @if(old('start_week_day') === 'saturday') selected @endif>{{ __('Saturday') }}</option>
                                                                <option value="sunday"
                                                                        @if(old('start_week_day') === 'sunday') selected @endif>{{ __('Sunday') }}</option>
                                                                <option value="monday"
                                                                        @if(old('start_week_day') === 'monday') selected @endif>{{ __('Monday') }}</option>
                                                                <option value="tuesday"
                                                                        @if(old('start_week_day') === 'tuesday') selected @endif>{{ __('Tuesday') }}</option>
                                                                <option value="wednesday"
                                                                        @if(old('start_week_day') === 'wednesday') selected @endif>{{ __('Wednesday') }}</option>
                                                                <option value="thursday"
                                                                        @if(old('start_week_day') === 'thursday') selected @endif>{{ __('Thursday') }}</option>
                                                                <option value="friday"
                                                                        @if(old('start_week_day') === 'friday') selected @endif>{{ __('Friday') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=" control-label"> {{ __('End Week Day') }}
                                                                <span class="required" style="color: red;"> * </span>
                                                            </label>
                                                            <select class="form-control c-square c-theme"
                                                                    name="end_week_day" required>
                                                                <option value="saturday"
                                                                        @if(old('end_week_day') === 'saturday') selected @endif>{{ __('Saturday') }}</option>
                                                                <option value="sunday"
                                                                        @if(old('end_week_day') === 'sunday') selected @endif>{{ __('Sunday') }}</option>
                                                                <option value="monday"
                                                                        @if(old('end_week_day') === 'monday') selected @endif>{{ __('Monday') }}</option>
                                                                <option value="tuesday"
                                                                        @if(old('end_week_day') === 'tuesday') selected @endif>{{ __('Tuesday') }}</option>
                                                                <option value="wednesday"
                                                                        @if(old('end_week_day') === 'wednesday') selected @endif>{{ __('Wednesday') }}</option>
                                                                <option value="thursday"
                                                                        @if(old('end_week_day') === 'thursday') selected @endif>{{ __('Thursday') }}</option>
                                                                <option value="friday"
                                                                        @if(old('end_week_day') === 'friday') selected @endif>{{ __('Friday') }}</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                                <label>
                                                                    {{  __('Store Delivery Times')  }}
                                                                </label>
                                                                <ul class="list-unstyled" style="padding-top: 10px;">
                                                                    @foreach($deliveryTimes as $time)
                                                                        <li>
                                                                            <label>
                                                                                {!! Form::checkbox('delivery_times[]',$time->id) !!}
                                                                                {{ $time->name_en }}
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Instagram Username') }} </label>
                                                            <input type="text" name="instagram_username"
                                                                   value="{{ old('instagram_username') }}"
                                                                   class="form-control c-square c-theme"
                                                                   placeholder="{{ __('Instagram Username') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Image') }} </label>
                                                            <input type="file" name="image"
                                                                   class="form-control c-square c-theme">
                                                        </div>

                                                        <div class="form-group c-margin-t-40">
                                                            <button type="submit"
                                                                    class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{ __('Register') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

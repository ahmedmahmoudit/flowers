@extends('layouts.master')

@section('content')
    <div class="c-content-box c-size-lg c-bg-grey-1">
        <div class="container">
            <div class="c-content-title-4">
                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">{{ __('Select Delivery Area') }}</span></h3>
            </div>
            <div class="row">

                {!! Form::open(['route' => 'area.set', 'method' => 'post', 'class'=>'form-horizontal set-area-form','name'=>'set-area-form']) !!}

                <div class="form-group">
                    <label for="inputPassword3" class="col-md-4 control-label">{{ __('Area') }}</label>
                    <div class="col-md-6">
                        <select class="form-control  c-square c-theme select_area" name="area">
                            <option value="">{{__('Select Area')}}</option>
                            @foreach($areas as $area)
                                <option value="{{ $area['id'] }}"
                                        @if($selectedArea && $selectedArea['id'] === $area['id'])
                                        selected
                                        @endif
                                >{{ $area['name_'.app()->getLocale()] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
<div class="modal fade c-content-select-country" id="select-country-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">{{ __('WHERE DO YOU WANT TO SEND YOUR GIFT?') }}</h3>
                <div class="c-body">

                    {!! Form::open(['route' => 'country.set', 'method' => 'post', 'class'=>'form-horizontal', 'id'=>'set-country-form','name'=>'set-country-form']) !!}

                    <div class="form-group">
                        <label for="inputPassword3" class="col-md-4 control-label">{{ __('Country') }}</label>
                        <div class="col-md-6">

                            <select class="form-control  c-square c-theme" id="select_country" name="country">
                                <option value="">{{__('Select Country')}}</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['id'] }}"
                                            @if($selectedCountry['id'] === $country['id'])
                                            selected
                                            @endif
                                    >{{ $country['name_'.$locale] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {!! Form::close() !!}

                    {!! Form::open(['route' => 'area.set', 'method' => 'post', 'class'=>'form-horizontal set-area-form','name'=>'set-area-form']) !!}

                    <div class="form-group">
                        <label for="inputPassword3" class="col-md-4 control-label">{{ __('Area') }}</label>
                        <div class="col-md-6">
                            <select class="form-control  c-square c-theme select_area" id="" name="area">
                                <option value="">{{__('Select Area')}}</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area['id'] }}"
                                            @if($selectedArea && $selectedArea['id'] === $area['id'])
                                            selected
                                            @endif
                                    >{{ $area['name_'.$locale] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
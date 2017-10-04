<div class="row c-padding-20">
    <div class="col-md-offset-2">
        @foreach($ads as $ad)
            <div class="col-md-3 col-sm-4 col-xs-4">
                @if($ad->link)
                    <a href="{{ $ad->link  }}">
                        <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive"/>
                    </a>
                @else
                    <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive"/>
                @endif
            </div>
        @endforeach
    </div>

</div>
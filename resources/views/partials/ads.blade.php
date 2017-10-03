<div class="row" style="margin-bottom:50px">
    @foreach($ads as $ad)
        <div class="col-md-4 col-sm-4 col-xs-4" style="padding-bottom:20px">
            @if($ad->link)
                <a href="{{ $ad->link  }}">
                    <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive" />
                </a>
            @else
                <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive" style="max-height:350px"/>

            @endif
        </div>
    @endforeach
</div>
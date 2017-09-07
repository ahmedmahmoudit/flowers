<div class="row" style="margin-bottom:50px">
    @foreach($ads as $ad)
        <div class="col-md-4 col-sm-4">
            @if($ad->link)
                <a href="{{ $ad->link  }}">
                    <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive" style="height:350px"/>
                </a>
            @else
                <img src="{{ asset('uploads/ad/'.$ad->image) }}" class="img img-responsive" style="height:350px"/>

            @endif
        </div>
    @endforeach
</div>
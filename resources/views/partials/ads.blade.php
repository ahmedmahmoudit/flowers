<div class="" style="margin-bottom:50px">
    @foreach($ads as $ad)
        <div class="col-md-4 col-sm-4">
            <div class="c-content">
                <img src="{{ asset('uploads/ads/'.$ad->image) }}" class="img img-responsive" />
            </div>
        </div>
    @endforeach
</div>
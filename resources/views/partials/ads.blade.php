<div class="" style="margin-bottom:50px">
    @for($i = 1; $i <= 3; $i++)
        <div class="col-md-4 col-sm-4">
            <div class="c-content c-content-overlay">
                <img src="/img/{{rand(1,7)}}.jpg" class="img img-responsive" />
            </div>
        </div>
    @endfor
</div>
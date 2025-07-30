<!--Start Banner-->
<div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
    @foreach ($pubs as $pub )
    <div class="banner-img style-2">
        <div class="banner-text">
            <h2 class="mb-100">{{ $pub->name }}</h2>
            <a href="" class="btn btn-xs">Voir plus <i class="fi-rs-arrow-small-right"></i></a>
        </div>
    </div>
    @endforeach
</div>
<!--End Banner-->
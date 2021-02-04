<section id="main-slider" class="no-margin">
  <div class="carousel slide">
      <ol class="carousel-indicators">
        @foreach ($works as $index => $work)
          <li data-target="#main-slider" data-slide-to="{{ $index}}" class="{{ ($index === 0 ? "active" : "")}}"></li>      
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($works as $index => $work)
          <div class="item {{ ($index === 0 ? "active" : "")}}" style="background-image: url({{ asset('assets/img/portfolio/' . $work->image ) }})">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="carousel-content centered">
                              <h2 class="animation animated-item-1">{{ Str::words($work->title, 6, ' ') }}</h2>
                              <p class="animation animated-item-2">{{ Str::words($work->content, 20, ' ') }} </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div><!--/.item-->
          @endforeach
      </div><!--/.carousel-inner-->
  </div><!--/.carousel-->
  <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
      <i class="icon-angle-left"></i>
  </a>
  <a class="next hidden-xs" href="#main-slider" data-slide="next">
      <i class="icon-angle-right"></i>
  </a>
</section><!--/#main-slider-->
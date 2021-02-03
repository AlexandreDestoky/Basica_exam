{{--
  Variables disponibles
    - $works ARRAY(Work)
--}}

<div class="section">
  <div class="container">
    <div class="row">

      <ul class="grid cs-style-2">
        @foreach($works as $work)
        <div class="col-md-4 col-sm-6">
          <figure>
            <img src="{{ asset('assets/img/portfolio/' . $work->image . '.jpg') }}" alt="{{ $work->title }}">
            <figcaption>
              <h3>{{ Str::words($work->title, 1, ' ') }}</h3>
              <span>{{ $work->client->name }}</span>
              <a href="portfolio-item.html">Take a look</a>
            </figcaption>
          </figure>
        </div>
        @endforeach
      </ul>


    </div>

    <ul class="pager">
      <li><a href="#">More works</a></li>
    </ul>

  </div>
</div> 
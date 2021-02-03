<!-- Our Portfolio -->

<div class="section section-white">
  <div class="container">
    <div class="row">

      <div class="section-title">
        <h1>Our Recent Works</h1>
      </div>

      <ul class="grid cs-style-3">

      @foreach ($works as $work)
        <div class="col-md-4 col-sm-6">
          <figure>
            <img src="{{ asset('assets/img/portfolio/' . $work->image . '.jpg') }}" alt="{{ $work->title }}">
            <figcaption>
              <h3>{{ Str::words($work->title, 1, ' ') }}</h3>
              <span>{{ $work->client->name}}</span>
              <a href="{{ route('portfolio.show', ['work' => $work->id, 'slug' => Str::slug($work->title, '-')]) }}">Take a look</a>
            </figcaption>
          </figure>
        </div>
      @endforeach

      </ul>
    </div>
  </div>
</div>
<!-- Our Portfolio -->
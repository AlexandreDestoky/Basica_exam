{{--
  Variables disponibles
    - $works ARRAY(Work)
--}}

<div class="section">
  <div class="container">
    <div class="row">

      <ul class="grid cs-style-2" id="portfolio_works_list">
        @include('works._portfolio_works_list')
      </ul>


    </div>

    @include('works._portfolio_works_more_btn')

  </div>
</div> 
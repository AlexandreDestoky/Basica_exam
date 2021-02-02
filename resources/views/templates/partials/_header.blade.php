<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Basica">
          </a>
      </div>
      <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="{{ route('home') }}">Home</a></li>
              <li><a href="portfolio.html">Portfolio</a></li>
              <li><a href="{{ route('blog') }}">Blog</a></li>
              <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
      </div>
  </div>
</header><!--/header-->

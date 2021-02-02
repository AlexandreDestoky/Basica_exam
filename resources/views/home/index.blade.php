
 @extends('templates.index')

 @section('title')
   Home
 @endsection

 @section('content')

  {{-- Carousel (le slider) --}}
  @include('works._home_carousel', ['works' =>\App\Models\Work::orderBy('created_at', 'DESC')->take(4)->where('inSlider', 1)->get()])

  {{-- Portfolio (les 6 works ) --}}
  @include('works._home_works', ['works' =>\App\Models\Work::orderBy('created_at', 'DESC')->take(6)->get()])

  <hr>

  {{-- Posts (les 3 blog de posts) --}}
  @include('posts._home_posts', ['posts' =>\App\Models\Post::orderBy('created_at', 'DESC')->take(3)->get()])

 @endsection
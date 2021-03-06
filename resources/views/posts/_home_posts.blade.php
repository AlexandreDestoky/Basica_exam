{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

<!-- Our Articles -->
<div class="section">
  <div class="container">
    <div class="row">
      <!-- Featured News -->
      <div class="col-sm-6 featured-news">
        <h2>Latest Blog Posts</h2>
 
       @foreach ($posts as $post)
         <div class="row">
           <div class="col-xs-4"><a href="{{ route('blog.show', ['post' => $post->id, 'slug' => Str::slug($post->title, '-')]) }}"><img src="{{ asset('assets/img/blog/' . $post->image ) }}" alt="{{ $post->title }}"></a></div>
           <div class="col-xs-8">
             <div class="caption"><a href="{{ route('blog.show', ['post' => $post->id, 'slug' => Str::slug($post->title, '-')]) }}">{{$post->title}}</a></div>
             <div class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('j F Y') }}</div>
             <div class="intro">{{ Str::words($post->content, 20, ' ') }}<a href="{{ route('blog.show', ['post' => $post->id, 'slug' => Str::slug($post->title, '-')]) }}"> Read more...</a></div>
           </div>
         </div>
       @endforeach
 
      </div>
      <!-- End Featured News -->
 
      <!-- Latest News FB -->
      <div class="col-sm-6 latest-news">
        <h2>Latest Twitter News</h2>
        <div class="row">
          <div class="col-sm-12">
            <a class="twitter-timeline" data-width="600" data-height="600" href="https://twitter.com/ADestoky?ref_src=twsrc%5Etfw">Tweets by ADestoky</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
      <!-- End Featured News -->
    </div>
  </div>
 </div>
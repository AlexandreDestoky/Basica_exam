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
             <div class="caption"><a href="blog-post.html">{{$post->title}}</a></div>
             <div class="date">{{ \Carbon\Carbon::parse($post->created_at)->format('j F Y') }}</div>
             <div class="intro">{{ Str::words($post->content, 20, ' ') }}<a href="{{ route('blog.show', ['post' => $post->id, 'slug' => Str::slug($post->title, '-')]) }}"> Read more...</a></div>
           </div>
         </div>
       @endforeach
 
      </div>
      <!-- End Featured News -->
 
 
      <!-- Latest News FB -->
      <div class="col-sm-6 latest-news">
        <h2>Lastest FaceBook/Twitter News</h2>
        @foreach ($posts as $post)
          <div class="row">
            <div class="col-sm-12">
              <div class="caption"><a href="full-width.html">Donec elementum mi vitae enim fermentum lobortis.</a></div>
              <div class="date">16 May 2013 </div>
              <div class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. <a href="full-width.html">Read more...</a></div>
            </div>
          </div>
        @endforeach
 
      </div>
      <!-- End Featured News -->
    </div>
  </div>
 </div>
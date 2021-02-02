{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

<h4>Recent Posts</h4>
<ul class="recent-posts">
  @foreach ($posts as $post)
    <li><a href="{{ route('blog.show', ['post' => $post->id, 'slug' => Str::slug($post->title, '-')]) }}">{{ $post->title }}</a></li>   
  @endforeach
</ul> 
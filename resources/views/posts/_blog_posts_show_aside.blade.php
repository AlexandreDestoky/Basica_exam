<!-- Sidebar -->
<div class="col-sm-4 blog-sidebar">

  @include('posts._blog_posts_show_recent', ['posts' => \App\Models\Post::orderBy('created_at', 'DESC')->take(4)->get()])

  @include('categories._blog_categorie_show', ['categories' => \App\Models\Categorie::orderBy('created_at', 'DESC')->take(4)->get()])

</div>
<!-- End Sidebar --> 
{{--
  Variables disponibles
    - $post Post
 --}}

 @extends('templates.index')
 
 @section('title')
   Blog - {{ $post->title }}
 @endsection
 
 
 @section('content')

      <!-- Page Title -->
      <div class="section section-breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Blog Post</h1>
          </div>
        </div>
      </div>
    </div>

   <div class="section">
     <div class="container">
       <div class="row">
         <!-- Blog Post -->
         <div class="col-sm-8">
           <div class="blog-post blog-single-post">
             <div class="single-post-title">
               <h2>{{ $post->title }}</h2>
             </div>
 
             <div class="single-post-image">
               <img src="{{ asset('assets/img/blog/' . $post->image ) }}" alt="{{ $post->title }}">
             </div>
             <div class="single-post-info">
               <i class="glyphicon glyphicon-time"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('j M, Y') }} <a href="#" title="Show Comments"><i
                   class="glyphicon glyphicon-comment"></i>11</a>
             </div>
             <div class="single-post-content">
               <h3>{{ $post->title }}</h3>
               <div>{!! $post->content !!}</div>
             </div>
           </div>
         </div>
         <!-- End Blog Post -->
         @include('posts._blog_posts_show_aside')
       </div>
     </div>
   </div>
 @endsection 
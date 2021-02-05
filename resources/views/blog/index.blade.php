{{--
  Variables disponibles
    - $posts ARRAY(Post)
--}}

@extends('templates.index')

@section('title')
  Blog
@endsection

@section('content')

     <!-- Page Title -->
     <div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>Our Blog</h1>
					</div>
				</div>
			</div>
		</div>

  <div class="section">
    <div class="container">
      <div class="row">
        @include('posts._blog_posts')

        <!-- Pagination -->
        <div class="pagination-wrapper ">
          {{$posts->links("pagination::bootstrap-4")}}
        </div>

      </div>
    </div>
  </div>
@endsection 
<div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title"><a href="/post/{{$post->slug}}">{{$post->title}}</a></h2>
            <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->author->name}}</a></p>
            <p>{{$post->excerpt}}</p>
            <hr>
          <!--  <p>{{$post->body}}</p> -->
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

      </div><!-- /.row -->

</div><!-- /.container -->

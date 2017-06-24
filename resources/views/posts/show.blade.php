@extends('layouts.front')

@section('content')
<div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h1 class="blog-post-title">{{$post->title}}</h1>
            <h2 class="blog-post-subtitle"><small>{{$post->sub_title}}</small></h2>
            <hr>
            <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}} by <a href="#">{{$post->author->name}}</a></p>
            <hr>
            <!-- Preview Image -->
            <img class="img-responsive" src='/storage/{{$post->image}}' alt="">

            <hr>
            <p class="lead">{!! \Michelf\Markdown::defaultTransform($post->body) !!}</p>
            <hr>
            {{--Answer/comment--}}

            @foreach($post->comments as $comment)
                <div class="comment-list well well-lg">
                   @include('posts.partials.post-comment-list')
                </div>
                <hr>

                {{--reply to comment--}}
                <button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">reply</button>
                <br>
                {{--//reply form--}}
                <div style="margin-left: 50px" class="reply-form-{{$comment->id}} hidden">

                    <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
                        {{csrf_field()}}
                        <legend>Create Reply</legend>

                        <div class="form-group">
                            <input type="text" class="form-control" name="body" id="" placeholder="Reply...">
                        </div>


                        <button type="submit" class="btn btn-primary">Reply</button>
                    </form>

                </div>
                <br>

                @foreach($comment->comments as $reply)
                    @include('posts.partials.reply-list')

                @endforeach


            @endforeach
            <br><br>
            @include('posts.partials.comment-form')
            <br>
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

      </div><!-- /.row -->

</div><!-- /.container -->
    
@endsection

@section('js')

    <script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }

    </script>

@endsection
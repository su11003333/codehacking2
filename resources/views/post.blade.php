@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>
    @if(Session::has('comment_message'))

        {{session('comment_message')}}

    @endif
    <!-- Blog Comments -->



    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">


        <h4>Leave a Comment:</h4>




       {!! Form::open(['method'=>'POST','action'=>'PostsCommentsController@store']) !!}

           <input type="hidden" name="post_id" value="{{$post->id}}">

           <div class="form-group">

{{--               {!! Form::label('body','Body:') !!}--}}
               {!! Form::textarea('body',null, ['class'=>'form-control','row'=>3]) !!}
           </div>

           <div class="form-group">
               {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
           </div>

        {!! Form::close() !!}




    </div>

    @endif

    <hr>

    <!-- Posted Comments -->

    @if(count($comments)>0)
    <!-- Comment -->
        @foreach($comments as $comment)
            <div class="media" >
                <a class="pull-left" href="#">
                    <img height="64"  class="media-object" src="{{$comment->photo}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at}}</small>
                    </h4>
                    <p>{{$comment->body}}</p>



                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                    <div class="form-group">
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        {!! Form::label('body','Leave a message:') !!}
                        {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>1]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}




                    @if(count($comment->replies)>0)

                        @foreach($comment->replies as $reply)

                            @if($reply->is_active == 1)

                                <div class="media" style="margin-top:60px;">
                                    <a class="pull-left" href="#">
                                        <img width="64" class="media-object" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>


                                </div>





                            @endif

                        @endforeach

                    @endif
                    <!-- End Nested Comment -->


                </div>
            </div>
        @endforeach
    @endif
    <!-- Comment -->






@stop
@extends('layouts.admin')

@section('content')

    <h1>Edit Posts</h1>

    <div class="row">

        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}


        <div class="form-group">

            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::label('category_id','Category:') !!}
            {{--{!! Form::select('category_id',array('1'=>'php','2'=>'java'),null, ['class'=>'form-control']) !!}--}}
            {!! Form::select('category_id',$categories,null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">

            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">

            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null, ['class'=>'form-control','row'=>3]) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Users', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>



        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Users', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

        {!! Form::close() !!}

        <div class="row">

            <div class="row">
                @include('includes.form_error')
            </div>

@stop
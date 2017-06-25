@extends('layouts.admin')

@section('content')


    <h1>Edit User</h1>
    <div class="col-sm-4">
        <img src="{{$user->photo?$user->photo->file:'http://via.placeholder.com/350x150'}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-8">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}


        <div class="form-group">

            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('role_id',$roles,null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('is_active','Status:') !!}
            {!! Form::select('is_active',array(1=>'active',0=>'Not active'),null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','File:') !!}
            {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>


        <div class="form-group col-sm-6">
            {!! Form::submit('Edit Users', ['class'=>'btn btn-primary btn-block']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'Delete','action'=>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group col-sm-6">
                {!! Form::submit('Delete Users', ['class'=>'btn btn-danger btn-block']) !!}
            </div>

            {!! Form::close() !!}


    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('includes.form_error')
        </div>

    </div>


@stop
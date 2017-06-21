@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img width="100" src="{{$user->photo?$user->photo->file:'http://via.placeholder.com/350x150'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->role?$user->role->name:'User has no role'}}</td>
                    <td>{{$user->is_active==1?'Active':'No active'}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
        @endif





    </table>


    @stop




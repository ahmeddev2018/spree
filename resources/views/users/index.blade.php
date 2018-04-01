@extends('layouts.admin')





@section('content')

    <h1>Users</h1>


    <div class="table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>

            @if($users)

                @foreach($users as $user)

                      <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->firstname." ".$user->lastname}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->is_active==1? 'Active': 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                      </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>

@stop

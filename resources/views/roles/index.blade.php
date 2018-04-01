@extends('layouts.admin')







@section('content')

    <h1>Roles</h1>

    <div class="row col-sm-5">

        {!! Form::open(array('method' => 'Post', 'action'=>'AdminRolesController@store'))!!}

        <div class="form-group">
            {!! Form::label('name', 'Title') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Role',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


    <div class="col-sm-1"></div>

    <div class="row col-sm-6">
        <div class="table-responsive">

            @if($roles)
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td><a href="{{route('roles.edit',$role->id)}}">{{$role->name}}</a></td>
                            <td>{{$role->created_at->diffForHumans()}}</td>
                            <td>{{$role->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>















@stop
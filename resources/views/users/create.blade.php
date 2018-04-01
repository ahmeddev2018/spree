@extends('layouts.admin')




@section('content')

    <h1>Create User</h1>



    {!! Form::open(array('method' => 'Post', 'action'=>'AdminUsersController@store','files'=>true))!!}

    <div class="form-group">
        {!! Form::label('firstname', 'First Name:') !!}
        {!! Form::text('firstname',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastname', 'Last Name:') !!}
        {!! Form::text('lastname',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::email('email',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('avatar_id', 'User Avatar:') !!}
        {!! Form::file('avatar_id',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id',$roles ,2, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array('1' => 'Active', '0' => 'Not Active'),1, ['class'=>'form-control']);
!!}
    </div>




    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}



@stop
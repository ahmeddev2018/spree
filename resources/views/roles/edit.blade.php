@extends('layouts.admin')



@section('content')


    <div class="row">

        {!! Form::model($roles,['method' => 'PATCH', 'action'=>['AdminRolesController@update',$roles->id]])!!}

        <div class="form-group">
            {!! Form::label('name', 'Title') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Role',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method' => 'DELETE', 'action'=>['AdminRolesController@destroy',$roles->id]])!!}

        <div class="form-group">
            {!! Form::submit('Delete Role',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@stop
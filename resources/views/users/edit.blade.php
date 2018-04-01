@extends('layouts.admin')




@section('content')

    <h1>Edit User</h1>

    <div class="row">




 <div class="col-sm-9">
    {!! Form::model($user,['method' => 'Patch', 'action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}

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
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id',$roles ,null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array('1' => 'Active', '0' => 'Not Active'),null , ['class'=>'form-control']);
!!}
    </div>




    <div class="form-group">
        {!! Form::submit('Update User',['class'=>'btn btn-md btn-primary col-sm-6']) !!}
    </div>

     {!! Form::close() !!}

         {!! Form::open(array('method' => 'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]))!!}


             <div class="form-group">
                 {!! Form::submit('Delete User',['class'=>'btn btn-md btn-danger col-sm-6']) !!}
             </div>

             {!! Form::close() !!}


 </div>
</div>

    <div class="row">

        {{--@include('includes.form_error')--}}


    </div>

@stop
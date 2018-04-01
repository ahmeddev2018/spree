@extends('layouts.admin')



@section('content')


<div class="row">

    {!! Form::model($cats,['method' => 'PATCH', 'action'=>['AdminCategoriesController@update',$cats->id]])!!}

    <div class="form-group">
        {!! Form::label('name', 'Title') !!}
        {!! Form::text('name',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}


        {!! Form::open(['method' => 'DELETE', 'action'=>['AdminCategoriesController@destroy',$cats->id]])!!}

            <div class="form-group">
                {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {!! Form::close() !!}

</div>


@stop
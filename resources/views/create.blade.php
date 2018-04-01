@extends('layouts.news-home')






@section('content')


    <div class="container">
    <h1>Create Post</h1>

    <div class="row">

        {!! Form::open(array('method' => 'Post', 'action'=>'AdminPostsController@store', 'files'=>true))!!}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id',$cat ,null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Post Image') !!}
            {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description') !!}
            {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>5]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="row">
        {{--@include('includes.form_error')--}}

    </div>
    </div>






@stop
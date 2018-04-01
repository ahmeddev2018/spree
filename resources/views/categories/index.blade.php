@extends('layouts.admin')







@section('content')

    <h1>Categories</h1>

    <div class="row col-sm-5">

            {!! Form::open(array('method' => 'Post', 'action'=>'AdminCategoriesController@store'))!!}

                    <div class="form-group">
                        {!! Form::label('name', 'Title') !!}
                        {!! Form::text('name',null, ['class'=>'form-control']) !!}
                    </div>
                <div class="form-group">
                    {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

    </div>


    <div class="col-sm-1"></div>

    <div class="row col-sm-6">
    <div class="table-responsive">

        @if($cats)
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @foreach($cats as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td>{{$category->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
        </tbody>
      </table>

            @endif
      </div>
    </div>















    @stop
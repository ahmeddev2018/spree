@extends('layouts.admin')







@section('content')


    <h1>Comments</h1>

@if(count($comments)> 0)

    <div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Author</th>
            <th>E-mail</th>
            <th>Comment</th>
            <th>Post</th>
            <th>Approve/Un-Approve</th>
            <th>Delete Comment</th>

          </tr>
        </thead>
        <tbody>

        @foreach($comments as $comment)
          <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>

              <td>

                  @if($comment->is_active == 1)

                          {!! Form::open(['method' => 'PATCH', 'action'=>['AdminCommentsController@update',$comment->id]])!!}

                      <input type="hidden" name="is_active" value="0">
                              <div class="form-group">
                                  {!! Form::submit('Un-Approve',['class'=>'btn btn-info']) !!}
                              </div>

                              {!! Form::close() !!}

                            @else

                      {!! Form::open(['method' => 'PATCH', 'action'=>['AdminCommentsController@update',$comment->id]])!!}

                      <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                      </div>

                      {!! Form::close() !!}


                      @endif



              </td>



              <td>
                  {!! Form::open(['method' => 'DELETE', 'action'=>['AdminCommentsController@destroy',$comment->id]])!!}

                  <div class="form-group">
                      {!! Form::submit('Delete Comment',['class'=>'btn btn-danger']) !!}
                  </div>

                  {!! Form::close() !!}
              </td>
          </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    @else

    <h1 class="text-center">No Comments</h1>

    @endif











    @stop
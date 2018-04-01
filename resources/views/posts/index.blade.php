@extends('layouts.admin')





@section('content')

    <h1>Posts</h1>

    <div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Post Image</th>
            <th>Title</th>
            <th>Body</th>
            <th>View Post</th>
            <th>Category</th>
            <th>User</th>
            <th>Approve/Un-Approve</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><img height="150" width="200" src="{{$post->photo? $post->photo->name: 'No Avatar'}}" alt=""></td>
            <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->body}}</td>
            <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
            <td>{{$post->category? $post->category->name: 'No Category'}}</td>
            <td>{{$post->user->firstname." ".$post->user->lastname }}</td>
              <td>

                  @if($post->is_active == 1)

                      {!! Form::open(['method' => 'PATCH', 'action'=>['AdminPostsController@update',$post->id]])!!}

                      <input type="hidden" name="is_active" value="0">
                      <div class="form-group">
                          {!! Form::submit('Un-Approve',['class'=>'btn btn-info']) !!}
                      </div>

                      {!! Form::close() !!}

                  @else

                      {!! Form::open(['method' => 'PATCH', 'action'=>['AdminPostsController@update',$post->id]])!!}

                      <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                      </div>

                      {!! Form::close() !!}


                  @endif



              </td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>

          </tr>




                @endforeach
            @endif
        </tbody>
      </table>
      </div>


    <div class="text-center">
    {{ $posts->links() }}
    </div>

@stop

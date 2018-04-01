@extends('layouts.news-home')



@section('news')



    @foreach($articles as $article)

            <div class="card mb-4">
            <img class="card-img-top" src="{{$article->photo? $article->photo->name: 'http://placehold.it/750x300'}}" alt="Card image cap">
            <div class="card-body">
            <h2 class="card-title">{{$article->title}}</h2>
            <p class="card-text">{{$article->body}}</p>
            <a href="{{route('home.post',$article->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            {{$article->created_at->diffForHumans()}} by
            <a href="#">{{$article->user->firstname." ".$article->user->lastname}}</a>
            </div>
            </div>

        @endforeach




    @stop



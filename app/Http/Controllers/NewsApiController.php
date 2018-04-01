<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article;
use App\Photo;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $articles = Post::all();
        return Article::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        //
//        $article = $request->isMethod('put')? Post::findOrFail($request->post_id):new Post;
//
//
//        $article->user_id = $request->input('user_id');
//        $article->title = $request->input('title');
//        $article->body = $request->input('body');
//
//        if($article->save()){
//            return new Article($article);
//        }

        $article = Post::create([
            'body' => request('body'),
            'title' => request('title'),
        ]);

        return new Article($article);
//
//        $input = $request->all();
////        $user= Auth::user();
////        if($file = $request->file('photo_id')){
////
////            $name = time() . $file->getClientOriginalName();
////            $file->move('resources/images/news',$name);
////
////            $photo = Photo::create(['name'=>$name]);
////
////            $input['photo_id'] = $photo->id;
////        }
//
//        Post::create($input);
//
//        return new Article($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

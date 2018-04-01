<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


//


    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category:: pluck('name', 'id')->all();
        return view('posts.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('resources/images/news', $name);

            $photo = Photo::create(['name' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cat = Category:: pluck('name', 'id')->all();
        return view('posts.edit', compact('post', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('resources/images/news', $name);

            $photo = Photo::create(['name' => $name]);

            $input ['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect('/posts');
    }

    public function post($id)
    {

        $post = Post::findOrFail($id);
        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'comments'));
    }


    public function news()

    {

        $articles = Post::orderBy('id', 'desc')->whereIsActive(1)->get();

        return view('news', compact('articles'));
    }


    public function createnews()
    {
        $cat = Category:: pluck('name', 'id')->all();
        return view('create', compact('cat'));
    }
    public function savenews($request)
    {

        {
            $input = $request->all();
            $user= Auth::user();
            if($file = $request->file('photo_id')){

                $name = time() . $file->getClientOriginalName();
                $file->move('resources/images/news',$name);

                $photo = Photo::create(['name'=>$name]);

                $input['photo_id'] = $photo->id;
            }

            $user->posts()->create($input);

            return redirect('/news');
        }

    }


}

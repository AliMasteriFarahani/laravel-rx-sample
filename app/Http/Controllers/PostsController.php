<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //---------------------------------------
    // database raw commands : 
    //---------------------------------------
    // public function insert()
    // {
    //     DB::insert("insert into posts(title,content) values(?,?)", ['post 1', 'content of post 1']);
    // }

    // public function select()
    // {
    //     return DB::select('select * from posts');
    // }
    // public function updatePost()
    // {
    //     DB::update('update posts set title="post 1 updated" where id=1');
    // }
    // public function deletePost()
    // {
    //     DB::delete('delete from posts where id=1');
    // }

    //---------------------------------------
    // Eloquent : 
    //---------------------------------------

    public function getAllPosts()
    {
        $posts = Post::all();
        // $posts = Post::find(2);
        // $posts = Post::findOrFail(1);
        // $posts = Post::where('title', 'post 1')->orderBy('id', 'desc')->take(1)->get();
        return $posts;
    }

    public function savePost()
    {
        // way one :
        $post = new Post();
        $post->title = "post 3";
        $post->content = "post 3 content";
        $post->save();

        // way two :

        $post = Post::create(['title' => 'post 4', 'content' => 'post 4 content']);
    }

    public function updatePost()
    {
        // way one :
        // $post = Post::where('id', 3)->update(['title' => 'updated post --', 'content' => 'updated content --']);

        // way two :
        $post = Post::findOrFail(3);
        $post->title = 'updated post 3 ++';
        $post->content = 'updated post 3 content ++';
        $post->save();
        return $post;
    }

    public function deletePost()
    {

        // way one :
        // $post = Post::where('id',2)->first();
        // $post->delete();

        //  way two : 
        // $post = Post::destroy(2);
        // $post = Post::destroy([2,3]);

        // use soft delete :

        $post = Post::where('id', 4)->delete();
    }

    public function workWithTrash()
    {
        // $post = Post::withTrashed()->get();
        $post = Post::onlyTrashed()->where('isAdmin', 0)->get();
        return $post;
    }

    public function restorePost()
    {
        $post = Post::onlyTrashed()->where('id', 4)->restore();
    }
    public function forceDelete()
    {
        $post = Post::onlyTrashed()->where('id', 4)->forceDelete();
    }

    //----------------------------------------
    public function index($id = null)
    {
        return 'id is' . $id;
    }

    public function showMyView($id, $name)
    {
        // return view('pages.myView')->with('id',$id);
        return view('pages.myView', compact(['id', 'name']));
    }

    public function contact()
    {
        $persons = ['Ali', 'Mohammad', 'Mina', 'Reza', 'Sahar'];
        return view('pages.contact', compact(['persons']));
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
        //
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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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

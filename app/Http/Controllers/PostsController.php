<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // database raw commands : 
    public function insert()
    {
        DB::insert("insert into posts(title,content) values(?,?)", ['post 1', 'content of post 1']);
    }

    public function select()
    {
        return DB::select('select * from posts');
    }
    public function updatePost()
    {
        DB::update('update posts set title="post 1 updated" where id=1');
    }
    public function deletePost()
    {
        DB::delete('delete from posts where id=1');
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

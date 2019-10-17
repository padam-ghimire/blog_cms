<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // dd($request->content);
        //
        $image= $request->image->store('posts');
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at' => $request->published_at,
            'image' => $image
        ]);
        session()->flash('success','Post Created successfully');
        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only([
            'title',
            'description',
            'published_at',
            'content'
        ]);
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            $post->deleteImage();
            $data['image']=$image;
        }
        $post->update($data);
        session()->flash('success','Post Updated Successfully.');
        return redirect(route('posts.index'));
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
        $post=Post::withTrashed()->where('id',$id)->firstOrfail();
       
        if($post->trashed()){
            $post->deleteImage();
             Storage::delete($post->image);
            $post->forceDelete();
        }else{
            $post->delete();
        }

        session()->flash('success',"Post Deleted Successfully.");
        return redirect(route('posts.index'));

    }
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }

    public function restore($id){
        $post=Post::withTrashed()->where('id',$id)->firstOrfail();
        $post->restore();
        session()->flash('success',"Post Restore Successfully.");
        return redirect()->back();
    }
}

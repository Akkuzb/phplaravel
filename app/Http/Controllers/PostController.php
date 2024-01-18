<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
           ]);
           Post::create($request->all());
           return redirect()->route('posts.index')->with('success','Post created successfully.');
           
    }
    
    public function show(Post $post)
    {
    return view('posts.show',compact('post'));
    }
    
    
    public function edit(Post $post)
    {
    return view('posts.edit',compact('post'));
    }
    
    public function update(Request $request,Post $post)
    {  
        $request->validate([
            'title'=>'required',
            ]};
            $post->update($request->all());
            return redirect()->route('post.index')->with('success','Post updated successfull');
     }
     
     
     
     public function destroy(Post $post)
     {
      $post->delete();
       return redirect()->route('posts.index')
                      ->with('success','post deleted successfully');
      }
   }                               

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

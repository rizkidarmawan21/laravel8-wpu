<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.posts.index',[
            'posts' =>Post::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' =>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->file('image')->store('post-images');
        
        $validatedData = $request->validate([
            'title' => 'required|max:25',
            'slug'  => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags( $request->body), 100, '...');


        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success','New Post has been adden!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            return view('dashboard.posts.show',
            [
                'post' => $post
            ]);
        }
        return 'you are not the owner of this post';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id == $post->user_id) {
            return view('dashboard.posts.edit',[
                'post' => $post,
                'category' =>  Category::all()
            ]);
        }

        return  'you are not the owner of this post';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            'title' => 'required|max:25',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ];

       

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }


        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags( $request->body), 100, '...');


        // bisa pakai ini ========
        // Post::where('id',$post->id)->update($validatedData);
        // ===============

        $post->update($validatedData);  // bisa pakai ini
        return redirect('/dashboard/posts')->with('success','Post has been updated!');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        if (auth()->user()->id == $post->user_id) {

            if ($post->image) {
                Storage::delete($post->image);
            }
            Post::destroy($post->id);
            // $post->delete(); // ini cara delete juga terserah karepmu mau pakai yg mana
            return redirect('/dashboard/posts')->with('success',' Post has been deleted!');
        }
        return 'you are not the owner of this post';
    }


    // untuk cek slug agar terisi otomatis
    public function cekSlug (Request $request){
        // $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $slug = SlugService::createSlug(Post::class,'slug' ,$request->title);
        return response()->json(['slug'=> $slug]);
    }
}

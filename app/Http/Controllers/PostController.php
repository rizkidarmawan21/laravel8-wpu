<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    
    
    public function index(){

        // $posts = Post::latest();

        // cek add pencarian tidak
        // if(request('search')){
        //     $posts->where('title','like','%' . request('search') .'%')
        //     ->orWhere('body', 'like','%'. request('search'). '%');
        // }



        // dd(request('search'));
        $title = '';

        if(request('category')){
            $category = Category::firstWhere('slug',request('category'));
            $title = ' in '.$category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username',request('author'));
            $title = ' by '.$author->name;
        }

        return view('posts', [
            'title' => 'All Posts'. $title,
            'active' => 'posts',
            // 'posts' => \App\Models\Post::all()

            // 'posts' => Post::all()  //menampilkan semua data Post::all 

            // 'posts' => Post::latest()->get()  //menampilkan semua data di mana ambil yang terbaru diupload ini terjadi karena ada created_at(Cara ini lazi loading)

            // 'posts' => Post::with(['author','category'])->latest()->get()  //menampilkan semua data di mana ambil yang terbaru diupload ini terjadi karena ada created_at (cara ini eager loading )


            // 'posts' => Post::latest()->filter(request(['search','category','author']))->get()  //menampilkan semua data di mana ambil yang terbaru diupload ini terjadi karena ada created_at (cara ini eager loading ) ini menggunkan filter

            // 'posts' => Post::latest()
            // ->filter(request(['search','category','author']))
            // ->paginate(7)
            // ->withQueryString()  //menampilkan semua data di mana ambil yang terbaru diupload ini terjadi karena ada created_at (cara ini eager loading ) ini menggunkan pagination(paginate) jadi get nya di ganti pagination


            // 'posts' => $posts->get()




            // ==================== ini solved dari temen discord


            'posts' => Post::latest()
                        -> searching(request(['search']))
                        -> categoryauthor(request(['category','author']))
                        ->paginate(7)
            ->withQueryString() 
        ]);
    }

    public function show(Post $post){
        
        return view('post',[
            'title' =>'Single Post',
            'active' => 'posts',
            // 'post' =>Post::find($id)
            'post' => $post
        ]);
    }
}
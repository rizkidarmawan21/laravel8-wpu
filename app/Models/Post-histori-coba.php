<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
    private static $blog_posts = [
        [
            'title' => 'Pintar Ngoding',
            'slug'=>'pinter-ngoding',
            'author' => 'Rizki',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus officia ducimus dolore, explicabo dolorum dolor debitis consectetur aspernatur dolorem. Quos dolorum fugiat corporis, officiis omnis reiciendis quibusdam magni animi? Ex amet molestiae eveniet possimus minima nesciunt quibusdam repellendus est mollitia! Enim fuga animi sed tenetur error dolore impedit voluptas ad, nam natus quasi quis cumque expedita ipsam libero tempore temporibus itaque omnis dolores ea optio! Eligendi, culpa sint repellat voluptate voluptates, reprehenderit quos porro at vitae quisquam a blanditiis nemo?'


        ],

        [
            'title' => 'Pintar Ngaji',
            'slug' => 'pinter-ngaji',
            'author' => 'Darma',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia laboriosam dolorum autem incidunt! Quia expedita similique ratione alias qui aliquid minima quae ipsa ab cum. Error dignissimos repudiandae eveniet cupiditate explicabo dolorem asperiores odit labore, enim quod vero quis iure ab, nisi ipsa itaque fugiat omnis, aperiam voluptatum porro magni fuga illo necessitatibus assumenda! Cupiditate exercitationem veniam aspernatur asperiores natus ducimus totam, saepe ad dolores quisquam voluptatibus! Eligendi, sint saepe totam atque veritatis nulla illo vero placeat exercitationem officia, aliquam aliquid odit similique. Alias, dolores. Debitis laborum harum doloribus doloremque aspernatur esse reprehenderit sequi nisi eos animi. Praesentium, vitae molestias?'


        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        // $post =[];
        // foreach($posts as $p) {
        //     if($p['slug'] === $slug){
        //         $post = $p;
        //     }
        // }

    return $posts->firstWhere('slug',$slug);
    }

}

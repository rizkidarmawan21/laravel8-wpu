<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create(); //ini cara instan
        
        // ini cara manual
        // User::create([
            //     'name' => 'Arina Mana Sikana',
            //     'email' => 'arin@gmail.com',
            //     'password' => bcrypt('12345')
            // ]);
        User::create([
            'name' => 'Rizki Darmawan',
            'username' => 'Rizki Darms',
            'email' => 'rizkidarmawan.0402102@gmail.com',
            'password' => bcrypt('12345')
        ]);
        
        Category::create([
            'name'=> 'Web Programming',
            'slug'=> 'web-programming'
        ]);
        Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal'
        ]);
        Category::create([
            'name'=> 'Web Design',
            'slug'=> 'web-design'
        ]);
        
        Post::factory(20)->create(); //ini cara instan
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident saepe soluta corrupti repellendus voluptas odio eos sed odit officia, quis iure. Obcaecati hic, fuga voluptatum velit iste soluta, molestiae tempora deleniti minima perspiciatis commodi vel deserunt quod, aliquid quia fugiat sunt illo unde aperiam id repudiandae eligendi. Laboriosam, nobis ipsa. Vitae atque porro maiores quibusdam veniam, reiciendis iusto sunt odio, blanditiis dolor provident hic rem eum placeat! Vel aspernatur consequatur eaque rerum sint magni cum, error pariatur, unde exercitationem vitae voluptatibus accusamus excepturi fuga autem numquam aperiam iusto culpa sequi non neque maiores molestiae recusandae aliquid! Nam a eaque doloremque.',
        //     'category_id' => 1,
        //     'user_id' =>1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident saepe soluta corrupti repellendus voluptas odio eos sed odit officia, quis iure. Obcaecati hic, fuga voluptatum velit iste soluta, molestiae tempora deleniti minima perspiciatis commodi vel deserunt quod, aliquid quia fugiat sunt illo unde aperiam id repudiandae eligendi. Laboriosam, nobis ipsa. Vitae atque porro maiores quibusdam veniam, reiciendis iusto sunt odio, blanditiis dolor provident hic rem eum placeat! Vel aspernatur consequatur eaque rerum sint magni cum, error pariatur, unde exercitationem vitae voluptatibus accusamus excepturi fuga autem numquam aperiam iusto culpa sequi non neque maiores molestiae recusandae aliquid! Nam a eaque doloremque.',
        //     'category_id' => 1,
        //     'user_id' =>2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident saepe soluta corrupti repellendus voluptas odio eos sed odit officia, quis iure. Obcaecati hic, fuga voluptatum velit iste soluta, molestiae tempora deleniti minima perspiciatis commodi vel deserunt quod, aliquid quia fugiat sunt illo unde aperiam id repudiandae eligendi. Laboriosam, nobis ipsa. Vitae atque porro maiores quibusdam veniam, reiciendis iusto sunt odio, blanditiis dolor provident hic rem eum placeat! Vel aspernatur consequatur eaque rerum sint magni cum, error pariatur, unde exercitationem vitae voluptatibus accusamus excepturi fuga autem numquam aperiam iusto culpa sequi non neque maiores molestiae recusandae aliquid! Nam a eaque doloremque.',
        //     'category_id' => 2,
        //     'user_id' =>1
        // ]);
        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident saepe soluta corrupti repellendus voluptas odio eos sed odit officia, quis iure. Obcaecati hic, fuga voluptatum velit iste soluta, molestiae tempora deleniti minima perspiciatis commodi vel deserunt quod, aliquid quia fugiat sunt illo unde aperiam id repudiandae eligendi. Laboriosam, nobis ipsa. Vitae atque porro maiores quibusdam veniam, reiciendis iusto sunt odio, blanditiis dolor provident hic rem eum placeat! Vel aspernatur consequatur eaque rerum sint magni cum, error pariatur, unde exercitationem vitae voluptatibus accusamus excepturi fuga autem numquam aperiam iusto culpa sequi non neque maiores molestiae recusandae aliquid! Nam a eaque doloremque.',
        //     'category_id' => 2,
        //     'user_id' =>2
        // ]);
    }
}



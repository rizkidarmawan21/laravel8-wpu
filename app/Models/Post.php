<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,Sluggable;
    // use Sluggable;

    // protected $fillable = ['title','excerpt','body']; //yang boleh diisi apa aja saat create dengan tinker
    protected $guarded = ['id']; // kebalikan fillable

    protected $with = ['category','author'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }


    // public function scopeFilter($query,array $filters){

    //     //     if(request('search')){
    //     //     return $query->where('title','like','%' . request('search') .'%')
    //     //     ->orWhere('body', 'like','%'. request('search'). '%');
    //     // }

    //     // $query->when(isset($filters['search']) ? $filters['search'] : false); // ini juga bisa


    //     $query->when($filters['search'] ?? false,function($query,$search){
    //         return $query->where('title','like','%' . $search .'%')
    //         ->orWhere('body', 'like','%'. $search. '%');
    //     }); // bisa juga dengan ini


    //     $query->when($filters['category'] ?? false,function($query,$category){
    //         return $query->whereHas('category',function($query) use ($category){
    //             $query->where('slug',$category);
    //         });
    //     });
        
    //     $query->when($filters['author'] ?? false,function($query,$author){
    //         return $query->whereHas('author',function($query) use ($author){
    //             $query->where('username',$author);
    //         });
    //     });

    //     // $query->when($filters['author'] ?? false, fn($query,$author) => $query->whereHas('author',fn($query)=>$query->where('username',$author)));
    // }




    // ============================== ini solved dari temen discord

    public function scopeSearching($query,$filters) {
        
        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->where('title','like','%' . $search .'%')
            ->orWhere('body', 'like','%'. $search. '%');
        }); // bisa juga dengan ini
    }


    public function scopeCategoryAuthor($query,array $filters) {

        
        $query->when($filters['category'] ?? false,function($query,$category){
            return $query->whereHas('category',function($query) use ($category){
                $query->where('slug',$category);
            });
        });
        
        $query->when($filters['author'] ?? false,function($query,$author){
            return $query->whereHas('author',function($query) use ($author){
                $query->where('username',$author);
            });
        });

    }

    public function getRouteKeyName()
        {
            return 'slug';
        }






        
        public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'title'
                ]
            ];
        }
}




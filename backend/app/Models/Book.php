<?php

namespace App\Models ;
use Illuminate\Database\Eloquent\Model;

class Book extends Model{

    protected $fillable = [
        'title' , 'description' , 'price' , 'details' , 'auther' , 'isbn' , 'published_at' , 'sold' , 'image'
    ] ;
    
}

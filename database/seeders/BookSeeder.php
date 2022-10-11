<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1=Book::create([
            "category_id"=>Category::where('name','Laravel')->first()->id,
            "publisher_id"=>Publisher::where('name','ahmad')->first()->id,
            'title'=>'laravel',
            'description'=>'lololoooooooooooo',

            'number_of_copies'=>'300',
            'number_of_pages'=>'288',
            'price'=>'17',
            'isbn'=>'10000',
            'cover_image'=>'images/1.png',
            

        ]);

        $book1->authors()->attach(Author::where('name','ali')->first());
    }
}

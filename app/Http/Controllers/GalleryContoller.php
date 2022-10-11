<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GalleryContoller extends Controller
{
    //

    public function index()
    {
        $books=Book::Paginate(12);
        $title="Books Gallery";
        return view('gallery',compact('books','title'));
    }


    public function search(Request $request)
    {
    $books=Book::where('title','like',"%{$request->term}%")->paginate(12);
    $title="search about ".$request->term;
    return view('gallery',compact('books','title'));
    }
}

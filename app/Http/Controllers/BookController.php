<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id','DESC')->paginate(2) ;
        // $books = Book::select('title','description')->get() ;
        // return view('Books.Book', compact('books'));
        // $books = Book::where('id','>=','2')->get() ;
        // $books = Book::select('title', 'description')->where('id', '>=', '2')->orderBy('id','DESC')->get();
        return view('Books.index',compact('books'));
    }

    public function show ($id)
    {
        $book = Book::findOrFail($id) ;

        return view('Books.show', compact('book'));
    }

    public function create ()
    {
        return view('Books.create');
    }

    public function store (Request $request)
    {
       $title = $request->title;
       $description = $request->description;

       Book::create([
        'title' => $title ,
        'description' => $description ,
       ]) ;

       return redirect(route('books.index')) ;

    }


    public function edit ($id)
    {
      $book =  Book::findOrFail($id);

      return view('Books.edit',compact('book')) ;
    }

    public function update (Request $request,  $id)
    {
        $title = $request->title ;
        $description = $request-> description ;

        Book::findOrFail($id)-> update(
            [
                'title' => $title ,
                'description' => $description ,
            ]
        );

        return redirect(route('books.index')) ;
    }


    public function delete ($id)
    {
        Book::findOrfail($id)->delete();
        return redirect(route('books.index')) ;
    }
}

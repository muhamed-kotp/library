<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderedBy('id', 'DESC')->paginate(2);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required| image| mimes:jpg,png'
        ]);

        //move

        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . $ext;
        $img->move(public_path('uploads/books'), $name);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);
        return redirect(route('books.index'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id) ;
        return view('books.show',compact('book'));
    }
    public function edit ($id)
    {
        $book = Book::findOrFail($id) ;
        return view('books.edit',compact('book'));
    }
    public function update (Request $request ,$id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required| image| mimes:jpg,png'
        ]);

        //move
        $book = Book::findOrFail($id) ;
        $name = $request->img ;

        if($request->hasFile('img')){
            if($name != null){
                unlink(public_path('uploads/books/').$name);
            }
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book-" . uniqid() . $ext;
            $img->move(public_path('uploads/books'), $name);
        }

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);
        return redirect(route('books.index'));
    }
}


// $books = Book::select('title', 'desc')->get();
// $books = Book::where('id', '>=', 2)->get();
// $books = Book::select('title', 'desc')->where('id', '>=', 2)->orderBy('id', 'DESC')->get();
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return view(
            'category.index',
            compact('books')
        );
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword ;
        $books = Book::where('title','like',"%$keyword%")->get();
        return response()->json($books);
    }

    public function welcome()
    {
        $cats = Category::get();

        return view(
            'welcome',
            compact('cats')
        );
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view(
            'books.show',
            compact('book')
        );
    }

    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view(
            'books.create',compact('categories')
        );
    }

    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'

        ]);
        // move
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "book-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/books'), $name);

        $book=  Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);

        $book->categories()->sync($request->category_ids);
        return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view(
            'books.edit',
            compact('book')
        );
    }

    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png',
        ]);

        $book = Book::findOrFail($id);
        $name = $book->img;

        if ($request->hasFile('img')) {
            if ($name !== null) {
                unlink(public_path('uploads/books/') . $name);
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "book-" . uniqid() . ".$ext";
            $img->move(public_path('uploads/books/'), $name);
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);

        return redirect(route('books.edit', $id));
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if ($book->img !== null) {
            unlink(public_path('uploads/books/') . $book->img);
        }

        $book->delete();

        return redirect(route('category.index'));
    }
}


// $books = Book::select('title', 'desc')->get();
// $books = Book::where('id', '>=', 2)->get();
// $books = Book::select('title', 'desc')->where('id', '>=', 2)->orderBy('id', 'DESC')->get();
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiBookController extends Controller
{
public function index()
{
    $books = Book::get();
    return response()->json($books);
}
public function show($id)
{
    $book = Book::with('categories')->findOrFail($id);
    return response()->json($book);
}

public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

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
            $success= 'The Book is Created sucssefully' ;
            return response()->json($success);

    }

    public function update(Request $request, $id)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,png',
            'category_ids'=>'required',
            'category_ids.*'=>'exists:categories,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }

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


            $book->update([
                'title' => $request->title,
                'description' => $request->description,
                'img' => $name
            ]);
            $book->categories()->sync($request->category_ids);
            $success= 'The Book is Updated sucssefully' ;
            return response()->json($success);
            }

        }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if ($book->img !== null) {
            unlink(public_path('uploads/books/') . $book->img);
        }

        $book->categories()->sync([]);
        $book->delete();
        $success= 'The Book is Deleated sucssefully' ;
        return response()->json($success);

    }


}
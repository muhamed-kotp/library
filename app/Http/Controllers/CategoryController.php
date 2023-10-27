<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::orderBy('id','DESC')->get();
        $books = Book::get();

        return view('Category.index',[
            'books' =>$books ,
            'categories' =>$categories

        ]);
    }

    // Show
    public function show ($id)
    {
        $cat= Category::find($id);
        return view('Category.show',compact('cat'));
    }

    //Create
    public function create ()
    {
        return view ('category.create');
    }

    public function store (Request $request)
    {
        // valdation
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'required|image|mimes:jpg,png'
        ]);

        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name = "cat-" . uniqid() . ".$ext";
        $img->move(public_path('uploads/categories'), $name);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $name
        ]);
        return redirect(route('category.index')) ;

    }

    public function edit ($id)
    {
        $cat = Category::findOrFail($id);
        return view('category.edit',compact('cat'));
    }
    public function update (Request $request, $id)
    {
        //validation
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png'
        ]);

        $cat = Category::findOrFail($id) ;
        $name = $cat->img;

        if ($request->hasFile('img')) {
            // dd($name) ;
            if ($name !== "") {
                unlink(public_path('uploads/categories/') . $name);
            }

            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "cat-" . uniqid() . ".$ext";
            $img->move(public_path('uploads/categories/'), $name);
        }


        $cat->update([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $name

        ]);

        return redirect(route('category.index'));

    }

    //delete

      public function delete ($id)
      {
        $cat = Category::findOrFail($id);
        if ($cat->img !== null) {
            unlink(public_path('uploads/categories/') . $cat->img);
        }

    $cat->delete();
    return redirect(route('category.index'));
      }
}
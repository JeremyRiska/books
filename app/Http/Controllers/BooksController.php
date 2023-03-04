<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;

class BooksController extends Controller
{
    
    public function index(Request $request)
    {
        $books = Book::get()->all();

        return view('books', [
            'categories' => $this->getCategories(),
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        \Log::info($request);

        $newBook = new Book();
        $newBook->name = $request->name;
        $newBook->isbn = $request->isbn;
        $newBook->price = $request->price;
        $newBook->category_id = $request->category_id;
        $newBook->author_id = $this->getAuthor($request->search);
        $newBook->save();
        
        return back();
    }

    public function getCategories()
    {
        return Category::get()->all();
    }

    public function getAuthor($authorName)
    {
        return Author::firstOrCreate(['author_name' => $authorName])->id;
    }

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Author::where('author_name', 'LIKE', '%'. $query. '%')->pluck('author_name');
          return response()->json($filterResult);
    }
}

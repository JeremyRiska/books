<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;


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

    public function booksJson()
    {
        return json_encode(Book::get()->all());
    }

    public function store(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'isbn' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'author' => 'required'
        ],
        [
            'name.required' => 'Kniha musi mat nazov',
            'isbn.required' => 'ISBN je povinne',
            'price.required' => 'knihy nie su zadarmo, zadaj cenu',
            'category_id.required' => 'Zadaj kategoriu',
            'author.required' => 'zadaj meno autora' 
        ]);
        if ($validator->fails()) {
            return redirect('/')->withErrors($validator);
        }
        $validated = $validator->validated();

        $newBook = new Book();
        $newBook->name = $validated['name'];
        $newBook->isbn = $validated['isbn'];
        $newBook->price = $validated['price'];
        $newBook->category_id = $validated['category_id'];
        $newBook->author_id = $this->getAuthor($validated['author']);

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

    public function searchAuthor(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Author::where('author_name', 'LIKE', '%'. $query. '%')->pluck('author_name');
          return response()->json($filterResult);
    }
}

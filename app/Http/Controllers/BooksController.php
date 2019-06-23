<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Category;
use App\Book;
use Validator;
use Log;

class BooksController extends Controller
{
    const MODEL = "App\Book";

    use RESTActions;

    public function all(Request $request)
    {
        $books = Book::select();
        
        $categoryFilter = $request->input('category');
        if ($categoryFilter) {
            $books->whereHas('categories', function($q) use ($categoryFilter) {
                $q->where('title', '=', $categoryFilter);
            });
        }

        $authorFilter = $request->input('author');
        if ($authorFilter) {
            $books->where('author', 'like', '%' . $authorFilter . '%')->get();
        }

        return $this->respond(Response::HTTP_OK, $books->with('categories')->get());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), Book::$rules, Book::$messages);
        if ($validator->fails()) {
            return $this->respond(400, $validator);
        }
        $book = Book::create($request->all());
        $category = $request->input('category');
        if ($category) {
            $categoryId = Category::firstOrCreate(['title' => $category])->id;
            $book->categories()->attach([$categoryId]);
        }
        return $this->respond(Response::HTTP_CREATED, Book::with('categories')->find($book->id));
    }
}

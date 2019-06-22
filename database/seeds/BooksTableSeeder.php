<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Category;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $book = Book::create([
            'isbn' => '978-1491918661',
            'title' => 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5',
            'author' => 'Robin Nixon',
            'price' => 9.99,
        ]);
        $book->categories()->attach($categories->firstWhere('title', 'PHP')->id);
        $book->categories()->attach($categories->firstWhere('title', 'Javascript')->id);

        $book = Book::create([
            'isbn' => '978-0596804848',
            'title' => 'Ubuntu: Up and Running: A Power User\'s Desktop Guide',
            'author' => 'Robin Nixon',
            'price' => 12.99,
        ]);
        $book->categories()->attach($categories->firstWhere('title', 'Linux')->id);

        $book = Book::create([
            'isbn' => '978-1118999875',
            'title' => 'Linux Bible',
            'author' => 'Christopher Negus',
            'price' => 19.99,
        ]);
        $book->categories()->attach($categories->firstWhere('title', 'Linux')->id);

        $book = Book::create([
            'isbn' => '978-0596517748',
            'title' => 'JavaScript: The Good Parts',
            'author' => 'Douglas Crockford',
            'price' => 8.99,
        ]);
        $book->categories()->attach($categories->firstWhere('title', 'Javascript')->id);

    }
}

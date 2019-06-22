<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'author', 'price'];

    protected $dates = [];

    public static $rules = [
        'isbn'   => 'required|max:15',
        'title'  => 'required',
        'author' => 'required',
        'price'  => 'required',
    ];

    public static $messages = [
        'isbn'   => 'Invalid ISBN',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}


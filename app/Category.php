<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    protected $dates = [];

    public static $rules = [
        'title' => 'required'
    ];

    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}

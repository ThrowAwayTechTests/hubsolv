<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * Routes for resource book
 */

$router->get('book', 'BooksController@all');
$router->get('book/{id}', 'BooksController@get');
$router->post('book', 'BooksController@add');
$router->put('book/{id}', 'BooksController@put');
$router->delete('book/{id}', 'BooksController@remove');

/**
 * Routes for resource category
 */
$router->get('category', 'CategoriesController@all');
$router->get('category/{id}', 'CategoriesController@get');
$router->post('category', 'CategoriesController@add');
$router->put('category/{id}', 'CategoriesController@put');
$router->delete('category/{id}', 'CategoriesController@remove');

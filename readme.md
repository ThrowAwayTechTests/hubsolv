# Backend Book Test

For ease of use there is a docker container include, simply run:

    git clone https://github.com/ThrowAwayTechTests/hubsolv.git
    cd hubsolv
    cp .env.example .env
    docker-compose up -d
    docker-compose exec --user application apache composer install -d /web
    docker-compose exec --user application apache /usr/bin/php /web/artisan migrate:refresh --seed

## Running tests

To run the behat tests:

    ./vendor/bin/behat

## Running tests (if you don't have PHP installed locally)

If the tests fail because you don't have php installed locally then you may need to run the above command in the container directly:

    docker-compose exec --user application apache bash
    cd /web
    ./vendor/bin/behat

## API Routes

For calling the API, here are a list of the API routes available:

### Book

| Verb   | Path                           | Action                      |
--- | --- | ---
| GET    | http://localhost/book          | BooksController@all         |
| GET    | http://localhost/book/{id}     | BooksController@get         |
| POST   | http://localhost/book          | BooksController@add         |
| PUT    | http://localhost/book/{id}     | BooksController@put         |
| DELETE | http://localhost/book/{id}     | BooksController@remove      |

# Category

| Verb   | Path                           | Action                      |
--- | --- | ---
| get    | http://localhost/category      | CategoriesController@all    |
| get    | http://localhost/category/{id} | CategoriesController@get    |
| post   | http://localhost/category      | CategoriesController@add    |
| put    | http://localhost/category/{id} | CategoriesController@put    |
| delete | http://localhost/category/{id} | CategoriesController@remove |

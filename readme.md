# Backend Book Test

For ease of use there is a docker container include, simply run:

    cp .env.example .env
    docker-compose up -d

## Running tests

To run the behat tests navigate run:

    ./vendor/bin/behat

## API Routes

For manual testing an execution, here are a list of the API routes available:

### Book

| GET    | http://localhost/book          | BooksController@all         |
| GET    | http://localhost/book/{id}     | BooksController@get         |
| POST   | http://localhost/book          | BooksController@add         |
| PUT    | http://localhost/book/{id}     | BooksController@put         |
| DELETE | http://localhost/book/{id}     | BooksController@remove      |

# Category

| get    | http://localhost/category      | CategoriesController@all    |
| get    | http://localhost/category/{id} | CategoriesController@get    |
| post   | http://localhost/category      | CategoriesController@add    |
| put    | http://localhost/category/{id} | CategoriesController@put    |
| delete | http://localhost/category/{id} | CategoriesController@remove |

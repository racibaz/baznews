<?php


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    /*
     * Book
     * */
    Route::resource('books', 'Api\Book\BookController', ['only' => ['index', 'show']]);
    Route::resource('books.book_categories', 'Api\Book\BookBookCategoryController', ['only' => ['index']]);


    /*
     * BookCategory
     * */
    Route::resource('book_categories', 'Api\BookCategory\BookCategoryController', ['only' => ['index', 'show']]);
    Route::resource('book_categories.books', 'Api\BookCategory\BookCategoryBookController', ['only' => ['index']]);


    /*
     * BookPublisher
     * */
    Route::resource('book_publishers', 'Api\BookPublisher\BookPublisherController', ['only' => ['index', 'show']]);
    Route::resource('book_publishers.books', 'Api\BookPublisher\BookPublisherBookController', ['only' => ['index']]);
    Route::resource('book_publishers.book_categories', 'Api\BookPublisher\BookPublisherBookCategoryController', ['only' => ['index']]);

    /*
     * BookAuthor
     * */
    Route::resource('book_authors', 'Api\BookAuthor\BookAuthorController', ['only' => ['index', 'show']]);
    Route::resource('book_authors.books', 'Api\BookAuthor\BookAuthorBookController', ['only' => ['index']]);

});

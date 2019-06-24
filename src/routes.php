<?php
Route::group(['middleware' => 'admin'], function () {
    Route::get('/acr/sitemaps/links', 'sitemaps@links');
    Route::get('/acr/sitemaps/link/{id}', 'sitemaps@link');
    Route::post('/acr/sitemaps/links', 'sitemaps@create');
    Route::delete('/acr/sitemaps/link/{id}', 'sitemaps@destroy');


});

Route::get('/acr/sitemaps/maps', 'sitemaps@index');

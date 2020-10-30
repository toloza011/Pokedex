<?php

use Illuminate\Support\Facades\Route;




Route::get('/','PokemonController@index')->name('home');
Route::post('/pokemon','PokemonController@getPokemon')->name('getPokemon');
Route::get('/all','PokemonController@todos')->name('allPokemon');
Route::get('/search/pokemon','PokemonController@searchPokemon')->name('searchPokemon');
Route::get('/search/pokemon/info/{pokemon}','PokemonController@pokemon')->name('perfilPokemon');
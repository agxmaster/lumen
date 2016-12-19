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

//$app->get('/', function () use ($app) {
//    return $app->version();
//});

$app->group(['middleware' => 'auth' ,'namespace' => 'App\Http\Controllers'],function () use ($app){

    $app->get('/storage', ['uses' => 'StoreController@storage' , 'as' =>    'storage']);
    $app->post('/storageSave', ['uses' => 'StoreController@storageSave' , 'as' =>    'storeageSave']);
    $app->get('/out', ['uses' => 'StoreController@out' , 'as' =>    'out']);
    $app->post('/outSave', ['uses' => 'StoreController@outSave' , 'as' =>    'outSave']);
    $app->get('/bad', ['uses' => 'StoreController@bad' , 'as' =>    'bad']);
    $app->post('/badSave', ['uses' => 'StoreController@badSave' , 'as' =>    'badSave']);
    $app->get('/list', ['uses' => 'StoreController@storeList' , 'as' =>    'list']);
    $app->get('/last', ['uses' => 'StoreController@last' , 'as' =>    'last']);
    $app->get('/items', ['uses' => 'ItemsController@add' , 'as' =>    'items']);
    $app->post('/itemsSave', ['uses' => 'ItemsController@itemsSave' , 'as' =>    'itemsSave']);
});
$app->get('/',['uses' => 'LoginController@login' , 'as' =>    'login']);
$app->get('/login', ['uses' => 'LoginController@login' , 'as' =>    'login']);
$app->get('/loginout', ['uses' => 'LoginController@loginout' , 'as' =>    'loginout']);
$app->post('/saveLogin', ['uses' => 'LoginController@saveLogin' , 'as' =>    'saveLogin']);
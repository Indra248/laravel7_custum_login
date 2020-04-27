<?php
#Wajib 
Route::group(['middleware' => ['Auth']], function () {
    Route::get('/home', 'ControllerHome@index');   

    Route::post('/satu', 'ControllerHome@satu');



});

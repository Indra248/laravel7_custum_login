<?php
#Wajib 
Route::group(['middleware' => ['Auth']], function () {
 
    Route::get('/home', 'ControllerHome@index');   

    Route::get('/satu', 'ControllerHome@satu');

    // Route::post(/)


});

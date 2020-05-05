<?php
#Wajib 
Route::group(['middleware' => ['Auth']], function () {
 
    Route::get('/home', 'ControllerHome@index');   

    Route::get('/satu', 'ControllerHome@satu');

    Route::get('/form_AddUser', 'ControllerHome@AddUser');
    // Route::post(/)

    Route::get('/form_oke', 'ControllerHome@sini');
    Route::post('/form_oke', 'ControllerHome@sini');




});

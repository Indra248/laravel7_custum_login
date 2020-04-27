<?php
Route::get('/login', 'Security_Auth@form_login');
Route::post('/check_auth',  'Security_Auth@ActionCheckAuth');

Route::get('/logout',  function(){
    session()->forget('data');
    return redirect('/Auth/login');
});

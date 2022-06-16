<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\NotifyUser;
use App\Models\User;



Route::get('/', function () {
    User::find(1)->notify(new NotifyUser());
    return 'done';
});


route::get('test','MailController@test');
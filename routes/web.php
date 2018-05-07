<?php
use App\User;
use App\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function (){
    $user=User::findOrFail(1);
    $role=['name'=>'Subscriber'];
    $r=new Role($role);
    $user->roles()->save($r);
    return "IT WORKS!";
});
Route::get('/read', function (){
    $user=User::findOrFail(2);
    foreach ($user->roles as $role){
        echo $role->name."<br/>";
    }

});
Route::get('/delete', function (){
    $user=User::findOrFail(1);
    foreach ($user->roles as $role){
        $role->whereId(2)->delete();

    }

});

Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
Route::get('mail', 'EmailController@index');

Route::get('send_test_email', function(){
    Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
    {
        $message->subject('Mailgun and Laravel are awesome!');
        $message->from('maksim@website_name.com', 'DiscoveringWorld');
        $message->to('discoveringworld90@gmail.com');
    });
});
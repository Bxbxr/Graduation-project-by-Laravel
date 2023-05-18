<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'App\Http\Controllers\MainController@index')->name('main');

Route::get('/main/{channel}/videos', 'App\Http\Controllers\MainController@channelsvideos')->name('main.channels.videos');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});

Route::resource('/videos',VideoController::class);

Route::get('/video/search', 'App\Http\Controllers\VideoController@search')->name('video.search');

Route::post('/like','App\Http\Controllers\LikeController@LikeVideo')->name('like');

Route::post('/view','App\Http\Controllers\VideoController@addView')->name('view');


Route::post('/comment','App\Http\Controllers\CommentController@saveComment')->name('comment');
Route::get('/comment/{id}/edit','App\Http\Controllers\CommentController@edit')->name('comment.edit');
Route::patch('/comment/{id}','App\Http\Controllers\CommentController@update')->name('comment.update');
Route::delete('/comment/{id}','App\Http\Controllers\CommentController@destroy')->name('comment.destroy');


Route::get('/history','App\Http\Controllers\HistoryController@index')->name('history');

Route::delete('/history{id}','App\Http\Controllers\HistoryController@destroy')->name('history.destroy');

Route::delete('/destroyAll','App\Http\Controllers\HistoryController@destroyAll')->name('history.destroyAll');

Route::get('/channel', 'App\Http\Controllers\ChannelController@index')->name('channel.index');
Route::get('/channels/search', 'App\Http\Controllers\ChannelController@search')->name('channels.search');

Route::post('/notification', 'App\Http\Controllers\NotificationController@index')->name('notification');
Route::get('/notification', 'App\Http\Controllers\NotificationController@allNotification')->name('all.Notification');

Route::prefix('/admin')->middleware('can:update-videos')->group(function(){
    Route::get('/','App\Http\Controllers\AdminsController@index')->name('admin.index');
    Route::controller(\App\Http\Controllers\ChannelController::class)->group(function () {
        Route::get('/channels','adminIndex')->name('channels.index');
        Route::delete('/channels/{user}','adminDelete')->name('channels.delete')->middleware('can:update-users');
        Route::patch('/{user}/channels','adminUpdate')->name('channels.update')->middleware('can:update-users');
        Route::patch('/{user}/block','adminBlock')->name('channels.block')->middleware('can:update-users');
        Route::get('/channels/block','blockedChannels')->name('channels.blocked');
        Route::patch('/{user}/open','openBlock')->name('channels.open.block')->middleware('can:update-users');
        Route::get('/allChannels','allChannels')->name('channels.all'); // TODO: change to kebab
        Route::get('/allUsers','allUsers')->name('users.all');
        Route::get('/allVideos','App\Http\Controllers\VideoController@allVideos')->name('allVideos');
        Route::get('/allPosts','App\Http\Controllers\PostController@allPosts')->name('allPosts');
        Route::get('/allpages', 'App\Http\Controllers\PageController@allpages')->name('allpages');
        Route::resource('/majors', 'App\Http\Controllers\MajorController');
        

    });
    Route::get('/mostViewedVideos','App\Http\Controllers\VideoController@mostViewedVideos')->name('most.viewed.video');
    Route::resource('/users','App\Http\Controllers\admin\UserController');
    
    
    
    
});

// Route::post('/change-user-status/{userId}/{status}', 'App\Http\Controllers\admin\UserController@changeStatus');


Route::get('/majors/{id}', 'App\Http\Controllers\MajorController@show');
Route::resource('page', 'App\Http\Controllers\PageController');
Route::get('/platformpage', 'App\Http\Controllers\PlatformPageController@create')->name('platformpage.create');


Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');

Route::get('/posts/all', 'App\Http\Controllers\PostController@channelLastPosts')->name('all.posts');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile');
Route::get('/{id}/profile', 'App\Http\Controllers\ProfileController@getId')->name('user.profile');

Route::resource('post', 'App\Http\Controllers\PostController')->except('index')->names([
    'create' => 'posts.create',
    'store' => 'posts.store'
]);
Route::post('/post/search', 'App\Http\Controllers\PostController@search')->name('post.search');

Route::get('/major/getByUniversityId/{id}', 'App\Http\Controllers\MajorController@getByUniversityId')->name('major.getByUniversityId');
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');

Route::get('accept', function () {
    return view('accept');
});
Route::get('/majors', 'App\Http\Controllers\MajorController@all')->name('majors');
// Route::get('te', function () {
//     $user = User::first();

//     return $user->majors;
// });
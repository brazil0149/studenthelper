<?php

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

Route::get('/', function () {
    $threads=App\Thread::paginate(15);
    return view('welcome',compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/thread','ThreadController');

Route::resource('/post','PostsController');

Route::get('/post', 'PostsController@index')->name('posts.index');

Route::get('post/{slug}', 'PostsController@show');

Route::post('/thread/mark-as-solution','ThreadController@markAsSolution')->name('markAsSolution');

Route::resource('comment','CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::post('comment/create/{post}','CommentController@addPostComment')->name('postcomment');

Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');


Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile')->middleware('auth');

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('/chat','ChatController@sendMessage');
 
    Route::get('/chat','ChatController@chatPage');
});

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

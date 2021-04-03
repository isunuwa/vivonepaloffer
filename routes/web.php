<?php


// Route::get('logout', ['uses' => 'Auth\LoginController@getLogout', 'as' => 'get.logout']);
Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'get.home']);
Route::post('/', ['uses' => 'HomeController@postIndex', 'as' => 'post.home']);
Route::get('/spin', ['uses' => 'CustomerController@getSpin', 'as' => 'get.spin']);

Route::group(['prefix'=>'admin'], function(){
    
    Auth::routes();
    
    Route::get('dashboard', ['uses' => 'AdminController@getHome', 'as' => 'get.home']);

    Route::resource('campaignfrom', 'CampaignFromController');
    Route::resource('phonemodel', 'PhoneModelController');
    Route::resource('prize', 'PrizeController');
    Route::resource('customer', 'SalesCustomerController');
    Route::resource('prizedate', 'PrizeDateController');
    Route::resource('awardedprize', 'AwardedPrizesController');
    Route::resource('imei', 'ImeiController');

});

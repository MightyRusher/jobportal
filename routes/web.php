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
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'employer','as'=>'employer.'], function(){

	Route::get('dashboard',
		[
			'as' => 'dashboard',
			'uses' => 'EmployerController@dashboard'
		]
	);

	Route::get('post-job-list',
		[
			'as' => 'postJobList',
			'uses' => 'EmployerController@postJobList'
		]
	);

	Route::get('post-job-applicants/{postJobId}',
		[
			'as' => 'postjobapplicants',
			'uses' => 'EmployerController@postjobapplicants'
		]
	);

	Route::get('post-job',
		[
			'as' => 'getPostJobForm',
			'uses' => 'EmployerController@postJobForm'
		]
	);

	Route::post('post-job',
		[
			'as' => 'postJob',
			'uses' => 'EmployerController@postJob'
		]
    );
    
    Route::get('update-post-job/{postjob_id}',
		[
			'as' => 'updatePostJobForm',
			'uses' => 'EmployerController@updatePostJobForm'
		]
    );
    
    Route::put('update-post-job/{postjob_id}',
		[
			'as' => 'updatePostJob',
			'uses' => 'EmployerController@updatePostJob'
		]
	);
});

Route::group(['prefix'=>'job-seeker','as'=>'seeker.'], function(){

	Route::get('dashboard',
		[
			'as' => 'dashboard',
			'uses' => 'SeekerController@dashboard'
		]
	);

	Route::get('applied-list',
		[
			'as' => 'applyList',
			'uses' => 'SeekerController@applyList'
		]
	);
	
	Route::post('apply/{jobid}',
		[
			'as' => 'apply',
			'uses' => 'SeekerController@apply'
		]
	);
	
});
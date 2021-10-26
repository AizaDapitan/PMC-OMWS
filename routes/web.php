<?php

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

// Route::get('/', function () {
// 	if (Auth::user()) {
// 		return redirect('/dashboard');
// 	}
// 	return redirect('/login');
// });


Auth::routes();



Route::get('logout', 'Auth\LoginController@logout');
Route::get('/','Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.submit'); // login submit


Route::get('adminlogin/admin', 'Auth\LoginController@adminLogin')->name('login.adminLogin'); // login
Route::post('adminsubmit/admin', 'Auth\LoginController@adminSubmit')->name('login.adminsubmit'); // login submit

Route::middleware(['auth'])->group(function () {

	Route::get('/dashboard', 'HomeController@index')->name('home');

	//Route::resource('items', 'ItemsController');

	//Item Routes
	Route::resource('items', 'ItemsController');
	Route::post('/item-update', 'ItemsController@item_update')->name('items.update');	

	
	Route::get('/manual', 'HomeController@manual')->name('manual');

	Route::name('maintenance.')->group(function () {
				
		Route::resource('cutoffs', 'CutoffController');

		Route::resource('locations', 'LocationController');
		Route::get('/locations/{id}/costcode/{costcodeID}/remove', 'LocationController@detachCostcode')->name('locations.detach-costcode');
		Route::get('/locations/{id}/costcode/{costcodeID}/insert', 'LocationController@attachCostcode')->name('locations.attach-costcode');

		Route::resource('contractors', 'ContractorController');
		Route::get('/contractors/{id}/location/{locId}/remove', 'ContractorController@detachLocation')->name('contractors.detach-location');
		Route::get('/contractors/{id}/location/{locId}/insert', 'ContractorController@attachLocation')->name('contractors.attach-location');

		// Route::resource('sequence', 'SequenceController');
		// Route::post('sequence-action', 'SequenceController@getAction')->name('sequence.getAction');		
		// Route::post('sequence/fabricated-store', 'SequenceController@storefabnum')->name('fabricatednum.store');
		// Route::get('/sequence/fabricated-update/{id}', 'SequenceController@updatefabnum')->name('fabricatednum.update');




		// Users
		Route::group(['prefix' => 'users'], function () {
			Route::get('/', 'UserController@index')->name('users.index');
			Route::post('store', 'UserController@store')->name('users.store');
			Route::any('search', 'UserController@search')->name('users.search');
			Route::post('/edit', 'UserController@edit')->name('users.edit');
			Route::put('update', 'UserController@update')->name('users.update');
			Route::post('/user-change-status', 'UserController@change_status')->name('user.change-status');
			Route::post('/user-reset-password', 'UserController@reset_password')->name('user.reset-password');
		});

		//Cost Code Routes		
		Route::resource('costcodes', 'CostcodeController');
		Route::post('/costcode-update', 'CostcodeController@costcode_update')->name('costcodes.update');
		Route::post('/costcode-change-status', 'CostcodeController@change_status')->name('costcode.change-status');

		//Approver Routes		
		Route::resource('approvers', 'ApproverController');
		Route::post('/approver-update', 'ApproverController@approver_update')->name('approvers.update');
		Route::post('/approver-change-status', 'ApproverController@change_status')->name('approver.change-status');

		//Receiver Routes				
		Route::resource('receivers', 'ReceiverController');
		Route::post('/receiver-update', 'ReceiverController@receiver_update')->name('receivers.update');
		Route::post('/receiver-change-status', 'ReceiverController@change_status')->name('receiver.change-status');		

		//Categories Routes		
		Route::resource('categories', 'CategoryController');				
		Route::post('/category-update', 'CategoryController@category_update')->name('categories.update');

		//Sequence Control Routes
		Route::resource('sequence', 'SequenceController');
		Route::post('/sequence-update', 'SequenceController@sequence_update')->name('sequence.update');		
		Route::get('/close-open-sequence', 'SequenceController@closeOpenSequence')->name('sequence.close-open');

		//Role Routes
		Route::resource('roles', 'RoleController');
		Route::post('/role-update', 'RoleController@role_update')->name('roles.update');

		//Permission Routes
		Route::resource('permissions', 'PermissionController');
		Route::post('/permission-update', 'PermissionController@permission_update')->name('permissions.update');


		//Role Access right routes
		Route::group(['prefix' => 'roleaccessrights'], function () {
			Route::get('/', 'RoleRightController@index')->name('roleaccessrights.index');
			Route::post('store', 'RoleRightController@store')->name('roleaccessrights.store');
			Route::get('store', 'RoleRightController@store')->name('roleaccessrights.store');
		});


		//User Access right routes
		Route::group(['prefix' => 'useraccessrights'], function () {
			Route::get('/', 'UserRightController@index')->name('useraccessrights.index');
			Route::post('store', 'UserRightController@store')->name('useraccessrights.store');
			Route::get('store', 'UserRightController@store')->name('useraccessrights.store');
		});


		// Application routes
		Route::group(['prefix' => 'application/maintenance'], function () {
			Route::get('/', 'ApplicationController@index')->name('application.index');
			Route::post('store', 'ApplicationController@store')->name('application.store');
			Route::post('edit', 'ApplicationController@edit')->name('application.edit');
			Route::put('update', 'ApplicationController@update')->name('application.update');
			Route::delete('{id}/destroy', 'ApplicationController@destroy')->name('application.destroy');
			Route::any('/search', 'ApplicationController@search')->name('application.search');
			Route::get('{id}/destroy', 'ApplicationController@destroy')->name('application.destroy');
			Route::get('systemDown', 'ApplicationController@systemDown')->name('application.systemDown');
			Route::get('systemUp', 'ApplicationController@systemUp')->name('application.systemUp');
			Route::get('create_indexing', 'ApplicationController@create_indexing')->name('application.create_indexing');
		}); 		

	});
	Route::name('rpt.')->group(function () {

		Route::get('transaction-all', 'ReportsController@all')->name('transaction-all');
		Route::get('item-issuance', 'ReportsController@itemIssuance')->name('item-issuance');
		Route::get('item-issuance-details', 'ReportsController@itemIssuanceDetails')->name('item-issuance-details');
		Route::get('location-history', 'ReportsController@locationHistory')->name('location-history');
		Route::get('contractor-history', 'ReportsController@contractorHistory')->name('contractor-history');
		Route::get('unposted-transactions', 'ReportsController@issuanceByStatus')->name('unposted-transactions');
		Route::get('issuance-by-transactionID', 'ReportsController@issuanceByTransactionID')->name('issuance-by-transactionID');
		Route::get('audit-logs', 'ReportsController@auditLogs')->name('audit-logs');
		Route::get('error-logs', 'ReportsController@errorLogs')->name('error-logs');
	});

	Route::get('ppe-transactions', 'TransactionController@irmsTransactions')->name('ppe-transactions');
	Route::get('transactions', 'TransactionController@transactions')->name('transactions');
	Route::get('/transaction-new', 'TransactionController@createTransaction')->name('transaction-new');
	Route::get('transaction/{id}/edit', 'TransactionController@editTransaction')->name('transaction.edit');
	Route::get('/ppe-transaction/{id}', 'TransactionController@createIRMSTransaction')->name('ppe-transaction.create');
	Route::get('item-no-par/{id}', 'TransactionController@updateNoPar')->name('item-no-par');
	Route::get('/transaction-batch-per-id', 'TransactionController@postTransactionByID')->name('transaction-batch-per-id');
	Route::get('/transaction-batch-per-date', 'TransactionController@postTransactionByDate')->name('transaction-batch-per-date');


	Route::post('/ppe-transaction', 'TransactionController@storeIRMSTransaction')->name('ppe-transaction.store');
	Route::post('/transaction', 'TransactionController@storeTransaction')->name('transaction.store');

	Route::patch('/transaction/{id}', 'TransactionController@updateTransaction')->name('transaction.update');
	Route::patch('/transactions/{id}', 'TransactionController@updateTransactionStatus')->name('transactions.update');
	Route::patch('/transaction-batch-per-id/{id}', 'TransactionController@updateTransactionByID')->name('transaction-batch-per-id.update');
	Route::patch('/transaction-batch-per-date/{id}', 'TransactionController@updateTransactionByDate')->name('transaction-batch-per-date.update');
});


Route::get('/manual', 'HomeController@manual')->name('manual');

Route::get('/change-password', function () {

	$id = \Auth::user()->id;

	return view('pages.profile.change-pass', compact('id'));
})->name('change-pass');

Route::patch('/change-password', 'HomeController@updatePassword')->name('updatePassword');

Route::get('/ttt', 'TransactionController@getAllTransaction11');

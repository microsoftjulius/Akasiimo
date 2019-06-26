<?php
use App\Http\Controllers\BeneficiariesController;

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

Route::get('/', function () {return view('login');});
Route::get('/login', function(){ return redirect('/');});
Route::group(['middleware' => 'auth'], function() {
    Route::post('/create-districts','DistrictsController@create');
    Route::post('/create-subcounty','SubCountiesController@create');
    Route::post('/create-quater','QuatersController@create');
    Route::post('/create-payment-shedule','PaymentScheduleController@create');
    Route::post('/create-beneficiary','BeneficiariesController@create');
    Route::get('/view-beneficiary','BeneficiariesController@show');
    Route::post('/create-new-user','BeneficiariesController@create_user');
    // Route::get('/view-beneficiary','BeneficiariesController@live_search'); for Ajax search
    Route::get('/view-beneficiary/action','BeneficiariesController@action')->name('view-beneficiary');
    Route::get('/index','BeneficiariesController@index');
    Route::get('/beneficiaries',function(){return view('After.beneficiaries');});
    Route::get('/beneficiaries-status', function(){return view('After.beneficiaries_status');});
    Route::get('/schedules', function(){return view('After.schedules');});
    Route::get('/view-beneficiary/search_by_district_or_any','BeneficiariesController@search_by_any')->name('search_by_district_or_any');
    // Route::get('/view-beneficiary/search_by_district','BeneficiariesController@search_by_district')->name('search_by_district');
    // Route::get('/view-beneficiary/search_by_subcounty','BeneficiariesController@search_by_sub_county')->name('search_by_subcounty');
    Route::get('/convert_data_to_array','BeneficiariesController@convert_data_to_array');
    Route::Post('/save-edited-data','BeneficiariesController@edit');
    Route::Post('/cancel-payment','BeneficiariesController@destroy');
    Route::Post('/confirm-payment','BeneficiariesController@update');
    Route::get('/search_all_db','BeneficiariesController@search_by_all_db');
    //delete a user
    Route::post('/delete-user','RolesController@destroy')->name('remove-user');
    // Route for view/blade file.
    Route::get('importExport', 'BeneficiariesController@importExport');
    // Route for export/download tabledata to .csv, .xls or .xlsx
    Route::get('downloadExcel/{type}', 'BeneficiariesController@downloadExcel');
    // Route for import excel data to database.
    Route::post('importExcel', 'ImportCsvController@csv_import')->name('import');
    Route::get('/user-create','RolesController@index');
    Route::post('/create-user','RolesController@create_user')->name('create-user');
    Route::get('/email','RolesController@email');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

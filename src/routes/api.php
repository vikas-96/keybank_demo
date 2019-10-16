<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth::routes();
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Api'], function ($api) {
        $api->post('auth/login', 'AuthController@login');
        $api->post('auth/password/forget', 'AuthController@forgetPassword');
        $api->post('auth/password/reset', 'AuthController@resetPassword');

        $api->group(['middleware' => 'auth:api'], function ($api) {
            $api->resource('roles', 'RoleController');
            $api->resource('users', 'UserController');
            $api->post('auth/logout', 'AuthController@logout');
            $api->resource('permissions', 'PermissionController');
            $api->resource('borrower', 'BorrowerController');
            $api->resource('caseleadofficer', 'CaseleadofficerController');
            $api->resource('caseofficer', 'CaseofficerController');
            $api->resource('advocate', 'AdvocateController');
            $api->resource('valuer', 'ValuerController');
            $api->resource('resolutionagent', 'ResolutionagentController');
            $api->resource('loan', 'LoanController');
            $api->resource('dashboard', 'DashboardController');
            $api->resource('asset', 'AssetController');
            $api->put('updatesteptwo/{id}', 'AssetController@updateStepTwo');
            $api->put('updatestepthree/{id}', 'AssetController@updateStepThree');
            $api->put('updatestepfour/{id}', 'AssetController@updateStepFour');
            $api->put('updatestepfive/{id}', 'AssetController@updateStepFive');
            $api->put('updatestepsix/{id}', 'AssetController@updateStepSix');
            $api->put('updatestepseven/{id}', 'AssetController@updateStepSeven');
            $api->put('updatefinalstep/{id}', 'AssetController@updateFinalStep');
            $api->post('updatestepeight/{id}', 'AssetController@updateStepEight');
            $api->post('updatestepeightdocument/{id}', 'AssetController@updateStepEightDocument');
            $api->post('uploaddocument', 'AssetController@uploadDocument');
            $api->post('uploaddocument', 'AssetController@uploadDocument');
            $api->post('deletedocument', 'AssetController@deleteDocument');
            $api->get('getdocument/{id}', 'AssetController@documentList');
            $api->get('commondata', 'CommonController@allCommonData');
            $api->get('banklist', 'CommonController@banklist');
            $api->get('banklist/{id}', 'CommonController@banklist');
            $api->get('recoverybranch', 'CommonController@recoverybranch');
            $api->get('state', 'CommonController@states');
            $api->get('state/{id}', 'CommonController@states');
            $api->get('city/{id}', 'CommonController@cities');
            $api->get('pincode/{id}', 'CommonController@pincode');   // all pincode based on multiple cities
            $api->get('gettemplate/{id}', 'AssetController@getTemplate');
            $api->get('getdetailview/{id}', 'AssetController@getDetailView');
            $api->get('getfilterdata', 'AssetController@getFilterData');

            $api->post('getcaseleadofficer', 'CaseleadofficerController@getCaseLeadOfficerData');
            $api->post('getcaseofficer', 'CaseofficerController@getCaseOfficerData');
            $api->post('getresolutionagent', 'ResolutionagentController@getResolutionAgent');
            $api->resource('migrating_branch', 'MigratingBranchController');
            $api->resource('micromarket', 'MicromarketController');

            //Reports API
            $api->get('categoryreports', 'ReportsController@getCategoryReports')->name('category-report');
            $api->get('marketabilityreports', 'ReportsController@getMarketabilityReports')->name('marketability-report');
            $api->get('possessionreports', 'ReportsController@getPossessionReports')->name('possession-report');
            $api->get('kapdatareports', 'ReportsController@getKapDataReports')->name('kapdata-report');
            $api->get('subtypereports', 'ReportsController@getSubtypeReports')->name('subtype-report');
            $api->get('marketvaluereports', 'ReportsController@getMarketValueReports')->name('market-report');
            $api->get('auctionreports', 'ReportsController@getAuctionDataReports')->name('auction-report');
            $api->get('reservepricereports', 'ReportsController@getReservePriceReports')->name('reserveprice-report');
            $api->get('areaspreadreports', 'ReportsController@getAreaSpreadReports')->name('area-report');
        });
    });
});

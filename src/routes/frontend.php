<?php

Route::group(['middleware' => ['auth:web', 'role:admin|data-operator|banker']], function () {
    Route::get('user/logout', 'LoginController@logout')->name('frontend.logout');
    Route::get('/asset-search', 'AssetsController@searchAssetList')->name('asset.search');
    Route::get('/asset-list/{view?}', 'AssetsController@getAssetList')->name('asset.list');
    Route::get('/asset-table-list', 'AssetsController@table_list')->name('asset.table');
    Route::get('/asset-detail/{id}', 'AssetsController@detail')->name('asset-detail');
    Route::get('/asset-add-to-compare/{id}', 'AssetsController@assetDetail')->name('add-to-compare');
    Route::get('/asset-compare', 'AssetsController@assetCompare')->name('asset-compare');
    Route::get('/asset-compare-partial', 'AssetsController@assetComparePartial')->name('asset-compare-partial');
    Route::post('/asset-list', 'AssetsController@postAssetList')->name('post-asset-list');
    Route::get('/filter-asset', 'AssetsController@filterAsset')->name('filter-asset');
    Route::get('/test', 'AssetsController@test');

    Route::get('/get-cat', 'AssetsController@getCategoryOptions')->name('get-cat');

    Route::get('searchcaseleadofficer', '\App\Http\Controllers\Admin\CaseleadofficerController@searchCaseleadofficer')->name('search-caseleadofficer');
    Route::get('searchcaseofficer', '\App\Http\Controllers\Admin\CaseofficerController@searchCaseofficer')->name('search-caseofficer');
    Route::get('searchresolutionagent', '\App\Http\Controllers\Admin\ResolutionagentController@searchResolutionagent')->name('search-resolutionagent');
    Route::get('getcaseleadofficer', 'AssetsController@getCaseLeadOfficer')->name('get-caseleadofficer');
    Route::get('getcaseofficer', 'AssetsController@getCaseOfficer')->name('get-caseofficer');
    Route::get('getresolutionagent', 'AssetsController@getResolutionAgent')->name('get-resolutionagent');

    //Reports
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::get('/reports-search', 'ReportsController@searchReports')->name('reports-search');
    Route::post('/reports-filter', 'ReportsController@getReportFilter')->name('reports-filter');
    Route::post('/city', 'ReportsController@getCity')->name('city');
    Route::post('/pincode', 'ReportsController@getPincode')->name('pincode');
    Route::get('/reports/test', 'ReportsController@test')->name('<test></test>');

});

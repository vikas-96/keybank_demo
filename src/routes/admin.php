<?php

Route::group(['middleware' => ['auth:web','role:admin|data-operator']], function () {
    // Authentication Routes...
    Route::get('logout', 'LoginController@logout')->name('admin.logout');
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //users
    Route::get('/list-users', 'UserController@getUsers')->name('list-users');
    Route::resource('users', 'UserController');
    Route::get('searchuser', 'UserController@searchUser')->name('search-user');


    //borrowers
    Route::get('/list-borrower', 'BorrowerController@getBorrower')->name('list-borrower');
    Route::resource('borrower', 'BorrowerController');
    Route::get('searchborrower', 'BorrowerController@searchBorrower')->name('search-borrower');

    //Case Lead Officer
    Route::get('/list-caseleadofficer', 'CaseleadofficerController@getCaseleadofficer')->name('list-caseleadofficer');
    Route::resource('caseleadofficer', 'CaseleadofficerController');
    Route::get('searchcaseleadofficer', 'CaseleadofficerController@searchCaseleadofficer')->name('search-caseleadofficer');

    //Case Officer
    Route::get('/list-caseofficer', 'CaseofficerController@getCaseofficer')->name('list-caseofficer');
    Route::resource('caseofficer', 'CaseofficerController');
    Route::get('searchcaseofficer', 'CaseofficerController@searchCaseofficer')->name('search-caseofficer');

    //Advocate
    Route::get('/list-advocate', 'AdvocateController@getAdvocate')->name('list-advocate');
    Route::resource('advocate', 'AdvocateController');
    Route::get('searchadvocate', 'AdvocateController@searchAdvocate')->name('search-advocate');

    //Valuer
    Route::get('/list-valuer', 'ValuerController@getValuer')->name('list-valuer');
    Route::resource('valuer', 'ValuerController');
    Route::get('searchvaluer', 'ValuerController@searchValuer')->name('search-valuer');

    //Loan
    Route::get('/list-resolutionagent', 'ResolutionagentController@getResolutionagent')->name('list-resolutionagent');
    Route::resource('resolutionagent', 'ResolutionagentController');
    Route::get('searchresolutionagent', 'ResolutionagentController@searchResolutionagent')->name('search-resolutionagent');

    //Loan
    Route::get('/list-loan', 'LoanController@getLoan')->name('list-loan');
    Route::resource('loan', 'LoanController');
    Route::get('searchloan', 'LoanController@searchLoan')->name('search-loan');

    //Assets
    Route::get('/list-assets', 'AssetsController@getAsset')->name('list-assets');
    Route::get('/assets/step1/{asset_id?}', 'AssetsController@getStep1')->name('step1');
    Route::post('/assets/step1/{asset_id?}', 'AssetsController@postStep1')->name('step1-post');

    Route::get('/assets/test', 'AssetsController@test')->name('test');

    Route::get('/assets/step2/{asset_id}', 'AssetsController@getStep2')->name('step2');
    Route::post('/assets/step2/{asset_id}', 'AssetsController@postStep2')->name('step2-post');
    Route::get('/assets/step3/{asset_id}', 'AssetsController@getStep3')->name('step3');
    Route::post('/assets/step3/{asset_id}', 'AssetsController@postStep3')->name('step3-post');
    Route::get('/assets/step4/{asset_id}', 'AssetsController@getStep4')->name('step4');
    Route::post('/assets/step4/{asset_id}', 'AssetsController@postStep4')->name('step4-post');
    Route::get('/assets/step5/{asset_id}', 'AssetsController@getStep5')->name('step5');
    Route::post('/assets/step5/{asset_id}', 'AssetsController@postStep5')->name('step5-post');
    Route::get('/assets/step6/{asset_id}', 'AssetsController@getStep6')->name('step6');
    Route::post('/assets/step6/{asset_id}', 'AssetsController@postStep6')->name('step6-post');
    Route::get('/assets/step7/{asset_id}', 'AssetsController@getStep7')->name('step7');
    Route::post('/assets/step7/{asset_id}', 'AssetsController@postStep7')->name('step7-post');
    Route::get('/assets/step8/{asset_id}', 'AssetsController@getStep8')->name('step8');
    Route::post('/assets/step8/{asset_id}', 'AssetsController@postStep8')->name('step8-post');
    Route::post('/assets/step8/{asset_id}/edit', 'AssetsController@updateStep8')->name('step8-update');
    Route::post('/assets/step8-upload', 'AssetsController@uploadDocumentStep8')->name('step8-upload');
    Route::post('/assets/step8-delete-document', 'AssetsController@deleteDocumentStep8')->name('step8-delete');
    Route::resource('assets', 'AssetsController');
    Route::get('/get-categories', 'AssetsController@getCategoryOptions')->name('get-categories');
    Route::post('/asset-category', 'AssetsController@postCategoryForm')->name('post-asset-category');

    //city
    Route::get('getcity/{id}', 'AssetsController@getCity')->name('get-city');

    //migrating branch
    Route::resource('migrating_branch','MigratingBranchController');
});

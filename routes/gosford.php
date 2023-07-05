<?php
use App\Http\Controllers\gosford\gosfordController;
use App\Http\Middleware\GsystemMildware;
Route::prefix('g_system')->group(function (){
    Route::controller(gosfordController::class)->group(function () {
        Route::get('/gosford/login', 'login')->name('gosford.login');
        Route::post('/gosford/actlogin', 'actlogin')->name('gosford.actlogin');
        Route::get('/gosford/register', 'register')->name('gosford.register');

        Route::post('/gosford/f/actlogin', 'actloginfront')->name('gosford.front.actlogin');
        Route::get('/gosford/f/register', 'registerfront')->name('gosford.front.register');
        Route::post('/gosford/addacount', 'addacount')->name('gosford.addacount');
        Route::get('/gosford/comfirregister/{id}', 'comfirregister')->name('gosford.confirregister');


        // Route::get('/gosford/afterregister', 'afterregister')->name('gosford.afterregister');



    });
});
Route::middleware(['GsystemMildware'])->group(function () {
    Route::prefix('g_system_order')->group(function (){
        Route::controller(gosfordController::class)->group(function () {
            Route::get('/gosford/system_search', 'search')->name('gosford.search');
            Route::get('/gosford/profil', 'profil')->name('gosford.profil');
            Route::any('/gosford/choice_design', 'choiceDesign')->name('gosford.choice_design');
            Route::get('/gosford/option_sumary/{slug}', 'optionsummary')->name('gosford.optionsummary');
            Route::post('/gosford/order_comfirmed', 'ordercomfirmed')->name('gosford.order_comfirmed');
            Route::get('/gosford/listorder', 'listorder')->name('gosford.listorder');
            Route::get('/gosford/logout', 'logout')->name('gosford.logout');

            Route::any('/gosford/f/choice_design', 'choiceDesignFront')->name('gosford.front.choice_design');
            Route::get('/gosford/f/option_sumary/{slug}', 'optionsummaryfront')->name('gosford.front.optionsummary');
            Route::post('/gosford/f/order_comfirmed', 'ordercomfirmedfront')->name('gosford.front.order_comfirmed');


        });
    });
});

?>

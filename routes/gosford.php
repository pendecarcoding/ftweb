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
        Route::post('/gosford/addacountfront', 'addacountfront')->name('gosford.addacount.front');
        Route::post('/gosford/uploadimage', 'uploadimage')->name('gosford.upload.image');
        Route::get('/gosford/comfirregister/{id}', 'comfirregister')->name('gosford.confirregister');

        Route::any('/gosford/f/choice_design', 'choiceDesignFront')->name('gosford.front.choice_design');
        Route::any('/gosford/f/getmodelbymake/{make}', 'getmodelfrommake')->name('gosford.front.getmodelfrommake');
        Route::any('/gosford/f/getyearbymodel/{model}', 'getyearfrommodel')->name('gosford.front.getyearfrommodel');
        Route::get('/gosford/f/option_sumary/{slug}', 'optionsummaryfront')->name('gosford.front.optionsummary');


        // Route::get('/gosford/afterregister', 'afterregister')->name('gosford.afterregister');
        Route::post('/gosford/f/order_comfirmed', 'ordercomfirmedfront')->name('gosford.front.order_comfirmed');





    });
});
Route::middleware(['GsystemMildware'])->group(function () {
    Route::prefix('g_system_order')->group(function (){
        Route::controller(gosfordController::class)->group(function () {
            Route::get('/gosford/system_search', 'search')->name('gosford.search');
            Route::get('/gosford/profil', 'profil')->name('gosford.profil');
            Route::get('/gosford/f/profil', 'profilfrontend')->name('gosford.frontend.profil');
            Route::post('/gosford/f/profilupdate', 'profilupdate')->name('gosford.profil.update');
            Route::post('/gosford/f/updatepass', 'updatepass')->name('gosford.profil.updatepass');
            Route::any('/gosford/choice_design', 'choiceDesign')->name('gosford.choice_design');
            Route::get('/gosford/option_sumary/{slug}', 'optionsummary')->name('gosford.optionsummary');
            Route::post('/gosford/order_comfirmed', 'ordercomfirmed')->name('gosford.order_comfirmed');
            Route::get('/gosford/listorder', 'listorder')->name('gosford.listorder');
            Route::get('/gosford/logout', 'logout')->name('gosford.logout');
            Route::get('/gosford/logouts', 'logouts')->name('gosford.logouts');





        });
    });


    Route::prefix('mypage')->group(function (){
        Route::controller(gosfordController::class)->group(function () {
            //Two Town Color
            Route::get('/gosford/f/twotowncolor/', 'twotowncolor')->name('gosford.twotowncolor');
            Route::get('/gosford/f/twotowncolor/detail', 'twotowncolordetail')->name('gosford.twotowncolor.detail');
            //paterndesign
            Route::get('/gosford/f/patterndesign/', 'patterndesign')->name('gosford.patterndesign');
            Route::get('/gosford/f/patterndesign/detail', 'detailpattern')->name('gosford.patterndesign.detail');
            //embordery
            Route::get('/gosford/f/embrodery/', 'embrodery')->name('gosford.embrodery');
            Route::get('/gosford/f/embrodery/detail', 'embroderydetail')->name('gosford.embrodery.detail');
            //Piping
            Route::get('/gosford/f/piping/', 'piping')->name('gosford.piping');
            Route::get('/gosford/f/piping/detail', 'pipingdetail')->name('gosford.piping.detail');
            //emblem
            Route::get('/gosford/f/emblem/', 'emblem')->name('gosford.emblem');
            Route::get('/gosford/f/emblem/detail', 'emblemdetail')->name('gosford.emblem.detail');
            Route::any('/gosford/f/finish', 'finishdesign')->name('gosford.finish.design');
        });
    });
});

?>

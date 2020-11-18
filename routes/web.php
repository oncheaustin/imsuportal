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

Route::group(['prefix' => 'admin'], function () {

          Route::get('/test', ['as' => 'test', 'uses' => 'AuthAdmin\LoginCon@test']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthAdmin\LoginCon@dologin']);
    Route::get('/', function () {
        return view('admin.login');
    });

    // Route::post('/login', 'AuthAdmin\LoginCon@login')->name('admin.login');
        Route::get('/login', 'AuthAdmin\LoginCon@index')->name('admin.login');

        Route::get('/regars', function () {
            return view('admin.arsform');
        });

        Route::group(['middleware' => 'auth:admin'], function () {
            Route::match(array( 'GET'), "study/{name}/{id}/{remember?}", array(
                'uses' => 'Auth\utilcontroller@study',
                'as' => 'study'
            ));
             
            Route::get('email/{id?}', ['as' => 'email', 'uses' => 'AuthAdmin\LoginCon@email']);
            Route::get('print/{id}', ['as' => 'print', 'uses' => 'Auth\printcontroller@printout']);
          Route::post('/pingen', 'AuthAdmin\LoginCon@pingen')->name('admin.pingen');
        Route::get('/pingen', ['as' => 'pingen', 'uses' => 'AuthAdmin\LoginCon@pingen']);
        Route::post('/report', ['as' => 'report', 'uses' => 'AuthAdmin\LoginCon@report']);
        Route::get('/report', ['as' => 'report', 'uses' => 'AuthAdmin\LoginCon@report']);
        Route::post('/offreport', ['as' => 'offreport', 'uses' => 'AuthAdmin\LoginCon@offreport']);
        Route::get('/offreport', ['as' => 'offreport', 'uses' => 'AuthAdmin\LoginCon@offreport']);
        Route::match(array('GET'), "utmeregister", array('uses' => 'AuthAdmin\LoginCon@utmeregister','as' => 'utmeregister'));
        Route::post('utmeregister','AuthAdmin\LoginCon@utmeregister') ->name('admin.utmeregister');
        Route::match(array('GET','POST'), "addpay", array('uses' => 'AuthAdmin\LoginCon@addpay','as' => 'addpay'));
        Route::match(array('GET','POST'), "setting", array('uses' => 'AuthAdmin\LoginCon@setting','as' => 'setting'));
        Route::match(array('GET','POST'), "fee", array('uses' => 'AuthAdmin\LoginCon@fee','as' => 'fee'));
        Route::match(array('GET','POST'), "ars", array('uses' => 'AuthAdmin\LoginCon@ars','as' => 'ars'));
        Route::match(array('GET','POST'), "addsch", array('uses' => 'AuthAdmin\LoginCon@addsch','as' => 'addsch'));
        Route::match(array('GET','POST'), "adddep", array('uses' => 'AuthAdmin\LoginCon@adddep','as' => 'adddep'));
        Route::match(array('GET','POST'), "setup", array('uses' => 'AuthAdmin\LoginCon@setup','as' => 'setup'));
        Route::match(array('GET','POST'), "addcourse", array('uses' => 'AuthAdmin\LoginCon@addcourse','as' => 'addcourse'));
        Route::match(array('GET','POST'), "pingen", array('uses' => 'AuthAdmin\LoginCon@pingen','as' => 'pingen'));
        Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AuthAdmin\LoginCon@dashboard']);
        Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthAdmin\LoginCon@logout']);
        });
        });





Route::group(['middleware' => ['web']], function () {
    // Authorized routs

        Route::get('/', function () {
            return view('home');
        });

            // Login Routes...


        Route::match(array('GET', 'POST'), "student", array(
            'uses' => 'Auth\Lcontroller@login',
            'as' => 'login'
        ));

        Route::match(array('GET', 'POST'), "register", array(
            'uses' => 'Auth\Rcontroller@register',
            'as' => 'register'
        ));

 Route::group(['middleware' => 'auth:web'], function () {

    Route::post('registration', ['as' => 'registration', 'uses' => 'Auth\appcontroller@registration']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\Lcontroller@logout']);
  
    Route::get('print', ['as' => 'print', 'uses' => 'Auth\printcontroller@print']);
    Route::get('admission', ['as' => 'admission', 'uses' => 'Auth\printcontroller@admission']);
    Route::get('offstream', ['as' => 'offstream', 'uses' => 'Auth\appcontroller@offstream']);
    Route::post('offstream', ['as' => 'offstream', 'uses' => 'Auth\appcontroller@offstream']);

    Route::post('regoff', ['as' => 'regoff', 'uses' => 'Auth\appcontroller@regoff']);
    Route::post('process', ['as' => 'process', 'uses' => 'Auth\appcontroller@process']);
    Route::get('reg/{id}', ['as' => 'registration', 'uses' => 'Auth\printcontroller@reg']);
    Route::match(array('GET', 'POST'), "reg", array(
        'uses' => 'Auth\appcontroller@reg',
        'as' => 'reg'
    ));
    Route::match(array('GET', 'POST'), "application", array(
        'uses' => 'Auth\appcontroller@app',
        'as' => 'application'
    ));
    Route::match(array( 'GET'), "lga/{id}", array(
        'uses' => 'Auth\utilcontroller@lga',
        'as' => 'lga'
    ));

    Route::match(array( 'GET','POST'), "upload", array(
        'uses' => 'Auth\utilcontroller@uploads',
        'as' => 'upload'
    ));


    Route::match(array( 'GET'), "study/{name}/{id}", array(
        'uses' => 'Auth\utilcontroller@study',
        'as' => 'study'
    ));

    Route::get('before', function () {
        return "redirected well";
    });
    Route::get('profile', function () {
        return view('profile');
    });
});
});

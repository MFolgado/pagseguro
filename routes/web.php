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
});


Route::get('/checkout/{id}', function ($id) {
    return view('store.checkout', compact('id'));
});


Route::post('/checkout/{id}', function ($id) {
    $data = request()->all();
    unset($data['_toekn']);

    $data['email'] =         'marcelo@blitsoft.com.br';
    $data['token'] =         'D16BF2B0E4CB4C48AAF009ED8E2C0FA0';
    $data['paymentMode'] =   'default';
    $data['paymentMethod'] = 'creditCard';
    $data['receiverEmail'] = 'marcelo@blitsoft.com.br';
    $data['currency'] =      'BRL';



    $data['senderAreaCode'] = substr($data['senderPhone'],0, 2);
    $data['senderPhone'] = substr($data['senderPhone'],2, strlen($data['senderPhone']));


    return $data;
});


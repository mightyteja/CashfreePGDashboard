<?php

Route::group(['prefix' => 'cashfree', 'namespace' => 'Tesmachino\Cashfree\Http\Controllers'], function () {
    //CashFree Dashboard
    Route::get('cashfree-dashboard', 'CashFreeController@index');

    //Cashfree 
    //Settlement
    Route::get('settlement', 'CashFreeController@settlement')->name('settlement');
    Route::post('settlement-request', 'CashFreeController@settlementRequest')->name('settlement-request');
    Route::get('settlement-single', 'CashFreeController@settlementSingle')->name('settlement-single');
    Route::post('settlement-single', 'CashFreeController@settlementSingleFetch')->name('settlement-single-fetch');

    Route::get('transaction-status', 'CashFreeController@transactions')->name('getpaymentstatus');
    Route::post('transaction-status', 'CashFreeController@transactionRequest')->name('transaction-request');
    Route::get('paymentorderstatus', 'CashFreeController@paymentOrderstatus')->name('paymentorderstatus');
    Route::post('paymentorderstatus', 'CashFreeController@paymentOrderstatuswithid')->name('paymentOrderstatuswithid');
    Route::get('paymentorderdetails', 'CashFreeController@paymentOrderDetails')->name('paymentorderdetails');
    Route::post('paymentorderdetails', 'CashFreeController@paymentOrderDetailswithid')->name('paymentOrderdetailswithid');
    Route::get('refund', 'CashFreeController@refund')->name('refund');
    Route::post('refund', 'CashFreeController@refundFetch')->name('refundfetch');
    Route::get('refund-single', 'CashFreeController@refundSingle')->name('refund-single');
    Route::post('refund-single-fetch', 'CashFreeController@refundSingleDetails')->name('refund-single-fetch');
});

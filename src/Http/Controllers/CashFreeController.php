<?php

namespace tesmachino\cashfree\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CashFreeController extends Controller
{
    public function index()
    {

        return view('cashfree::dashboard');
    }

    public function settlement()
    {
        return view('cashfree::cashfree.settlement.settlements');
    }

    public function settlementRequest(Request $request)
    {
        $datepicker_from = Carbon::createFromFormat('d-m-Y', $request->datepicker_from)->format('Y-m-d');
        $datepicker_to = Carbon::createFromFormat('d-m-Y', $request->datepicker_to)->format('Y-m-d');
        $cashfree_app_id = config('CASHFREE_MARKETSETTLEMENT_CLIENTID');
        $cashfree_secret = config('CASHFREE_MARKETSETTLEMENT_CLIENTSECRET');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('CASHFREE_SETTLEMENTS_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=$cashfree_app_id&secretKey=$cashfree_secret&startDate=$datepicker_from&endDate=$datepicker_to&lastId=&count=",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            dd($response);
            echo $response;
        }
    }


    public function paymentOrderstatus()
    {
        return view('cashfree::cashfree.orders.order-status');
    }

    public function paymentOrderstatuswithid(Request $request)
    {
        $order_id = $request['order_id'];
        $cashfree_app_id = config('cashfree.CASHFREE_APP_ID');
        $cashfree_secret = config('cashfree.CASHFREE_SECRET');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('cashfree.CASHFREE_ORDERSTATUS_API_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=$cashfree_app_id&secretKey=$cashfree_secret&orderId=$order_id",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $paymentorderstatus = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return view('cashfree::cashfree.orders.order-status-result')->with('paymentorderstatus', json_decode($paymentorderstatus, true));
        }
    }


    public function paymentOrderDetails()
    {
        return view('cashfree::cashfree.orders.order-details');
    }

    public function paymentOrderDetailswithid(Request $request)
    {
        $order_id = $request['order_id'];
        $cashfree_app_id = config('cashfree.CASHFREE_APP_ID');
        $cashfree_secret = config('cashfree.CASHFREE_SECRET');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('cashfree.CASHFREE_ORDERINFO_API_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=$cashfree_app_id&secretKey=$cashfree_secret&orderId=$order_id",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $paymentorderstatus = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return view('cashfree::cashfree.orders.order-details-result')->with('paymentorderstatus', json_decode($paymentorderstatus, true));
        }
    }

    public function refund()
    {

        return view('cashfree::cashfree.refund.refund');
    }


    public function refundFetch(Request $request)
    {
        $datepicker_from = Carbon::createFromFormat('d-m-Y', $request->datepicker_from)->format('Y-m-d');
        $datepicker_to = Carbon::createFromFormat('d-m-Y', $request->datepicker_to)->format('Y-m-d');
        $cashfree_app_id = config('cashfree.CASHFREE_APP_ID');
        $cashfree_secret = config('cashfree.CASHFREE_SECRET');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('cashfree.CAHFREE_FETCH_ALL_REFUND_API'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=${cashfree_app_id}&secretKey=$cashfree_secret&startDate=$datepicker_from&endDate=$datepicker_to&txStatus=SUCCESS&lastId=&count=50",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return view('cashfree::cashfree.refund.refund-fetch')->with('response', json_decode($response, true));
        }
    }

    public function refundSingle()
    {

        return view('cashfree::cashfree.refund.refund-single');
    }

    public function refundSingleDetails(Request $request)
    {
        $refund_id = $request['refund_id'];
        $cashfree_app_id = config('cashfree.CASHFREE_APP_ID');
        $cashfree_secret = config('cashfree.CASHFREE_SECRET');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('cashfree.CASHFREE_FETCH_SINGLE_REFUND_API'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=$cashfree_app_id&secretKey=$cashfree_secret&refundId=$refund_id",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            return view('cashfree::cashfree.refund.refund-single-fetch')->with('response', json_decode($response, true));
        }
    }


    public function sendEmail()
    {

        return view('cashfree::cashfree.send-email');
    }

    public function settlements()
    {

        return view('cashfree::cashfree.settlements');
    }

    public function transactions()
    {

        return view('cashfree::cashfree.transaction.transactions');
    }

    public function transactionRequest(Request $request)
    {
        $datepicker_from = Carbon::createFromFormat('d-m-Y', $request->datepicker_from)->format('Y-m-d');
        $datepicker_to = Carbon::createFromFormat('d-m-Y', $request->datepicker_to)->format('Y-m-d');
        $cashfree_app_id = config('cashfree.CASHFREE_APP_ID');
        $cashfree_secret = config('cashfree.CASHFREE_SECRET');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => config('cashfree.CASHFREE_TRANSACTION_STATUS_API'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=${cashfree_app_id}&secretKey=$cashfree_secret&startDate=$datepicker_from&endDate=$datepicker_to&txStatus=SUCCESS&lastId=&count=50",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return view('cashfree::cashfree.transaction.transactions-result')->with('response', json_decode($response, true));
        }
    }
}

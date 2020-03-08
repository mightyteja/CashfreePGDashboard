@extends('cashfree::layout')

@section('content')
<style>
    .container {
        margin-bottom: 60px;
        border: 1px solid rgba(0, 0, 0, .4);
        padding: 40px;
        border-radius: 6px;
    }


</style>
<div class="container">
    <h1>
        Payment Dashboard
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Order Status
                </th>
                <th>
                    <a href="{{route('paymentorderstatus')}} "><button class="btn btn-success">View</button>
                    </a>

                </th>
            </tr>
            <tr>
                <th>
                    Order Details
                </th>
                <th>
                    <a href="{{route('paymentorderdetails')}} ">
                        <button class="btn btn-success">View</button>
                    </a>
                </th>
            </tr>
            <tr>
                <th>
                    Send Email
                </th>
                <th>
                    <button class="btn btn-success">View</button>
                </th>
            </tr>
            <tr>
                <th>
                    Refund List
                </th>
                <th>
                    <a href="{{route('refund')}} "></a>
                    <button class="btn btn-success">View</button>
                </th>
            </tr>
            <tr>
                <th>
                    Refund Status
                </th>
                <th>
                    <a href="{{route('refund-single')}} "></a>
                    <button class="btn btn-success">View</button>
                </th>
            </tr>
            <tr>
                <th>
                    Transactions
                </th>
                <th>
                    <a href="{{route('getpaymentstatus')}} "></a>
                    <button class="btn btn-success">View</button>
                </th>
            </tr>
            <tr>
                <th>
                    Settlements
                </th>
                <th>
                    <button class="btn btn-success">View</button>
                </th>
            </tr>

        </thead>

    </table>
</div>
@endsection
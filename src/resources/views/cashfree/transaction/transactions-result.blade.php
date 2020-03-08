@extends('cashfree::layout')
@section('content')
<style>

</style>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Transaction Result</h1>
    </div>
    <div class="container">
        <form action="{{route('transaction-request')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <fieldset>
                            <div class="form-group" id="box1">
                                <label for="datepicker1">From</label>
                                <input type="text" name="datepicker_from" required class="form-control" id="datepicker1"
                                    value="">
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group" id="box2">
                                <label for="datepicker2">To</label>
                                <input type="text" name="datepicker_to" required class="form-control" id="datepicker2"
                                    value="">
                            </div>
                        </fieldset>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container my-5 py-5">

        <table class="table table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>
                        Order Id
                    </th>
                    <th>
                        OrderAmount
                    </th>
                    <th>
                        Amount Paid
                    </th>
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Customer Phone
                    </th>
                    <th>
                        Customer Email
                    </th>

                    <th>
                        Payment Mode
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Transaction Time
                    </th>

                </tr>
            </thead>
            <tbody>
                @if ($response['transactions'] == null)
                <tr>
                    <td>
                        {{$response['message']}}
                    </td>
                </tr>
                @else
                @foreach ($response['transactions'] as $item)
                <tr>
                    <td> <a href="{{route('paymentOrderstatuswithid',$item['orderId'])}} ">{{$item['orderId']}}</a>
                    </td>
                    <td> {{$item['orderAmount']}} </td>
                    <td> {{$item['txAmount']}} </td>
                    <td> {{$item['customerName']}} </td>
                    <td> {{$item['customerPhone']}} </td>
                    <td> {{$item['customerEmail']}} </td>
                    <td> {{$item['paymentMode']}} </td>
                    <td> {{$item['txStatus']}} </td>
                    <td> {{$item['txTime']}} </td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
    </div>

</div>

</div>
@section('scripts')
<script>
    var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

var optSimple = {
  format: 'mm-dd-yyyy',
  todayHighlight: true,
  orientation: 'bottom right',
  autoclose: true,
  container: '#sandbox'
};

var optComponent = {
  format: 'mm-dd-yyyy',
  container: '#datePicker',
  orientation: 'auto top',
  todayHighlight: true,
  autoclose: true
};

// SIMPLE
$( '#simple' ).datepicker( optComponent );

// COMPONENT
$( '#datePicker' ).datepicker( optComponent );

// ===================================

$( '#datepicker1' ).datepicker({
  format: "mm-dd-yyyy",
  todayHighlight: true,
  autoclose: true,
  container: '#box1',
  orientation: 'top right'
});

$( '#datepicker2' ).datepicker({
  format: 'mm-dd-yyyy',
  todayHighlight: true,
  autoclose: true,
  container: '#box2',
  orientation: 'top right'
});

$( '#datepicker1, #datepicker2, #simple, #datePicker' ).datepicker( 'setDate', today );
</script>
@endsection
@endsection
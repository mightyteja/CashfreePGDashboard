@extends('cashfree::layout')
@section('content')
<style>

</style>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Refund Result</h1>
    </div>
    <div class="container">
        <form action="{{route('refund-single-fetch')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <fieldset>
                            <div class="form-group" id="box1">
                                <label for="refund_id">Refund Id</label>
                                <input type="text" name="refund_id" required class="form-control form-control-lg"
                                    required id="refund_id" value="">
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
                        Refund Id
                    </th>
                    <th>
                        Order Id
                    </th>
                    <th>
                        Reference Id
                    </th>
                    <th>
                        Order Amount
                    </th>
                    <th>
                        Refund Amount
                    </th>
                    <th>
                        Notes
                    </th>
                    <th>
                        Refund Status
                    </th>
                    <th>
                        Initiated On
                    </th>

                    <th>
                        Proccessed On
                    </th>

                </tr>
            </thead>
            <tbody>
                @if ($response['status'] == 'ERROR')
                <tr>
                    <td>
                        {{$response['message']}}
                    </td>
                </tr>
                @else
                <tr>
                    <td> {{$response['refund'][0]['refundId']}} </td>
                    <td> {{$response['refund'][0]['orderId']}} </td>
                    <td> {{$response['refund'][0]['referenceId']}} </td>
                    <td> {{$response['refund'][0]['txAmount']}} </td>
                    <td> {{$response['refund'][0]['refundAmount']}} </td>
                    <td> {{$response['refund'][0]['note']}} </td>
                    <td> {{$response['refund'][0]['processed']}} </td>
                    <td> {{$response['refund'][0]['initiatedOn']}} </td>
                    <td> {{$response['refund'][0]['processedOn']}} </td>
                </tr>
               
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
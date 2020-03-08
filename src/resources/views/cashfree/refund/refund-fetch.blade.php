@extends('cashfree::layout')
@section('content')
<style>

</style>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Refund Result</h1>
    </div>
    <div class="container">
        <form action="{{route('refundfetch')}}" method="post">
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
                @if ($response['refunds'] == null)
                <tr>
                    <td>
                        {{$response['message']}}
                    </td>
                </tr>
                @else
                @foreach ($response['refunds'] as $item)
                <tr>
                    <td>
                        {{$item['refundId']}}
                    </td>
                    <td> {{$item['orderId']}} </td>
                    <td> {{$item['referenceId']}} </td>
                    <td> {{$item['txAmount']}} </td>
                    <td> {{$item['refundAmount']}} </td>
                    <td> {{$item['note']}} </td>
                    <td> {{$item['processed']}} </td>
                    <td> {{$item['initiatedOn']}} </td>
                    <td> {{$item['processedOn']}} </td>
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
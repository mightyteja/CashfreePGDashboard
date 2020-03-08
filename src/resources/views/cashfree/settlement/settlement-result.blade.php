@extends('cashfree::layout')
@section('content')
<style>
    .container {
        margin-bottom: 60px;
        border: 1px solid rgba(0, 0, 0, .4);
        padding: 40px;
        border-radius: 6px;
    }

    .datepicker td,
    .datepicker th {
        width: 2.5em;
        height: 2.5em;
    }
</style>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Settlements</h1>
    </div>
    <div class="container">
        <form action="{{route('settlement-request')}}" method="post">
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
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <td>
                        Total Amount
                    </td>
                    <td>
                        Settlement Amount
                    </td>
                    <td>
                        Adjustment
                    </td>
                    <td>
                        Amount Settled
                    </td>
                    <td>
                        Transaction From
                    </td>
                    <td>
                        Transaction To
                    </td>
                    <td>
                        UTR
                    </td>
                    <td>
                        Settled On
                    </td>
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
                @foreach ($response['settlements'] as $item)
                <tr>
                    <td>
                        {{$item->id}}
                    </td>
                    <td>
                        {{$item->totalTxAmount}}
                    </td>
                    <td>
                        {{$item->settlementAmount}}
                    </td>
                    <td>
                        {{$item->adjustment}}
                    </td>
                    <td>
                        {{$item->amountSettled}}
                    </td>
                    <td>
                        {{$item->transactionFrom}}
                    </td>
                    <td>
                        {{$item->transactionTill}}
                    </td>
                    <td>
                        {{$item->utr}}
                    </td>
                    <td>
                        {{$item->settledOn}}
                    </td>
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
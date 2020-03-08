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
                                <label for="refund_id">Settlement Id</label>
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
                        Id
                    </th>
                    <th>
                        Order Id
                    </th>
                    <th>
                        Reference Id
                    </th>
                    <th>
                        Transaction Amount
                    </th>
                    <th>
                       Payment Mode
                    </th>
                    <th>
                        Bank Name
                    </th>
                    <th>
                        Service Charge
                    </th>
                    <th>
                        Service Tax
                    </th>

                    <th>
                        Settlement Amount
                    </th>
                    <th>
                        Transaction time
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($response['status'] == 'ERROR')
                <tr>
                    <td>
                        {{$response['reason']}}
                    </td>
                </tr>
                @else
                <tr>
                   
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
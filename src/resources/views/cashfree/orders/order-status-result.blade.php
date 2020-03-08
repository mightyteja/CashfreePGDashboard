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
        <h1 class="text-center">Order Status Result</h1>
    </div>
    <div class="container">
        <form action="{{route('paymentOrderstatuswithid')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <fieldset>
                            <div class="form-group" id="box1">
                                <label for="order_status">Order Id</label>
                                <input type="text" name="order_id" required class="form-control form-control-lg"
                                    required id="order_status" value="">
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
                    <th> Payment Status</th>
                    <th> Order Amount</th>
                    <th> Order Status</th>
                    <th> Transaction time</th>
                    <th> Transaction Message</th>
                    <th> Payment Mode</th>
                    <th> More Details</th>

                </tr>
            </thead>

            <tbody>
                @if ($paymentorderstatus['status'] == 'ERROR')
                <tr>
                    <td>
                        {{$paymentorderstatus['reason']}}
                    </td>
                </tr>
                @else
                <tr>
                    <td>
                        {{$paymentorderstatus['orderStatus']}}
                    </td>
                    <td>
                        {{$paymentorderstatus['orderAmount']}}
                    </td>
                    <td>
                        {{$paymentorderstatus['txStatus']}}
                    </td>
                    <td>
                        {{$paymentorderstatus['txTime']}}
                    </td>
                    <td>
                        {{$paymentorderstatus['txMsg']}}
                    </td>
                    <td>
                        {{$paymentorderstatus['paymentMode']}}
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            More </button>
                    </td>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">Payment Mode</div>
                                        <div class="col-6"> {{$paymentorderstatus['paymentDetails']['paymentMode']}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Card Number</div>
                                        <div class="col-6">
                                            {{$paymentorderstatus['paymentDetails']['cardNumber']}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Country</div>
                                        <div class="col-6">
                                            {{$paymentorderstatus['paymentDetails']['cardCountry']}}

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Scheme</div>
                                        <div class="col-6">{{$paymentorderstatus['paymentDetails']['cardScheme']}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                    @endif

                </tr>
            </tbody>
        </table>

    </div>

</div>

@section('scripts')

@endsection
@endsection
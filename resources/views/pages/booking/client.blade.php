@extends('layout.booking')

@section('content')
<div class="container">
    <header class="header-page" id="header-section"></header>
    <!-- PROMOTION SECTION -->
    <div class="row">
        <div class="col-12">
            <h2 class="title title--h4 js-lines" id="h1-title">
                Your detail
            </h2>
        </div>
    </div>
    <!-- END OF PROMOTION SECTION -->

    <!-- TICKET INFO SECTION -->
    <div class="row">
        <div class="col-12">
            <div class="description js-scroll-show">
            <form   method="post" action="{{route('booking-confirm') }}" class="form-horizontal"> {{ csrf_field() }}
                <div class="row">
                    <div class="col-7">
                        <div class="form-group ">
                            <input type="text" class="input form-control" required="required" placeholder="Name" name='name1' value="">
                        </div>
                        <div class="form-group ">
                            <input type="text" class="input form-control" required="required" placeholder="Email" name ='email' value="">
                        </div>
                        <div class="form-group ">
                            <input type="text" class="input form-control" required="required" placeholder="Phone" name='phone' value="">
                        </div>
                        <div class="form-group ">
                            <input type="text" class="input form-control" required="required" placeholder="Country" name='country' value="">
                        </div>
                        <div class="form-group ">
                            <select placeholder="Payment Method" name='payment'>
                                <option disable></option>
                                <option value="">PayPal</option>
                            </select>
                        </div>
                    </div>
            </form>
                    <div class="col-5">
                        <table class="table-dark" id="ticket-table">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Rasa Melaka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="col1">Date</td>
                                    <td id="col2">:</td>
                                    <td id="col3">
                                        <span id="detail-txt">{{$data['showday']}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">{{$data['showtime']}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Malaysian</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">{{$data['ma']}} x RM68.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Non-Malaysian</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">{{$data['nm']}} x RM68.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Concession</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">{{$data['con']}} x RM48.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Selected seat(s)</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">A1, A2, A3, A4</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table-dark" id="ticket-table" style="margin-top: 1rem;">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Payment information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="col1">Sub-total</td>
                                    <td id="col2">:</td>
                                    <td id="col3">
                                        <span id="detail-txt">RM{{$totalval}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">RM0.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td>
                                        <span id="detail-txt">RM{{$totalval}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="datenm" value="{{$data['nm']}}">
                        <input type="hidden" name="datema" value="{{$data['ma']}}">
                        <input type="hidden" name="datecon" value="{{$data['con']}}">
                        <input type="hidden" name="dateday" value="{{$data['showday']}}">
                        <input type="hidden" name="datetime" value="{{$data['showtime']}}">
                        <input type="hidden" name="datetotal" value="{{$totalval}}">
                        <div id="cta-div" class="text-center">
                            <a href="{{ route('booking-ticket') }}" class="btn" id="cta-btn"><i class="fa fa-angle-left"></i> Previous</a>
                            <!-- <a href="{{ route('booking-confirm') }}" class="btn" id="cta-btn">Confirm <i class="fa fa-angle-right"></i></a> -->
                            <button type="submit" class="btn">Next <i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF TICKET INFO SECTION -->
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
    });
</script>
@endpush

@extends('layout.booking')

@section('content')
<div class="container">
    <header class="header-page" id="header-section"></header>
    <!-- PROMOTION SECTION -->
    <div class="row">
        <div class="col-12">
            <h2 class="title title--h4 js-lines" id="h1-title">
                Select Show
            </h2>
            <form   method="post" action="{{route('booking-show') }}" class="form-horizontal">
					{{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-6">
                    <input type="text" id = 'select_book_date' name="select_book_date"  class="input form-control datepicker" required="required" placeholder="show date" value="<?php echo $showday ?>">
                </div>
                <div id="cta-div" class="text-right">
                    <button class = "btn btn-primary dg-show-table"><i class="fa fa-eye">&nbsp</i>Show</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- END OF PROMOTION SECTION -->

    <!-- TICKET INFO SECTION -->
    <div class="row">
        <div class="col-12">
            <div class="description js-scroll-show">
                <div class="row">
                    <div class="col-12 col-lg-5 col-xl-5">
                        <a class="example-image-link" href="" data-lightbox="ticket-info">
                            <img class="cover lazyload img-shadow example-image" src="{{ asset('img/shows/2.jpg') }}" alt="" />
                        </a>
                    </div>

                    <div class="col-12 col-lg-7 col-xl-7">
                    <form   method="post" action="{{route('booking-ticket') }}" class="form-horizontal">
					    {{ csrf_field() }}
                            <table class="table-dark" id="ticket-table">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Rasa Melaka</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="col1">Show’s Language</td>
                                        <td id="col2">:</td>
                                        <td id="col3">
                                            @if($title != NULL)
                                            <span id="detail-txt">{{$title->description}}</span>
                                            @else
                                            <span id="detail-txt">there is no Result</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Running Time</td>
                                        <td>:</td>
                                        <td>
                                            @if($title != NULL)
                                             <span id="detail-txt">{{$title->duration}}</span>
                                            @else
                                            <span id="detail-txt">there is no Result</span>
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Show Time</td>
                                        <td>:</td>
                                        <td>
                                            <p id="table-p">
                                                
                                                @if($title != NULL)
                                                <span id="detail-txt">{{$title->time}}<span>
                                                @else
                                                <span id="detail-txt">there is no Result</span>
                                                @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Select Time</td>
                                        <td>:</td>
                                        <td class = 'select_book_time'>
                                        
                                        <p id="table-p">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="showtime" id="showtime1" value="3" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="showtime1"> 3pm</label>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="showtime" id="showtime2" value='8' class="custom-control-input">
                                                <label class="custom-control-label" for="showtime2">8pm</label>
                                            </div>
                                        </p>
                                    </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="cta-div" class="text-right">
                                                
                                                   
                                @if($title != NULL)            
                                <input type="hidden" name="ticket_id" value="{{$title->id}}">
                                @else
                                <input type="hidden" name="ticket_id" value="">
                                @endif
                                <input type="hidden" name="showday1" value="{{$showday}}">

                                <button type="submit" class="btn">Next <i class="fa fa-angle-right"></i></button>
                            </div>
                        </form>
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
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "far fa-clock",
                date: "far fa-calendar-alt",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
        // var mydate = new Date($('#select_book_date').val());
        // $('.select_book_time').empty();
        // if(mydate.getDay() == 2 || mydate.getDay() == 3 || mydate.getDay() == 4)
        //     $('.select_book_time').append('<p><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime2" class="custom-control-input" checked><label class="custom-control-label" for="showtime2">8pm</label></div></p>');
        // else if(mydate.getDay() == 5 || mydate.getDay() == 6 || mydate.getDay() == 0)
        //     $('.select_book_time').append('<p id="table-p"><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime1" class="custom-control-input" checked><label class="custom-control-label" for="showtime1"> 3pm</label></div></p><p><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime2" class="custom-control-input"><label class="custom-control-label" for="showtime2">8pm</label></div></p>');
        // else
        //     $('.select_book_time').append('<p>Rest Day</p>');
        // $('#select_book_date').on('dp.change', function(e){
        //     var mydate = new Date($('#select_book_date').val());
        //     $('.select_book_time').empty();
        //     if(mydate.getDay() == 2 || mydate.getDay() == 3 || mydate.getDay() == 4)
        //         $('.select_book_time').append('<p><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime2" class="custom-control-input" checked><label class="custom-control-label" for="showtime2">8pm</label></div></p>');
        //     else if(mydate.getDay() == 5 || mydate.getDay() == 6 || mydate.getDay() == 0)
        //         $('.select_book_time').append('<p id="table-p"><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime1" class="custom-control-input" checked><label class="custom-control-label" for="showtime1"> 3pm</label></div></p><p><div class="custom-control custom-radio"><input type="radio" name="showtime" id="showtime2" class="custom-control-input"><label class="custom-control-label" for="showtime2">8pm</label></div></p>');
        //     else
        //         $('.select_book_time').append('<p>Reat Day</p>');

        // });

       
    });
</script>
@endpush

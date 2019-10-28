@extends('layout.admin', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <h4 class="card-title">Next Showing</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="far fa-clipboard"></i>
                        </div>
                        <h4 class="card-title">Latest Booking</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="fas fa-film"></i>
                        </div>
                        <h4 class="card-title">Now Showing</h4>
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img class="img" src="{{ asset('img/shows/2.jpg') }}" alt="" style="max-width: 250px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-center">RASA MELAKA (AUGUST, 2019)</h4>
                                    <h6 class="text-center text-gray">Duration: 75</h6>
                                    <h6 class="text-center text-gray">Term: 2019-08-01 ~ 2019-08-30</h6>
                                    <h6 class="text-center text-gray">Show Time: 03:00 pm, 08:00 pm</h6>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='chart col-sm-8'>
                {!!$chart->html()!!}
            </div>
            <div class='col-sm-4'>
                {!! $calendar->calendar() !!}
            </div>
        </div>
    </div>
</div>
{!!Charts::scripts()!!}
{!! $chart->script()!!}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}

@endsection

@push('js')
<script>
    $(document).ready(function() {

    });
</script>
@endpush
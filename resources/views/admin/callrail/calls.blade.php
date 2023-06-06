@extends('layouts.adminDashboard')

@section('title', 'Call Rail Calls')

@section('styles')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('content')
    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">Call Rail Calls</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Answered</th>
                                        <th scope="col">Business Phone Number</th>
                                        <th scope="col">Customer City</th>
                                        <th scope="col">Customer Country</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Phone Number</th>
                                        <th scope="col">Customer State</th>
                                        <th scope="col">Direction</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Recording</th>
                                        <th scope="col">Recording Duration</th>
                                        <th scope="col">Recording Player</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">Tracking Phone Number</th>
                                        <th scope="col">Voicemail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($calls as $call)
                                        <tr>
                                            <td>{{ $call['answered'] === true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $call['business_phone_number'] }}</td>
                                            <td>{{ $call['customer_city'] }}</td>
                                            <td>{{ $call['customer_country'] }}</td>
                                            <td>{{ $call['customer_name'] }}</td>
                                            <td>{{ $call['customer_phone_number'] }}</td>
                                            <td>{{ $call['customer_state'] }}</td>
                                            <td>{{ $call['direction'] }}</td>
                                            <td>{{ $call['duration'] }}</td>
                                            <td><a href="{{ $call['recording'] }}" target="_blank">{{ $call['recording'] }}</a></td>
                                            <td>{{ $call['recording_duration'] }}</td>
                                            <td><a href="{{ $call['recording_player'] }}" target="_blank">{{ $call['recording_player'] }}</a></td>
                                            <td>{{ $call['start_time'] }}</td>
                                            <td>{{ $call['tracking_phone_number'] }}</td>
                                            <td>{{ $call['voicemail'] === true ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><a href="{{ url('/admin/call-rail/calls/'.request()->id.'?page='.($page - 1)) }}" class="btn btn-danger">Previous</a></td>
                                    <td><a href="{{ url('/admin/call-rail/calls/'.request()->id.'?page='.($page + 1)) }}" class="btn btn-primary">Next</a></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('scripts')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready( function () {
            // $('#myTable').DataTable();
        } );
    </script>
@endsection

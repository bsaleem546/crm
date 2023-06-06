@extends('layouts.adminDashboard')

@section('title', 'Call Rail Accounts')

@section('styles')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">Call Rail Accounts</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Outbound Recording Enabled</th>
                                    <th scope="col">Hipaa Account</th>
                                    <th scope="col">Has Zuora Account</th>
                                    <th scope="col">Brand Status</th>
                                    <th scope="col">Agency In Trial</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>{{ $account['name'] }}</td>
                                            <td>{{ $account['outbound_recording_enabled'] === true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $account['hipaa_account'] === true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $account['has_zuora_account'] === true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $account['brand_status'] }}</td>
                                            <td>{{ $account['agency_in_trial'] === true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $account['created_at'] }}</td>
                                            <td>
                                                <a href="{{ route('callrail.calls', ['id' => $account['id']]) }}" class="btn btn-success">Calls</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><a href="{{ url('/admin/call-rail/accounts?page='.($page - 1)) }}" class="btn btn-danger">Previous</a></td>
                                        <td><a href="{{ url('/admin/call-rail/accounts?page='.($page + 1)) }}" class="btn btn-primary">Next</a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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

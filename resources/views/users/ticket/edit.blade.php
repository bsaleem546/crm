@extends('layouts.userDashboard')

@section('title', 'Edit Support Ticket')

@section('content')
    <div class="col-md-8">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mt-2">Show Details Support Ticket</h3>
                    </div>

                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::get('error'))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    <p>{{ Session::get('error') }}</p>
                                </ul>
                            </div>
                        @endif

                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->name }}</h2>
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->email }}</h2>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Subject" class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->subject }}</h2>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Department</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->department }}</h2>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Service</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->service }}</h2>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Priority</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->priority }}</h2>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Message" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    <h5>{{ $data->message }}</h5>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <h2>{{ $data->status }}</h2>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

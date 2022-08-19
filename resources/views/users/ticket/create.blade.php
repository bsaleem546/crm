@extends('layouts.userDashboard')

@section('title', 'Open Ticket')


@section('content')
    <div class="col-md-8">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mt-2">Open Support Ticket</h3>
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
                        <form method="post" action="{{ route('user.ticket.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                           id="Name" placeholder="Name" name="name" >
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control"
                                           id="Email" placeholder="Email" name="email" >
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Subject" class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                           id="Subject" placeholder="Subject" name="subject" >
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Department</label>
                                <div class="col-sm-10">
                                    <select name="department" class="form-control" id="">
                                        <option value="">Select Option</option>
                                        <option value="department-1">Department 1</option>
                                        <option value="department-2">Department 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Service</label>
                                <div class="col-sm-10">
                                    <select name="service" class="form-control" id="">
                                        <option value="">Select Option</option>
                                        <option value="service-1">Service 1</option>
                                        <option value="service-2">Service 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Priority</label>
                                <div class="col-sm-10">
                                    <select name="priority" class="form-control" id="">
                                        <option value="">Select Option</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Message" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Website" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

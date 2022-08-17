@extends('layouts.adminDashboard')

@section('title', 'Add User')

@section('content')
    <div class="col-md-8">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mt-2">Add User</h3>
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
                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Name" placeholder="Name" name="name" required>
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="Email" placeholder="Email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="Password" placeholder="Password" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control" id="" required>
                                        <option value="">Select Option</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="Website" class="col-sm-2 col-form-label">Website</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Website" placeholder="Website" name="website" required>
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

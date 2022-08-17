@extends('layouts.adminDashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-md-8">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h1 style="color: #0A4D79">Welcome Back, {{ auth()->user()->name }}</h1>
                </div>
                <hr>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <h3 class="card-title mt-2">  <i class="fa fa-comments" aria-hidden="true"></i>  Recent Tickets</h3>
                        <a href="#" class="btn btn-primary p-2">Open New Ticket</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-div">
                                    <p>test ticket</p>
                                    <span class="badges">test ticket</span>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="d-flex align-div">
                                    <p>test ticket</p>
                                    <span class="badges">test ticket</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

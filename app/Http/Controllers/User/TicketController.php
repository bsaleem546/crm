<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::latest()->where('user_id', auth()->user()->id)->get();
        return view('users.ticket.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Ticket::find($id);
        return view('users.ticket.edit', compact('data'));
    }
}

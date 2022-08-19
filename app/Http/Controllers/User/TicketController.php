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
        $data = Ticket::where('user_id', auth()->user()->id)->get();
        return view('users.ticket.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Ticket::find($id);
        if ( auth()->user()->id == $data->user_id ){
            return view('users.ticket.edit', compact('data'));
        }
        else{
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('users.ticket.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                "name" => "nullable",
                "email" => "nullable",
                "subject" => "nullable",
                "department" => "nullable",
                "service" => "nullable",
                "priority" => "nullable",
                "message" => "nullable",
            ]);

            Ticket::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'department' => $request->department,
                'service' => $request->service,
                'priority' => $request->priority,
                'message' => $request->message,
                'status' => 'pending',
                'user_id' => auth()->user()->id,
            ]);

            DB::commit();
            return redirect()->route('users.ticket.index')
                ->with('success','Ticket has been successfully created.');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
        }
    }
}

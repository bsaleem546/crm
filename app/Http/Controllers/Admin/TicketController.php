<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::latest()->get();
        return view('admin.ticket.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Ticket::find($id);
        return view('admin.ticket.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'status' => 'required',
            ]);

            $data = Ticket::find($id);
            $data->update([ 'status' => $request->status ]);

            DB::commit();
            return redirect()->route('tickets.index')
                ->with('success','Ticket has been successfully updated.');
        }
        catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()
                ->with('error',$exception->getMessage());
        }
    }
}

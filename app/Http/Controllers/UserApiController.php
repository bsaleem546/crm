<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{
    public function profileSave(Request $request)
    {
        DB::beginTransaction();
        $id = auth()->user()->id;
        try{
            $request->validate([ 'name' => 'required' ]);
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'website' => $request->web,
                'refID' => $request->refID,
                'address' => $request->address,
            ]);
            DB::commit();
            return response(['status' => 'successfully', 'data' => $user]);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response(['status' => $exception]);
        }
    }

    public function getContact()
    {
        return Contact::where('user_id', auth()->user()->id)->get();
    }

    public function addContact(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([ 'contact' => 'required' ]);
            $count = count(Contact::where('user_id', auth()->user()->id)->get());
            if( $count >= 5 ){
                return response(['status' => 'Already added five contacts']);
            }
            Contact::create([
                'user_id' => auth()->user()->id,
                'contact' => $request->contact
            ]);
            DB::commit();
            return response(['status' => 'successfully']);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response(['status' => $exception]);
        }
    }

    public function deleteContact($id)
    {
        DB::beginTransaction();
        try{
            $data = Contact::findOrFail($id);
            $data->delete();
            DB::commit();
            return response(['status' => 'successfully']);
        }
        catch (\Exception $exception){
            DB::rollBack();
            return response(['status' => $exception]);
        }
    }
}

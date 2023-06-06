<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallRailController extends Controller
{
    public function accounts(Request $request)
    {
        $page = 1;
        if ($request->has('page')){
            if ($request->page == 0){
                $page = 1;
            }
            else {
                $page = $request->page;
            }
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.callrail.com/v3/a.json?page=".$page);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Token token=".env('CALL_RAIL_TOKEN')
        ));

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            die("cURL request failed: " . $error);
        }
        curl_close($ch);
        $data = json_decode($response, true);
        if ($data === null) {
            $accounts = [];
            return view('admin.callrail.accounts', compact('accounts', 'page'));
        }
        $accounts = $data['accounts'];
        return view('admin.callrail.accounts', compact('accounts', 'page'));
    }

    public function calls($id, Request $request)
    {
        $page = 1;
        if ($request->has('page')){
            if ($request->page == 0){
                $page = 1;
            }
            else {
                $page = $request->page;
            }
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.callrail.com/v3/a/".$id."/calls.json?page=".$page);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Token token=".env('CALL_RAIL_TOKEN')
        ));
        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            die("cURL request failed: " . $error);
        }
        curl_close($ch);
        $data = json_decode($response, true);
        if ($data === null) {
            $calls = [];
            return view('admin.callrail.calls', compact('calls', 'page'));
        }
        $calls = $data['calls'];
        return view('admin.callrail.calls', compact('calls', 'page'));
    }
}

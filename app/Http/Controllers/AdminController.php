<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function publish(Request $request)
    {
        $data = DB::table($request->table)->where('id', '=', $request->id);
        $data->update(['publish' => $request->publish]);
        // return response json message
        echo $request->publish;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tracer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $tracers = Tracer::active()->with('my_tracer')->get();
        // return response()->json($tracers);
        return view('user.dashboard', compact('tracers'));
    }
}

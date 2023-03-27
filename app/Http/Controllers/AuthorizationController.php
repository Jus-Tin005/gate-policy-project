<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index(){
        // return "this is for admin";

        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return "Authorized";


        // return view('policy.index');
    }
}

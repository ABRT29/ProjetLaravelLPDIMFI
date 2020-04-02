<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;



class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('admin.index');
    }

}

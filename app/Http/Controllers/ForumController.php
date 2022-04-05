<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        return view('venyse/forum',['user'=>$user]);
    }
}

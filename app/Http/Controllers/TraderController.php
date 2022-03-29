<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TraderController extends Controller
{
    public function index(){
        $traders = User::all();
        return view('venyse/traders',['traders'=>$traders]);
    }
    public function showForm(){
        return view('venyse/newTrader');
    }
}

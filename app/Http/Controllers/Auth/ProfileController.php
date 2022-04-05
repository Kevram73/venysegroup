<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile(){
        $auth_id = Auth::user()->id;
        $otherInfos = DB::table('traders')->where('user_id', $auth_id)->first();
        //$url = Storage::path($otherInfos->url_photo_profile);
        if($otherInfos){
            return view('venyse/profileTrader',['trader'=>$otherInfos]);
        }else{
            return view('venyse/profileTrader');
        }

    }
}

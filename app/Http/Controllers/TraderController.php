<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TraderController extends Controller
{
    //Show the view to show all the traders of the system
    public function index(){
        $traders = User::all();
        return view('venyse/traders',['traders'=>$traders]);
    }
    //Show the form to create a new trader
    public function showForm(){
        return view('venyse/newTrader');
    }
    //show the form to update a trader profile
    public function updateProfileForm(){
        return view('venyse/traderCompleterProfile');
    }
    //update the trader profile
    public function updateProfile(Request $request){
        $rules = [
            'nationalite' => 'required',
            'adresse' => 'required',
            'pays' => 'required',
            'photo_url' => 'required|image|mimes:jpg,png,pdf,jpeg,svg|max:2048',
            'residence_url' => 'required|image|mimes:jpg,png,pdf,jpeg,svg|max:2048',

        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('completer-profile');
        }else{
            $trader = new Trader;
            $user_id = Auth()->id;
            $trader->nationalite = $request->nationalite;
            $trader->adresse = $request->adresse;
            $trader->pays = $request->pays;
            $name_photo = $request->file('photo_url')->getClientOriginalName();
            $photo_url = $request->file('photo_url')->store('public/images');
            $name_residence = $request->file('residence_url')->getClientOriginalName();
            $residence_url = $request->file('residence_url')->store('public/images');
            $trader->url_photo_profile = $photo_url;
            $trader->url_certificat_residence = $residence_url;
            $trader->user_id = $user_id ;
            $trader->save();
            return redirect('profile');

        }
    }
}

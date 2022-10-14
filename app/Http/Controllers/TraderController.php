<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'dob'=>'required',
            'photo_url' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
            'residence_url' => 'required|mimes:jpg,png,pdf,jpeg,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect('completer-profile');

        }else{
            $trader = new Trader;
            $user_id = Auth::user()->id;
            $trader->nationalite = $request->nationalite;
            $trader->adresse = $request->adresse;
            $trader->pays = $request->pays;
            $trader->date_naissance = $request->dob;

            $name_photo = time().'.'.$request->photo_url->getClientOriginalName();
            //$request->photo_url->move(public_path('images'), $name_photo);
            $request->file('photo_url')->store('images');
            $trader->url_photo_profile = $name_photo;
            //$photo_url = $request->file('photo_url')->store('public/images');
            $name_residence = time().'.'.$request->residence_url->getClientOriginalName();
            //$request->residence_url->move(public_path('images'), $name_residence);
            $request->file('residence_url')->store('images');
            $trader->url_certificat_residence = $name_residence;
            $trader->user_id = $user_id ;
            $trader->save();
            DB::table('users')->where('id',$user_id )->update(['profile_status'=>1]);
            return redirect('profile');
        }
    }

    public function show($id){
        $trader = Trader::findOrFail($id);
        return view('venyse/editTraders',['trader'=>$trader]);
    }

} 
 
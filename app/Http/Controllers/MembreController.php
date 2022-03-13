<?php

namespace App\Http\Controllers;
use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MembreController extends Controller
{
    public function index()
    {
        //recuperer la liste des membres 
        $membres = Membre::all();
        return "liste des membres de venyse : ".$membres ;
    }

    public function create()
    {
        //retourner le formulaire d'enregistrement
        return view('venyse/createMembre');
    }
    public function store(Request $request)
    {
        /* $rules = [
			'first_name' => 'required|string|min:3|max:255',
			'last_name' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255' ,
            'phone_number' => 'required|string|max:14',
            'poste' => 'required|string',
            'nationality' => 'required|string',
            'country' => 'required|string',
            'town' => 'required|string',
            'born_date' => 'required',
            'address' => 'required|max:255',
            'photoId_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
		];
        $validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('add-membre')
			->withInput()
			->withErrors($validator);
		}
        else{
            //$data = $request->input();
			try{ */
				$member = new Membre;
                $member->first_name = $request->input('firstName');
                $member->last_name = $request->input('lastName');
				$member->email = $request->input('email');
				$member->phone_number = $request->input('phoneNumber');
                $member->poste = $request->input('poste');
                $member->nationality = $request->input('nationality');
                $member->country = $request->input('country');
                $member->town = $request->input('town');
                $member->born_day = $request->input('bornDay');
                $member->address = $request->input('address');
                //Gestion et validation de l'image.
                $imageName = time().'.'.$request->photoId->extension();  
                $request->photoId->move(public_path('images'), $imageName);
                $member->photoId_url = $imageName;
				$member->save();
				//return redirect('add-membre')->with('status',"Membre cree avec succes");
                return "membre saved with success";
          /*  }
			 catch(Exception $e){
				return "Member not saved ";
                //return redirect('add-membre')->with('failed',"operation echoue");
            }   */     
		}
    }



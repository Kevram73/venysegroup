<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployesController extends Controller
{
    public function index(){
        //get all employee from the database.
        $employes = Employes::all();
        return view('venyse/employes',['employes' => $employes]);
    }

    public function showForm(){
        return view('venyse/createEmployee');
    }

    public function store(Request $request){
        //validate and save a new employee
        $rules = [
            'firstName' =>  'required|max:255',
            'lastName'  =>  'required|max:255',
            'email'     =>  'required',
            'phoneNumber'  =>  'required',
            'poste'     =>  'required',
            'nationality'   =>  'required',
            'country'   =>  'required',
            'town'      =>  'required',
            'bornDay'  =>   'required',
            'address'   =>  'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('add-employes');
        }else{
            $employe = new Employes;
            $employe->first_name    =   $request->firstName;
            $employe->last_name     =    $request->lastName;
            $employe->email         =        $request->email;
            $employe->phone_number  =   $request->phoneNumber;
            $employe->poste         =        $request->poste;
            $employe->nationality   =   $request->nationality;
            $employe->country       =      $request->country;
            $employe->town          =       $request->town;
            $employe->born_day      =     $request->bornDay;
            $employe->address       =      $request->address;
            $employe->save();
            return redirect('employes');
            //return "new emlployee saved successfully";
        }
    }
    //Function to show editing form of employes
    public function show($id)
    {
        $employe = Employes::findOrFail($id);
        return view('venyse/editEmployes',['employe'=>$employe]);
        
    }
    //Function to edit an employe
    public function update(Request $request, $id)
    {
        $data = $request->all();
        //validate and save a new employee
        $validator = Validator::make($data, [
            'firstName' =>  'required|max:255',
            'lastName'  =>  'required|max:255',
            'email'     =>  'required',
            'phoneNumber'  =>  'required',
            'poste'     =>  'required',
            'nationality'   =>  'required',
            'country'   =>  'required',
            'town'      =>  'required',
            'bornDay'  =>   'required',
            'address'   =>  'required'
        ]);

        
        if($validator->fails()){
            return "Mise a jour échouée";
        }else{
            $employe = Employes::findOrFail($id);
            $employe->first_name    =   $request->firstName;
            $employe->last_name     =    $request->lastName;
            $employe->email         =        $request->email;
            $employe->phone_number  =   $request->phoneNumber;
            $employe->poste         =        $request->poste;
            $employe->nationality   =   $request->nationality;
            $employe->country       =      $request->country;
            $employe->town          =       $request->town;
            $employe->born_day      =     $request->bornDay;
            $employe->address       =      $request->address;
            $employe->save();
            return redirect('employes');
        }
    }
}

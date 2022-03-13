<?php

namespace App\Http\Controllers;

use App\Models\Venyse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exceptions\Handler;
use PHPUnit\Framework\Exception;

class VenyseController extends Controller
{
    //Return a form
    public function create(){
        return view('venyse/groupVenyse');
    }
    //Insert into a database
    public function store(Request $request){
        /* $rules = [
            'first_name'=>'required | string |max:255',
            'last_name'=>'required',
            'email'=>'required'
        ]; */
        $validator = Validator::make($request->all(), [
            'firstName'=>'required|string|max:255',
            'lastName' =>'required',
            'email' => 'required',
         ]);
         
            if ($validator->fails()) {
                $validated = $validator->validated();
               // return "Validation failed";
                return redirect('add')
                            ->withErrors($validator)
                            ->withInput(); 
                // Retrieve the validated input...
                $validated = $validator->validated();
                
                //var_dump($validated);
            }else{ 
                try{
                    $venyse = new Venyse;
                    $venyse->first_name = $request->input('firstName');
                    $venyse->last_name = $request->input('lastName');
                    $venyse->email = $request->input('email');
                    $venyse->save();
                    return redirect('add')->with('status',"Ajoute avec succes");
                }catch(Exception $e){
                    return redirect('add')->with('failed',"operation failed");
                }
            } 
    }
}

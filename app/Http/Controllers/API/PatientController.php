<?php

namespace App\Http\Controllers\API;

use App\Patient;
use App\User;
use App\Http\Resources\Patient as PatientResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return PatientResource::collection( $patients );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
          'name'      => $request->name,
          'email'     => $request->email,
          'password'  => bcrypt($request->password),
          'role_id'   => 2
        ]);
        
        if( $user ){
          $patient = Patient::create([
            'birthdate' => $request->birthdate,
            'weight'    => $request->weight,
            'height'    => $request->height,
            'user_id'   => $user->id
          ]);
        }
        
        return new PatientResource( $patient );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return new PatientResource( $patient );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
      $patient->update([
        'birthdate' => ($request->birthdate) ?: $patient->birthdate,
        'weight'    => ($request->weight)    ?: $patient->weight,
        'height'    => ($request->height)    ?: $patient->height
      ]);
      
      return new PatientResource( $patient );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message'=>'Patient deleted successfuly']);
    }
}

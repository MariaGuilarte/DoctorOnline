<?php

namespace App\Http\Controllers\API;

use App\Doctor;
use App\User;
use App\Http\Resources\Doctor as DoctorResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return DoctorResource::collection( $doctors );
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
          $doctor = Doctor::create([
            'speciality' => $request->speciality
          ]);
        }
        
        return new DoctorResource( $doctor );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return new DoctorResource( $doctor );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
      $doctor->update([
        'speciality' => ($request->speciality) ?: $doctor->speciality
      ]);
      
      return new DoctorResource( $doctor );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(['message'=>'Doctor deleted successfuly']);
    }
}

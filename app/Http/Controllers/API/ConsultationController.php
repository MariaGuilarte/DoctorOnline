<?php

namespace App\Http\Controllers\API;

use App\Consultation;
use App\Http\Resources\Consultation as ConsultationResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::all();
        return ConsultationResource::collection( $consultations );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultation = Consultation::create([
          'doctor_id'  => $request->doctor_id,
          'patient_id' => $request->patient_id,
          'product_id' => $request->product_id,
          'reviser_id' => $request->reviser_id,
          'condition'  => $request->condition,
          'date'       => Carbon::now()
        ]);
        
        return new ConsultationResource( $consultation );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        return new ConsultationResource( $consultation );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
      $consultation->update([
        'condition'  => $request->condition,
        'date'       => Carbon::now()
      ]);
      
      return new ConsultationResource( $consultation );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return response()->json(['message'=>'Consultation deleted successfuly']);
    }
}

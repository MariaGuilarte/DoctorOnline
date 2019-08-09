<?php

namespace App\Http\Controllers\API\Admin;

use App\Reviser;
use App\User;
use App\Http\Resources\Reviser as ReviserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReviserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revisers = Reviser::all();
        return ReviserResource::collection( $revisers );
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
          'password'  => bcrypt($request->password)
        ]);
        
        if( $user ){
          $reviser = Reviser::create([
            'user_id'   => $user->id,
            'role_id'   => 3
          ]);
        }
        
        return new ReviserResource( $reviser );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reviser  $reviser
     * @return \Illuminate\Http\Response
     */
    public function show(Reviser $reviser)
    {
        return new ReviserResource( $reviser );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reviser  $reviser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviser $reviser)
    {
      $reviser->update([
        'user_id'        => ($request->user_id) ?: $reviser->user_id
      ]);
      
      return new ReviserResource( $reviser );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reviser  $reviser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviser $reviser)
    {
        $reviser->delete();
        return response()->json(['message'=>'Reviser deleted successfuly']);
    }
}

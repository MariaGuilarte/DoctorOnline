<?php

namespace App\Http\Controllers\API\Admin;

use App\Attachment;
use App\Http\Resources\Attachment as AttachmentResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = Attachment::all();
        return AttachmentResource::collection( $attachments );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attachment = Attachment::create([
          'consultation_id' => $request->consultation_id,
          'url'             => $request->url,
          'date'            => Carbon::now()
        ]);
        
        return new AttachmentResource( $attachment );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        return new AttachmentResource( $attachment );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
      $attachment->update([
        'url'   => $request->url,
        'date'  => Carbon::now()
      ]);
      
      return new AttachmentResource( $attachment );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        $attachment->delete();
        return response()->json(['message'=>'Attachment deleted successfuly']);
    }
}

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
  'doctors'  => 'API\DoctorController',
  'patients' => 'API\PatientController',
  'revisers' => 'API\ReviserController',
  'products' => 'API\ProductController',
  'consultations' => 'API\ConsultationController',
  'attachments'   => 'API\AttachmentController',
]);


Route::prefix('admin')->group(function(){
  Route::resources([
    'doctors'       => 'API\Admin\DoctorController',
    'patients'      => 'API\Admin\PatientController',
    'revisers'      => 'API\Admin\ReviserController',
    'products'      => 'API\Admin\ProductController',
    'consultations' => 'API\Admin\ConsultationController',
    'attachments'   => 'API\Admin\AttachmentController',
  ]);
});

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



Route::group([ 'prefix' => 'v1', 'namespace' => 'Api' ], function() {

    Route::group([ 'namespace' => 'V1' ], function() {

    	
    	// DEPRECATED - passport now handling auth routes while front end handles login with google

    	// Route::get('login/google', 'AuthenticateController@redirectToProvider');
   		// Route::post('authenticate', 'AuthenticateController@authenticate'); 
   		// Route::post('logout', 'AuthenticateController@logout');
   		
    	// Users
   		Route::resource('users',              					'UserController',        						[ 'except' => ['create', 'edit'] ]);
   		Route::resource('user-roles',              				'UserRoleController',        					[ 'except' => ['create', 'edit'] ]);
   		// Admin
   		Route::resource('admins',              					'AdminController',        						[ 'except' => ['create', 'edit'] ]);
   		//Buyer
   		Route::resource('buyers',              					'BuyerController',        					[ 'except' => ['create', 'edit'] ]);

   		// Product
   		Route::resource('products',              				'ProductController',        						[ 'except' => ['create', 'edit'] ]);
   		// Product Group
   		Route::resource('product-groups',						'ProductGroupController',        					[ 'except' => ['create', 'edit'] ]);


   		// Appointments
		// Route::resource('appointments',         				'AppointmentController',    				    [ 'except' => ['create', 'edit'] ]);
		// Route::resource('appointment-details',         				'AppointmentDetailController',    				    [ 'except' => ['create', 'edit'] ]);
		// // Doctors
		// Route::resource('doctors',            				  	'DoctorController',        						[ 'except' => ['create', 'edit'] ]);
		// Route::resource('doctor-availability-time',            	'DoctorAvailabilityTimeController',     		[ 'except' => ['create', 'edit'] ]);
		// Route::resource('doctor-availability-day',            	'DoctorAvailabilityDayController',     			[ 'except' => ['create', 'edit'] ]);
				
		// // Secretaries
		// Route::resource('secretaries',            				'SecretaryController',        					[ 'except' => ['create', 'edit'] ]);

		// // Pharmacists
		// Route::resource('pharmacists',             				'PharmacistController',     					[ 'except' => ['create', 'edit'] ]);
		
		// // Patients
		// Route::resource('patients',            				  	'PatientController',        					[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-diagnosis',            	  	'PatientDiagnosisController',       	 		[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-health-history',              	'PatientHealthHistoryController',       	 	[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-physical-exam',              	'PatientPhysicalExamController',        		[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-current-medication',          	'PatientCurrentMedicationController',        	[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-social-history',              	'PatientSocialHistoryController',       	 	[ 'except' => ['create', 'edit'] ]);
		// Route::resource('patient-family-history',              	'PatientFamilyHistoryController',       	 	[ 'except' => ['create', 'edit'] ]);

		// // Prescriptions
		// Route::resource('prescriptions',             			'PrescriptionController',     					[ 'except' => ['create', 'edit'] ]);
		// Route::resource('prescription-items',           		'PrescriptionItemController',	  				[ 'except' => ['create', 'edit'] ]);
		// Route::get('print-prescription/{id}',	           		'PrescriptionController@printPrescription');

		// // Drug purchase
		// Route::resource('drug-purchase',             			'DrugPurchaseController',     					[ 'except' => ['create', 'edit'] ]);
		// Route::resource('drug-purchase-items',             		'DrugPurchaseItemController',     				[ 'except' => ['create', 'edit'] ]);

		// // Other resources
		// Route::resource('icd',              					'IcdController',        						[ 'except' => ['create', 'edit'] ]);
		// Route::resource('clinics',              				'ClinicController',        						[ 'except' => ['create', 'edit'] ]);
		// Route::resource('pharmacies',              				'PharmacyController',        					[ 'except' => ['create', 'edit'] ]);
		
		// Route::resource('specialty',             				'SpecialtyController',	     					[ 'except' => ['create', 'edit'] ]);
		// Route::resource('audit-trail',             				'AuditTrailController',     					[ 'except' => ['create', 'edit'] ]);
		
	});
});
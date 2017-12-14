<?php namespace App\Http\Controllers\Api\V1;

/**
 * Class: AdminController
 *
 * @see BaseController
 */

use Illuminate\Support\Facades\Input;

class AdminController
    extends BaseController
{
    
	 /**
     * @var string resource_class
     */
    protected $resource_class= 'Admin';

    /**
     * @var string resource_name
     */
    protected $resource_name  = 'admin';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $params = Input::all();

        // assign resource class to var 
        $admin = $this->resource_class::query();

        /**
	     * Filters - Name and Specialty
	     *
	     */

        // if(isset($params['name'])){
        //   	$admin = $admin->where('fname', 'LIKE', '%' . $params['name'] . '%')
        //      	->orWhere('lname', 'LIKE', '%' . $params['name'] . '%');
        // }

        // if(isset($params['specialty_id'])){
	       //  $admin = $admin->whereHas('adminspecialty', function ($q) use ($params) {
        //          $q->where('id', $params['specialty_id']);
        //     });
        // }

        $admin = $admin->orderBy('created_at','DESC')
        		->with(['profile'])
        		->paginate();
   
        // check if we have a resource
        if($admin){
            // give back the resource that we need
            return \Response::json($admin, 200);
        }
         // give them a 404
        return $this->response_404();

    }

    /**
     * Display the specified resource - inculing relationships
     *
     * @param string $id
     * @return Response
     */

    public function show($id = ''){

        $admin = $this->resource_class::
            with(['profile'])->find($id);
        
        // check if we have a resource
        if ($admin) {

            // log audit trail
            $this->audit_trail_log('show', $id);
            
            // give back the resource that we need
            return \Response::json($admin, 200);
        }
        
        // give them a 404
        return $this->response_404();
    }

}
<?php namespace App\Http\Controllers\Api\V1;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * Class: BaseController
 *
 * @see Controller
 */
abstract class BaseController
    extends Controller{

	 /**
     * @var string $resource_class This is the class that resources are loaded from
     */
    protected $resource_class = '\stdClass';

    /**
     * @var string resource_name This is the name of the resource
     */
    protected $resource_name  = 'std_class';


	protected $per_page = 15;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function index()
    {
  	
        return \Response::json($this->resources(), 200);

    }

    /**
     * resources()
     *
     * Returns an array of requested resources
     *
     * @abstract
     * @return Resource[]
     */
    protected function resources()
    {

        $resource = $this->resource_class;
        $resource = $resource::orderBy('created_at','DESC');
        $resource = call_user_func([ $resource, 'paginate' ], $this->per_page);
       
        // Give back the resource...
        return $resource;
    }


    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show($id = '')
    {

        // Check if is not numeric
        if (!is_numeric($id)) {
            $id = urldecode($id);
        }

        // check if we have an ID
        if (strlen(trim($id)) < 1 || $id == 'null') {
            return $this->response_404();
        }

        // try to load the resource
        $resource = $this->resource($id);

        // check if we have a resource
        if ($resource) {

            // log audit trail
           $this->audit_trail_log('show', $id);
            
            // give back the resource that we need
            return \Response::json($resource, 200);
        }

        // give them a 404
        return $this->response_404();
    }

    /**
     * resource()
     *
     * Returns the requested resource based on the passed ID
     *
     * @param string $id
     * @return Resource
     */
    protected function resource($id = '')
    {
        $resource = $this->resource_class;

        // Give back the resource...
        return call_user_func([ $resource, 'find' ], $id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
    */
    public function store()
    {
        // create the resource!
        $resource = $this->resource_new(Input::get());

        // Check if we have the resource
        if ($resource) {
            
            // Save the resource
            $resource->save();

            // log audit trail
            $this->audit_trail_log('create', null);

            // give back the resource that we need
            return \Response::json($resource, 201);
        }

        // Make a 422 error
        return $this->response_422();
    }

    /**
     * resource_new()
     *
     * Returns a NEW requested resource based on input date
     *
     * @param array $data
     * @return Resource
     */

    protected function resource_new($data = [])
    {
        return call_user_func([ new $this->resource_class, 'fill' ], $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $id
     * @return Response
     */
    public function update($id = '')
    {
        // try to load the resource
        $resource = $this->resource_write($id);

        // check if we have the resource
        if ($resource) {
            // get the input data...
            $fields = Input::get();

            // update the resource with the data
            $this->resource_update($resource, $fields);

            // log audit trail
            $this->audit_trail_log('update', $id);

            // repond with the resource and 202 status for accepted
            return \Response::json($resource, 202);
        }

        // give them a 404
        return $this->response_404();
    }

    /**
     * resource_write()
     *
     * Returns the requested resource based on the passed ID for WRITES
     *
     * @param string $id
     * @return Resource
     */
    protected function resource_write($id = '')
    {
        // Normally this is just an alias for the resource() method
        return $this->resource($id);
    }

    /**
     * resource_update()
     *
     * @param Resource $resource
     * @param Resource $fields
     */

    protected function resource_update(&$resource, $fields)
    {
        $resource->update($fields);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy($id = '')
    {
        // try to load the resource
        $resource = $this->resource_write($id);

        // check if we got the resource
        if ($resource) {
            // Check if we are already archived...
            if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($resource)) && $resource->trashed()) {
                // We need to DESTROY this resource!
                $resource->forceDelete();
            } else {
                // We need to DESTROY this resource!
                $resource->delete();
            }

            // log audit trail
            $this->audit_trail_log('delete', $id);

            // now we respond
            return \Response::make('', 204);
        }

        // give them a 404
        return $this->response_404();
    }

    public function audit_trail_log($action , $id){

        // check if we have an id
        $id ? $log_id = $id : $log_id = '';
        
        // log audit trail!
        \AuditTrail::create(
                [   'action'    =>  $this->resource_name . ' : ' . $action . ' record ' .  $log_id, 
                    'user_id'   =>  Auth::user()->id  ]);  
    
    }

	


}
<?php namespace App\Http\Controllers\Api\V1;

/**
 * Class: ProductGroupController
 *
 * @see BaseController
 */
use Illuminate\Support\Facades\Input;

class ProductGroupController
    extends BaseController
{
    
     /**
     * @var string resource_class
     */
    protected $resource_class= 'ProductGroup';

    /**
     * @var string resource_name
     */
    protected $resource_name  = 'product_group';

     public function index()
    {

        $params = Input::all();

        // assign resource class to var 
        $product_group = $this->resource_class::query();

        /**
	     * Filters - Name and Specialty
	     *
	     */

        // if(isset($params['name'])){
        //   	$product_group = $product_group->where('fname', 'LIKE', '%' . $params['name'] . '%')
        //      	->orWhere('lname', 'LIKE', '%' . $params['name'] . '%');
        // }

        // if(isset($params['specialty_id'])){
	       //  $product_group = $product_group->whereHas('product_groupspecialty', function ($q) use ($params) {
        //          $q->where('id', $params['specialty_id']);
        //     });
        // }

        $product_group = $product_group->orderBy('created_at','DESC')
        		->with(['productList'])
        		->paginate();
   
        // check if we have a resource
        if($product_group){
            // give back the resource that we need
            return \Response::json($product_group, 200);
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

        $product_group = $this->resource_class::
            with(['productList'])->find($id);
        
        // check if we have a resource
        if ($product_group) {

            // log audit trail
            // $this->audit_trail_log('show', $id);
            
            // give back the resource that we need
            return \Response::json($product_group, 200);
        }
        
        // give them a 404
        return $this->response_404();
    }



}
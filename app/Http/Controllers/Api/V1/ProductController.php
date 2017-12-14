<?php namespace App\Http\Controllers\Api\V1;

/**
 * Class: ProductController
 *
 * @see BaseController
 */
use Illuminate\Support\Facades\Input;

class ProductController
    extends BaseController
{
    
     /**
     * @var string resource_class
     */
    protected $resource_class= 'Product';

    /**
     * @var string resource_name
     */
    protected $resource_name  = 'product';

    public function index()
    {

        $params = Input::all();

        // assign resource class to var 
        $product = $this->resource_class::query();

        /**
	     * Filters - Name and Specialty
	     *
	     */

        // if(isset($params['name'])){
        //   	$product = $product->where('fname', 'LIKE', '%' . $params['name'] . '%')
        //      	->orWhere('lname', 'LIKE', '%' . $params['name'] . '%');
        // }

        // if(isset($params['specialty_id'])){
	       //  $product = $product->whereHas('productspecialty', function ($q) use ($params) {
        //          $q->where('id', $params['specialty_id']);
        //     });
        // }

        $product = $product->orderBy('created_at','DESC')
        		->with(['group'])
        		->paginate();
   
        // check if we have a resource
        if($product){
            // give back the resource that we need
            return \Response::json($product, 200);
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

        $product = $this->resource_class::
            with(['group'])->find($id);
        
        // check if we have a resource
        if ($product) {

            // log audit trail
            // $this->audit_trail_log('show', $id);
            
            // give back the resource that we need
            return \Response::json($product, 200);
        }
        
        // give them a 404
        return $this->response_404();
    }



    public function publicIndex()
    {

        $params = Input::all();

        // assign resource class to var 
        $product = $this->resource_class::query();

        /**
	     * Filters - Name and Specialty
	     *
	     */

        // if(isset($params['name'])){
        //   	$product = $product->where('fname', 'LIKE', '%' . $params['name'] . '%')
        //      	->orWhere('lname', 'LIKE', '%' . $params['name'] . '%');
        // }

        // if(isset($params['specialty_id'])){
	       //  $product = $product->whereHas('productspecialty', function ($q) use ($params) {
        //          $q->where('id', $params['specialty_id']);
        //     });
        // }

        $product = $product->orderBy('created_at','DESC')
        		->with(['group'])
        		->paginate();
   
        // check if we have a resource
        if($product){
            // give back the resource that we need
            return \Response::json($product, 200);
        }
         // give them a 404
        return $this->response_404();

    }

}
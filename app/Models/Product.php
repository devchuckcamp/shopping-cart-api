<?php

/**
 * Class: Product
 *
 * @see BaseModel
 */

class Product extends BaseModel
{

	/**
     *
     * @var define relationships
     */
    
    public function group()
    {
        return $this->belongsTo('ProductGroup','product_group_id','id');
    }

    
}

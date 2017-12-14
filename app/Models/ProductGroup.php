<?php

/**
 * Class: ProductGroup
 *
 * @see BaseModel
 */

class ProductGroup extends BaseModel
{

	/**
     *
     * @var define relationships
     */
    
    public function productList()
    {
        return $this->hasMany('Product','product_group_id','id');
    }

    
}

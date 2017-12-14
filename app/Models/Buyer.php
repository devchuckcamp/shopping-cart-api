<?php

/**
 * Class: Buyer
 *
 * @see BaseModel
 */

class Buyer extends BaseModel
{

	/**
     *
     * @var define relationships
     */
    
    public function profile()
    {
        return $this->belongsTo('User','user_id','id');
    }

    
}

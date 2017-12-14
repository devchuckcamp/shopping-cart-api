<?php

/**
 * Class: Admin
 *
 * @see BaseModel
 */

class Admin extends BaseModel
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

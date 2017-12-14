<?php 

use Illuminate\Database\Eloquent\Model;

/**
 * Class: Appointment
 *
 * @see Model
 */

abstract class BaseModel extends Model{

	protected $guarded = [ 'id' ];

}
<?php 

/**
 * Class: User
 *
 * @see BaseModel
 */
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     *
     * @var Fillables
     */

    protected $fillable = ['username', 'email', 'password','name', 'role_id', 'status'];

    /**
     *
     * @var Find for Passport
     */

    public function findForPassport($username) {

       // change column name whatever you use in credentials
       return self::orWhere('username', $username)->first(); 
    
    }

    /**
     *
     * @var Define Relationships
     */

    public function patient()
    {
        return $this->hasOne('Patient','user_id','id');
    }

    public function doctor()
    {
        return $this->hasOne('Doctor','user_id','id');
    }

    public function pharmacist()
    {
        return $this->hasOne('Pharmacist','user_id','id');
    }

    public function secretary()
    {
        return $this->hasOne('Secretary','user_id','id');
    }

    public function role_info()
    {
        return $this->hasOne('UserRole','id','role_id');
    }


}
<?php namespace App\Http\Controllers\Api\V1;

/**
 * Class: UserController
 *
 * @see BaseController
 */
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class UserController extends BaseController
{
    use HasApiTokens, Notifiable;

    /**
     * @var string resource_class
     */
    protected $resource_class = 'User';

    /**
     * @var string resource_name
     */
    protected $resource_name  = 'user';

    



    public function index()
    {

        $params = Input::all();

        // assign resource class to var 
        $user = $this->resource_class::query();

        /**
         * Filters - Name and Specialty
         *
         */

        // if(isset($params['name'])){
        //      $user = $user->where('fname', 'LIKE', '%' . $params['name'] . '%')
        //          ->orWhere('lname', 'LIKE', '%' . $params['name'] . '%');
        // }

        // if(isset($params['specialty_id'])){
           //  $user = $user->whereHas('userspecialty', function ($q) use ($params) {
        //          $q->where('id', $params['specialty_id']);
        //     });
        // }

        $user = $user->orderBy('created_at','DESC')
                ->with(['role_info'])
                ->paginate();
   
        // check if we have a resource
        if($user){
            // give back the resource that we need
            return \Response::json($user, 200);
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

        $user = Auth::user();


        // switch($user->role_id){

            // case 2: // DOCTOR

                $user = $this->resource_class::
                        with(['role_info'])
                        ->find($id);
                
                // check if we have a resource
                if ($user) {

                    // give back the resource that we need
                    return \Response::json($user, 200);
                }
    
                // give them a 404
                return $this->response_404();

        //     break;

        //     case 3: // SECETARY

        //         $secretary = $this->resource_class::find($id);
                
        //         // check if we have a resource
        //         if ($secretary) {
                    
        //             // give back the resource that we need
        //             return \Response::json($secretary, 200);
        //         }
        
        //         // give them a 404
        //         return $this->response_404();

        //     break;

        //     case 4: // PHARMACIST
            
        //         $pharmacist = $this->resource_class::find($id);
        
        //         // check if we have a resource
        //         if ($pharmacist) {

        //             // log audit trail
        //             $this->audit_trail_log('show', $id);
                    
        //             // give back the resource that we need
        //             return \Response::json($pharmacist, 200);
        //         }
        
        // // give them a 404
        // return $this->response_404();

        //     break;

        //     case 5: // PATIENT

        //         $patient = $this->resource_class::find($id);
            
        //         // check if we have a resource
        //         if ($patient) {
                    
        //             // give back the resource that we need
        //             return \Response::json($patient, 200);
        //         }

        //         // give them a 404
        //         return $this->response_404();

        //     break;

        // }

        
        
        // give them a 404
        return $this->response_404();

    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
    */
    public function store()
    {
        $input = Input::get();
        $input['password'] = \Hash::make($input['password']);
        
        $user = $this->resource_class::create($input);

        return \Response::json($user, 200);
    }

    /**
    * DEPRECATED Log in with Google will be in front-end (see branch login-with-google)
    *
    */

    // public function googleLogin(Request $request)  {

    //         $google_redirect_url = route('glogin');
    //         $gClient = new \Google_Client();
    //         $gClient->setApplicationName(config('services.google.app_name'));
    //         $gClient->setClientId(config('services.google.client_id'));
    //         $gClient->setClientSecret(config('services.google.client_secret'));
    //         $gClient->setRedirectUri($google_redirect_url);
    //         $gClient->setDeveloperKey(config('services.google.api_key'));
    //         $gClient->setScopes(array(
    //             'https://www.googleapis.com/auth/plus.me',
    //             'https://www.googleapis.com/auth/userinfo.email',
    //             'https://www.googleapis.com/auth/userinfo.profile',
    //         ));

    //         $google_oauthV2 = new \Google_Service_Oauth2($gClient);

    //         if ($request->get('code')){
    //             $gClient->authenticate($request->get('code'));
    //             //$request->session()->put('token', $gClient->getAccessToken());
    //         }
    //         if ($request->session()->get('token'))
    //         {
    //             $gClient->setAccessToken($request->session()->get('token'));
    //         }
    //         if($gClient->getAccessToken())
    //         {
    //             *
    //             *
    //             * does logging out google also logs the user out of application?
                

    //             //For logged in user, get details from google using access token
    //             $guser = $google_oauthV2->userinfo->get();  
         
               
    //             $user = $this->resource_class::where('email', $guser['email'])->first();
    //             // $user = $this->resource_class::find($user->id);
 
    //             if($user){
    //                 $token = $user->createToken('Token')->accessToken;
    //                 return $token;
    //             }else{
    //                 $this->resource_class::create(
    //                     [ 'username' => ' ', 'name' => ' ', 
    //                         'email' => $guser['email'] , 
    //                         'password' => ' ', 
    //                         'role_id' => 5, 
    //                         'status' => 1 
    //                         ]);
    //                 $user = $this->resource_class::where('email', $guser['email'])->first();
    //                 $token = $user->createToken('Token')->accessToken;
    //                 return $token;

    //             }           
                        
    //         } else
    //         {
    //             //For Guest user, get google login url
    //             $authUrl = $gClient->createAuthUrl();
    //             return redirect()->to($authUrl);
    //         }
    // }


}
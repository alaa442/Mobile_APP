<?php


namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\User;
use App\Gps;
use App\Contractor;
use DB;
use App\Http\Controllers\Controller;
use Request;
use Excel;
use File;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use Session;
use Geocode;


class GpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $users=user::where('role','user')->get();
        
        return json_encode($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

public function doLogin($username,$password)
 {



      $userdata = array(
        'username'     => $username,
        'password'  => $password
    );
        $titles=User::where('username',$username)->pluck('role')->first();


       if (Auth::attempt($userdata) && $titles=='admin')
        {
              $user=Auth::user();
              return json_encode($user);

        }
       elseif (Auth::attempt($userdata) && $titles=='user')

        {    
          $user=Auth::user();
           
          return json_encode($user);
        }

      
     else {
        $user=0;
         return json_encode($user);         
      }
}






public function doRegister($username,$password,$email,$role,$nameuser)
{

try{
        $user = new User;
        $user->email = $email;
        $user->username =$username;
        $user->password=(\Hash::make($password));
        $user->role = $role;
        $user->name =$nameuser;
        $user->save();
        $done=1;
         return json_encode($done);
   }

catch(Exception $e)
        {  
            $done=0;
            return json_encode($done); 
        }
 
         
}


public function get_location($date){
      
        $loc =  DB::table('gps')
                    ->where('NDate','=',$date)
                    ->select('gps.*')->get();

        $loc = (array) $loc;        
        foreach ($loc as $location) {
            $var = DB::table('users')
                    ->select('username')
                    ->where('id', '=', $location->user_id)
                    ->get();
            $location->user_id =$var[0]->username;             
        }
        
        return json_encode(['locations' =>$loc]);
        
    }
   

public function NameDateFilter($name, $date){ 
            if ($name=="empty") {
                $loc =  DB::table('gps')
                        ->join('users','users.id','=','gps.user_id')
                        ->where('NDate','=',$date)
                        ->select('gps.*')->get();
                       
            }

            if($date=="empty") {
                $loc =  DB::table('gps')
                        ->join('users','users.id','=','gps.user_id')
                        ->where('users.username','=',$name)
                        ->select('gps.*')->get();
                       
                }

            else if ($date !="empty" && $name!="empty"){
                    $loc =  DB::table('gps')
                        ->join('users','users.id','=','gps.user_id')
                        ->where('users.username','=',$name)
                        ->where('NDate','=',$date)
                        ->select('gps.*')->get();
                        // echo "all";
                    // $loc =  DB::table('gps')->select('gps.*')->get();
                    // dd('together');
                  }
        // dd($loc);
        return json_encode(['locations' =>$loc]);      
    }


 public function GpsStore($id,$lng,$lat,$status,$date,$Name,$Code)
    {
       

$new =gps::where('Contractor_Code',$Code)->where('NDate',$date)->pluck('Contractor_Name')->first();

if($new!==$Name)
{
           $myLocation = New Gps ;

           $myLocation->Long =$lng;
           $myLocation->Lat=$lat;
           $myLocation->status=$status;
           $myLocation->user_id=$id;
           $myLocation->NDate=$date;
           $myLocation->Contractor_Name=$Name;
           $myLocation->Contractor_Code=$Code;
           $myLocation->save();
           $done=1;
           return json_encode($done); 

 }
   else
   {

       $done=0;
       return json_encode($done); 
   }   
      
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   


}

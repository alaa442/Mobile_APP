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
use Cache;
use URL;
use View;
use Khill\Lavacharts\Laravel\LavachartsFacade as Lava;
use Khill\Lavacharts\Lavacharts;
use TableView;
use App\Dategps;

class AdminController extends Controller
{
  //azhar
   public function report()
    {
        try {
            $users=user::where('role','user')->lists('username','id');
            if (Auth::check()){
              return view('reports/reports',compact('users'));
            }
            else {
              return redirect('/login');
            }
        } catch (Exception $e) {
            return redirect('/login');
        }
    }

  public function reports()
    {
        try {
              $rules = array(
                'Title'=>array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}{0-9}]+(?:$|\s+)){1,}$/u'),
                'Start_Date'    =>'required|date', 
                'End_Date'      => 'required|date|after:Start_Date',
                'users'  => array('required','not_in:null'),           
              );
              $messages = [
                        'required'           =>     'please Enter Data ',
                        'End_Date.after'     =>     'Please,Enter Correct Date ',
                        'Start_Date.after'   =>     'Enter Correct Date',
                        'regex'              =>     'Enter Correct Data',
                        'date_format'        =>     'Enter Correct Date',
                        'not_in'             =>    'Please Choose '
                    ];
            $Validator=Validator :: make(Input::all(),$rules,$messages);
            if($Validator->fails()){
                return redirect('/reports')->withErrors($Validator)->withInput();
            }
            else
                {
                  $Title=Request::get('Title');                
                  $Start_Date=date("Y-m-d",strtotime(Request::get('Start_Date')));
                  $End_Date=date("Y-m-d",strtotime(Request::get('End_Date')));        
                  $pormoters=Request::get('users');           
                  return $this->generatecharts($Title, $Start_Date,$End_Date,$pormoters);
                }
        }
      catch (Exception $e) {
          return redirect('/login');       
      }   
  }

public function generatecharts($Title, $Start_Date,$End_Date,$pormoters)
    {
       try {
          if (Auth::check()){
              $stocksTable = \Lava::DataTable();
              $stocksTable->addDateColumn('Date');
              $range=array($Start_Date,  $End_Date);
              $date=gps::whereBetween('NDate',$range)->groupby('NDate')->get();
              if($pormoters[0]==='all')
                { 
                $user_ids= gps::whereBetween('NDate',$range)->select('user_id')->distinct('user_id')->get();
                $datatable=gps::whereBetween('NDate',$range)->select('*')->get();
                $data=[];
                foreach ($user_ids as $keys) {
                  $username=user::select('username')->where('id','=',$keys->user_id)->first();       
                  $data[$keys->user_id]=$username->username ;
                  $stocksTable->addNumberColumn($username->username);
                }  
              }
        else
        {
          $user_ids=$pormoters; 
          $data=[];
          $datatable=gps::whereBetween('NDate',$range)->whereIn('user_id',$user_ids)->select('*')->get();
          foreach ($user_ids as $keys) {
            $username=user::select('username')->where('id','=',$keys)->first();
            $data[$keys]=$username->username ;
            $stocksTable->addNumberColumn($username->username);
          }
  
      }
    $n=count($data);
    $a=array();
    $rowData=array();
    for ($i=0; $i < count($date); $i++) { 
        array_push($a,$date[$i]->NDate);
        $gps = DB::table('gps')
                   ->select('user_id','NDate','username',DB::raw('count(*) as visits'))->join('users', 'users.id', '=', 'gps.user_id')
                    ->where('NDate','=',$date[$i]->NDate)
                    ->groupBy('user_id')
                    ->get();
            for ($j=0; $j < count($gps); $j++) { 
                $No=0;
                foreach ($data as $key => $value) {
                     $No++;
                      if($value===$gps[$j]->username)
                          {
                            $a[$No]=$gps[$j]->visits;
                          }
                      if((($j+1) === count($gps)) && ($No === $n))
                          {
                            for ($s=1; $s<= $No; $s++) 
                              { 
                                 if(!(array_search($s,array_keys($a))))
                                    {
                                      $a[$s]=0;                                     
                                    }
                                    ksort($a);                                                          
                              }
                              $stocksTable->addRow($a);                                    
                        }                                   
                   }
            }
           $a=array();
    }
  //dd($stocksTable);
    $chart = \Lava::ColumnChart('MyStocks', $stocksTable,[
              'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14,
                     
        ]]);
    return view('charts/analytics',compact('Title','datatable'));
   } 
   else { return redirect('/login');}
  }
     catch (Exception $e) 
      {
          return redirect('/login');
       }
      
}


public function logout(){
        Auth::logout();
        return Redirect::to('/login');
  }

public function latest()
{
  $done1=gps::select('user_id')->where('IsDone','0')->where('Status','1')->groupby('user_id')->get();
  $options = array();
  $data=[];
  foreach ($done1 as $done) {
      $count=gps::select('user_id')
        ->where('IsDone','0')
        ->where('Status','1')
        ->where('user_id',$done->user_id)
        ->count('id');
      $name= $done->getusers->name;
    
      array_push($data,array($count=>$name));

  }
  return Response::json($data);
}

public function updatelatest($name)
{
  
  $user_id=user::select('id')->where('username',$name)->pluck('id')->first();
  $gps=gps::select('id')
        ->where('IsDone','0')
        ->where('Status','1')
        ->where('user_id',$user_id)
        ->get();      
  $data=[];
 foreach ($gps as $done) {

  $gps=gps::find($done->id);
    array_push($data,array( 
      'Name'=>$gps->getusers->name,
      'Date'=>$gps->NDate,
      'ContractorCode'=>$gps->Contractor_Code));
  $gps->IsDone=1;
  $gps->save();
    }
   return Response::json($data);

}

public function adminpanel(){
      try 
      {      
          $gps = gps::all();      
          if (Auth::check()){
                  // The user is logged in...
                  return view('admin/adminpanel',compact('gps'));
              }
          else{   
                  return Redirect::to('/login');             
                  // dd("nott logged in...");
              }
      }
     catch (Exception $e){ 
          return redirect('/login');    
        }       
}
  
public function index()
    {
      try {
            $users=user::where('role','user')->get();   
            return json_encode($users);
        } 
      catch (Exception $e) {
          return redirect('/login');  
      }

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function login(){ 

     try {
       $data = Input::all();      
        $rules = array(
            'username' => 'required',
            'password' => 'required',
             );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
          return Redirect::to('/login')->withInput(Input::except('password'))->withErrors($validator);
        }
        else {
          $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
              );
            $titles=User::where('username',$userdata['username'])->pluck('role')->first();
            if (Auth::attempt($userdata) && $titles=='admin')
            {
                  $user=Auth::user();
                  return Redirect::to('/adminpanel');
            }
          // doing login.
          if (Auth::validate($userdata)) {
            if (Auth::attempt($userdata)) {
                Session::flash('error', 'You are not allowed to login'); 
                return Redirect::to('/login');
            }
          } 
          else {

            Session::flash('error', 'Something went wrong'); 
            return Redirect::to('/login');
            }

        }
       
     } catch (Exception $e) {
        return redirect('/login');

       
     }
       
  }





public function NameDateFilter($name, $date){ 
      try {
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
            if ($date =="empty" && $name =="empty"){ 
                $date = date('Y-m-d');
             
                $loc =  DB::table('gps')
                        ->where('NDate','=',$date)
                        ->select('gps.*')->get(); 
            }
            else if ($date !="empty" && $name!="empty"){
                    $loc =  DB::table('gps')
                        ->join('users','users.id','=','gps.user_id')
                        ->where('users.username','=',$name)
                        ->where('NDate','=',$date)
                        ->select('gps.*')->get();
                  }
     
        return json_encode(['locations' =>$loc]);      
          } 

        catch (Exception $e) {
            return redirect('/login');          
          }
    }


public function DrawMap(){

    try{
         $date = date('Y-m-d');
         $gps =  DB::table('gps')
                        ->where('NDate','=',$date)
                        ->select('gps.*')->get();                   
         foreach ($gps as $location) {
                $var = DB::table('users')
                        ->select('username')
                        ->where('id', '=', $location->user_id)
                        ->get();
                $location->user_id =$var[0]->username;             
            }
        return json_encode(['locations'=>$gps]);
      }
        catch (Exception $e) {
          return redirect('/login');
         }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users=user::where('id','=',$id)->first();
  
       
        return $users;
    }

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
    public function destroy($id)
    {
        //
    }

  
    
 
public function Gpsupdate( )
 { 



    $gps = Input::get('pk');  
        $column_name = Input::get('name');
        $column_value = Input::get('value');
    
        $gpsData = gps::whereId($gps)->first();
        $gpsData-> $column_name=$column_value;

        if($gpsData->save())

        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>0));
 
  


}
   








    





}
<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Request;
use Excel;
use Input;
use File;
use Validator;
use DB;
use Auth;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Datatables;
use Illuminate\View\Middleware\ErrorBinder;
use Exception;
use App\Gps;


class UserController extends Controller
{
 	public function index(Request $request)
	{
      try {
            $users = User::all();
            if (Auth::check()){
				return view('users/index',compact('users'));
			}
			else {
				return redirect('/login');
			}
	}
	catch(Exception $e)	
	{
		return redirect('/login');
	}
}
 

public function destroy($id)
	{
		try
		{ 
			if (Auth::check()){
				$users=User::find($id);
				if(\Auth::user()->username == $users->username)
				{ 

					return redirect('/login');
				}
				 	$users->delete();
			        return redirect('/users');
	   		}
	   		else {
				return redirect('/login');
			}

	   	}
	   catch(Exception $e)
		{
			return redirect('/login');

		}
	}




   	public function create()
	{ 
		try {
			if (Auth::check()){
				return view('users.create');
			}
			else {
				return redirect('/login');
			}
		
			} catch (Exception $e) {
				return redirect('/login'); 			
			}
	}


	public function store(Request $request)
 	{  
	try {
		$rules = array(
        'Name' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u'),
        'Username' => array('required','regex:/^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+(?:$|\s+)){2,}/u','unique:users,Username'),
         'Email' => array('required','email','unique:users,Email'),
         'Role'  => array('not_in:0'),
         'Password' => array('required')

     );

       	$messages = array(
	    'required' => 'please enter data',
	    'unique'=> 'this reacord is already exist',
	   'not_in'=>'You Must Choose A Role',
	    'email'=>'please enter email'
);
$validator = Validator::make(Input::all(),$rules,$messages);
if ($validator->fails()) {
	// $messages = $validator->messages();
	// return $messages;
	if (Auth::check()){
	 	return redirect('/users/create')->withErrors($validator)->withInput();
	}
	else {
				return redirect('/login');
		}
}

       	else
       	{
     
      $user = new User;
       $user->name =Request::get('Name');
 
   $user->username =Request::get('Username');
     $user->email =Request::get('Email');
  $hashedpassword=Request::get ('Password');
$user->password=\Hash::make( $hashedpassword);
   $user->role = Request::get('Role');
 
    $user->save();

    if (Auth::check()){
     	return redirect('/users'); 
    }
    else {
				return redirect('/login');
		}

}		
} catch (Exception $e) {
	     return redirect('/login'); 

	
}
  

}

public function fupdate( )
 { 



		$users = Input::get('pk');	
        $column_name = Input::get('name');
        $column_value = Input::get('value');
    
        $userData = User::whereId($users)->first();
        $userData-> $column_name=$column_value;

        if($userData->save())

        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>0));
 
	


}



}

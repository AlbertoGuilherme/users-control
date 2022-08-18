<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequestUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserSubscribed;
class LoginController extends Controller
{

 private $repository;

    public function __construct(User $user)
    {
            $this->repository = $user;
    }

    public function exib()
    {
        return view('admin.users.login');
    }

    public function logout()
    {
        if(auth()->check()){
            Auth::guard()->logout();
            return  redirect()->route('users.index')
                     ->withMessage('Hope you come back');
        }
    }


       protected function make(LoginRequestUser $request)
    {
                         $user = [
                        'email'    => $request['email'],
                        'password' => $request['password'],
                       
                         ];



                if(Auth()->guard()->attempt($user)){
                    
                    $id =  auth()->user()->id;//get the logged user
                    $user = User::find($id);
                    event(new UserSubscribed($user));//this event alter the user sessions number
                  
                    return redirect()->route('users.index')
                    ->withMessage('Welcome to user management');


                }

                return redirect()->back()->withErrors('This credentials do not match with our records');



}


}

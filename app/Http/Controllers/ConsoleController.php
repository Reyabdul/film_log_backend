<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ConsoleController extends Controller
{
    
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login()
    {

        //***NOTE**'dd() - It is a helper function which is used to dump a variable's contents to the browser and stop the further script execution. It stands for Dump and Die.' 
            //more info: (https://www.bestinterviewquestion.com/question/what-is-dd-function-in-laravel-tahyr979#:~:text=()%20in%20Laravel%3F-,What%20is%20the%20use%20of%20dd()%20in%20Laravel%3F,stands%20for%20Dump%20and%20Die.)
            //dd('Process the login!');
        
        //'dd(request())' will display all info after submit form
             //dd(request());

        //information needed when logging in
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        //check data on $attributes
            //dd($attributes); 
        if(auth()->attempt($attributes))
        {
            return redirect('/console/dashboard');
        }
        
        //in the event of errors or inputting wrong info
        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid email/password combination']);
    }

    public function dashboard()
    {
        return view('console.dashboard');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $dataValues = time_logger::all();
        // return view('pages.dashboard')->with(compact('dataValues'));
        return view('pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    function register(){
        return view('auth.register');
    }


    public function store(Request $request)
    {
        //Validate Requests
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:6|max:12'

        ]);



        //Insert into the Database

        $customer = new Customer; //Customer is a model
        $customer->customer_name = $request->name;
        $customer->email = $request->email;
        $customer->customer_dob = $request->dob;
        $customer->customer_phone = $request->phonenumber;
        $customer->password = Hash::make($request->password);
        $save = $customer->save();

        if($save){
            // return back()->with('success','New User has been successfuly added to database');
            $request->session()->put('LoggedUser', $customer->id);
            return redirect('/');

            
               

         }else{
             return back()->with('fail','Something went wrong, try again later');
         }


    }






    function login(){
        return view('auth.login');
    }



    //fetching from database and checking data to login successfully
    function check(Request $request){

        //Validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);


        //Query used to fetch users with requested emails from db in customer's table
        $userInfo = Customer::where('email', "=", $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/');
    
            }else{
                return back()->with('fail','Incorrect password');
            }
        }

        


    }

    



    //logout user
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
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
        //
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['verified']);
    }


    public function index()
    {
       $users =  User::paginate(15);
       return view('user.list', compact('users'));
        
    }


    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->name;

        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $users =  User::find($id);
        $subDetails  = $users->subscription_details;
        $subDatas = array();
        if( $subDetails  ){
            $subDetails =    json_decode($subDetails, true);
            $subDatas = $subDetails['hits'];
        }   
        return view('user.view', compact('users','subDatas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users =  User::find($id);
        $subDetails  = $users->subscription_details;
        $subDatas = array();
        if( $subDetails  ){
            $subDetails =    json_decode($subDetails, true);
            $subDatas = $subDetails['hits'];
        }   
        return view('user.edit', compact('users','subDatas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
      
        $users =  User::find($id);

        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'subscription' => 'required'
        );
        $validator = Validator::make($request::all(), $rules);
        if ($validator->fails())
          return \Redirect::to('user')->withErrors($validator);
        else{
            $users['name']  =  $request->get('name');
            $users['email']   =  $request->get('email');
            $users['subscription'] =  $request->get('subscription');
            $users->save();
        }
    }
}

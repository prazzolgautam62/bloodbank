<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Country;
use DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $country = Country::all();
        return view('admin.state',['countries'=>$country]);
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
    public function store(Request $request)
    {
        $state_data = array();
        $state_data['country_id']= $request->COUNTRY;
        $state_data['state_name']= $request->statename;

        $duplicate = State::where('state_name',$request->statename)->get();
        if(count($duplicate)>0){
            return redirect()->back()->with('error','State Already Exists!');
        }
        else{
            $res = State::insert($state_data);
            return redirect()->route('state')->with('message','State Created Successfully!');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $state =  DB::table('states as s')
        ->select('s.*','c.country_name')
        ->join('countries as c','c.country_id','=','s.country_id')
        ->orderBy('state_id','asc')->get();
        return view('admin.view-state',['states' => $state]);
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
       $state = State::where('state_id',$id);
       $state->delete();
       return redirect()->back()->with('error','State Successfully Deleted !');
    }
}

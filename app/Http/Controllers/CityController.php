<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = State::all();
        return view('admin.city',['states'=>$state]);
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
        $city_data = array();
        $city_data['city_name']= $request->cityname;
        $city_data['state_id']= $request->statename;
        $duplicate = City::where('city_name',$request->statename)->get();
        if(count($duplicate)>0){
            return redirect()->back()->with('error','City Already Exists!');
        }
        else{
            $res = City::insert($city_data);
            return redirect()->route('city')->with('message','City Created Successfully!');
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
        $city = DB::table('cities as c')
                    ->select('c.*','s.state_name')
                    ->join('states as s','s.state_id','c.state_id')
                    ->orderBy('city_id','asc')->get();

        return view('admin.view-city',['cities' => $city]);
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
        $city = City::where('city_id',$id);
        $city->delete();
        return redirect()->back()->with('error','City Successfully Deleted !');
    }
}

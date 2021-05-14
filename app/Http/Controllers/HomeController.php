<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\Area;
use DB;
use App\Messages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $state = State::all();
        $city = City::all();
        return view('admin.index',['states'=> $state, 'cities'=>$city]);
    }

    public function inbox(){

        $message = Messages::all();
        return view('admin.inbox',['messages'=>$message]);
    }

    public function viewMessage($id){

        $message = Messages::find($id);

        $message->read_status = 1;
        $message->update();

        return view('admin.view-message',['message'=>$message]);
    }
    public function viewArea(){

        $area = DB::table('areas as a')
                  ->select('a.*','s.state_name','c.city_name')
                  ->join('states as s','a.state_id','=','s.state_id')
                  ->join('cities as c','a.city_id','=','c.city_id')
                  ->get();
        return view('admin.view-area',['areas'=>$area]);
    }

    public function store(Request $request){

        $area_data = array();
        $area_data['state_id']= $request->state_id;
        $area_data['city_id']= $request->city_id;
        $area_data['area_name']= $request->areaname;
        $area_data['latitude']= $request->latitude;
        $area_data['longitude']= $request->longitude;

        $res = Area::insert($area_data);

        if($res){
            return redirect()->back()->with('message','Area Successfully Inserted !');
        }
    }

    public function destroy($id){
       $area_data = Area::where('area_id',$id);
       $area_data->delete();
       return redirect()->back()->with('error','Area Successfully Deleted !');
    }

    public function destroyMessage($id) {
        $message = Messages::find($id);
        $message->delete();

        return redirect()->route('inbox')->with('error','Message Successfully Deleted !');
    }
}

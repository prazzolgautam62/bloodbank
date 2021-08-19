<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodDonor;
use App\Country;
use App\State;
use App\City;
use Carbon\Carbon;
use App\Area;
use App\BloodRequests;
use DB;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function searchDonor(){
        return view('admin.admin-donor');
    }

    public function donorDetails($id){
        $object = DB::table('blood_donors as bd')
                     ->select('bd.*','s.state_name','c.country_name','a.area_name','ct.city_name')
                     ->join('states as s','s.state_id','=', 'bd.state_id')
                     ->join('countries as c','c.country_id','=', 'bd.country_id')
                     ->join('areas as a','a.area_id','=', 'bd.area_id')
                     ->join('cities as ct','ct.city_id','=', 'bd.city_id')
                     ->where('bd.donor_id',$id)
                     ->get()->first();
                 
        return view('admin.donor-details',['donor'=>$object]);
    }

    public function updateDate(Request $request, $id){

        $donor_update = array();
        $donor_update['last_donation_date'] = $request->last_donation_date;

        $res = DB::table('blood_donors')->where('donor_id',$id)->update($donor_update);

      return redirect()->back()->with('message','Blood Request Last Donation Date Updated Successfully');
    }

    public function donorStatus(Request $request, $id){
        $donor_update = array();
        $donor_update['status'] = $request->status;

        $res = DB::table('blood_donors')->where('donor_id',$id)->update($donor_update);

      return redirect()->back()->with('message','Blood Request Status Updated Successfully');
    }

    public function search(Request $request){
        $searchTerm = $request->text;

        $object = BloodDonor::query()
                        ->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('blood_group', 'LIKE', "%{$searchTerm}%")
                        ->where('status',1)
                        ->get();
        $status = "Search Results of Donors";
        return view('admin.donor',['donors'=>$object,'status'=>$status]);
    }
    public function activeDonors(){
        $donor = BloodDonor::where('status',1)->get();
        $status = "Active Donors Table";
        return view('admin.donor',['donors'=>$donor,'status'=>$status]);
    }
    public function inactiveDonors(){
        $donor = BloodDonor::where('status',0)->get();
        $status = "Not Active Donors Table";
        return view('admin.donor',['donors'=>$donor,'status'=>$status]);
    }

    public function editDonor($id){
        $object = DB::table('blood_donors as bd')
                     ->select('bd.*','s.state_name','c.country_name','a.area_name','ct.city_name')
                     ->join('states as s','s.state_id','=', 'bd.state_id')
                     ->join('countries as c','c.country_id','=', 'bd.country_id')
                     ->join('areas as a','a.area_id','=', 'bd.area_id')
                     ->join('cities as ct','ct.city_id','=', 'bd.city_id')
                     ->where('bd.donor_id',$id)
                     ->get()->first();
        $country = Country::all();
        $selected_country = Country::where('country_id',$object->country_id)->first();
        $state = State::all();
        $selected_state = State::where('state_id',$object->state_id)->first();
        $city = City::all();
        $selected_city = City::where('city_id',$object->city_id)->first();
        $area = Area::all();
        $selected_area = Area::where('area_id',$object->area_id)->first();
        return view('admin.edit-donor',['object'=>$object,'countries'=>$country,'selected_country'=>$selected_country,'states'=>$state,'selected_state'=>$selected_state,'cities'=>$city,'selected_city'=>$selected_city,'areas'=>$area,'selected_area'=>$selected_area]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bloodRequests()
    {
       $blood = BloodRequests::all();
       return view('admin.blood-requests',['requests'=>$blood]);
    }

    public function viewDetails($id){
       $data= DB::table('blood_requests as br')
                ->select('br.*','c.city_name')
                ->join('cities as c','br.city_id', '=', 'c.city_id')
                ->where('br.id',$id)->get()->first();

       return view('admin.bloodrequest-details',['request'=>$data]);
    }

    public function searchBloodRequest(Request $request){
        $searchTerm = $request->text;

        $object = BloodRequests::query()
                        ->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('blood_group', 'LIKE', "%{$searchTerm}%")
                        ->get();
        return view('admin.blood-requests',['requests'=>$object]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
      $object = BloodRequests::find($id);
      $object->status = $request->status;
      $object->completed_date = $request->completed_date;
      $object->update();

      return redirect()->back()->with('message','Blood Request Status Updated Successfully');
    }

    public function updateDonorDetails(Request $request, $id){

        $donor_data = array();
        $donor_data['name']= $request->name;
        $donor_data['fathers_name']= $request->fathers_name;
        $donor_data['gender']= $request->gender;
        $donor_data['dob']= Carbon::parse($request->dob);
        $donor_data['blood_group']= $request->blood_group;
        $donor_data['body_weight']= $request->body_weight;
        $donor_data['email']= $request->email;
        $donor_data['country_id']= $request->country;
        $donor_data['state_id']= $request->state;
        $donor_data['city_id']= $request->city;
        $donor_data['area_id']= $request->area;
        $donor_data['address']= $request->address;
        $donor_data['pincode']= $request->pincode;
        $donor_data['contact_1']= $request->contact_1;
        $donor_data['contact_2']= $request->contact_2;
        $donor_data['last_donation_date']= Carbon::parse($request->last_donation_date);
        $donor_data['status']= $request->status;

        $status = DB::table('blood_donors')->where('donor_id',$id)->update($donor_data);
        if($status){
            return redirect()->route('admin.donor.search')->with(['message'=> 'Donor DAta Successfully Updated!!']);
        }
        else{
            return redirect()->route('admin.donor.search')->with(['error'=> 'Error While Updating Donor DAta !!']);
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

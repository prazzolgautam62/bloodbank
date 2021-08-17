<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodDonor;
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

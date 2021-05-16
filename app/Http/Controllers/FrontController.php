<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use Carbon\Carbon;
use App\State;
use App\Country;
use App\City;
use App\Area;
use DB;
use App\BloodDonor;
use App\BloodRequests;

use Intervention\Image\Facades\Image as Image;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestBlood()
    {
         $city = City::all();
        return view('home.request-blood',['cities' => $city]);
    }

    public function sendRequest(Request $request){
       $request_array = array();
       $request_array['name'] = $request->name;
       $request_array['gender'] = $request->gender;
       $request_array['blood_group'] = $request->blood_group;
       $request_array['blood_unit'] = $request->blood_unit;
       $request_array['hospital'] = $request->hospital;
       $request_array['city_id'] = $request->city;
       $request_array['pincode'] = $request->pincode;
       $request_array['doctor_name'] = $request->doctor_name;
       $request_array['required_date'] = $request->required_date;
       $request_array['contact_name'] = $request->contact_name;
       $request_array['contact_address'] = $request->contact_address;
       $request_array['email'] = $request->email;
       $request_array['contact_no1'] = $request->contact_no1;
       $request_array['contact_no2'] = $request->contact_no2;
       $request_array['reason'] = $request->reason;

       if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '_donor.' .$extension;
            $img = Image::make($request->file('image'))->save('uploads/requests/'.$filename, 60);
        } else {
            $filename = "noimage.jpg";
        }


       $request_array['image'] = $filename;

       $status = BloodRequests::insert($request_array);
        if($status){
            return redirect()->route('front')->with('message','We have received your Blood Request. We will get back to you as soon as possible.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerDonor(Request $request)
    {

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
        $donor_data['voluntary']= $request->voluntary;
        $donor_data['voluntary_group']= $request->voluntary_group;
        $donor_data['last_donation_date']= Carbon::parse($request->last_donation_date);
        $donor_data['new_donor']= $request->new_donor;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '_donor.' .$extension;
            $img = Image::make($request->file('image'))->save('uploads/donors/'.$filename, 60);
        } else {
            $filename = "noimage.jpg";
        }

        $donor_data['image']= $filename;

        $status = BloodDonor::insert($donor_data);
        if($status){
            return redirect()->route('front')->with('message','Thank You!! You have been successfully registered as Blood Donor.');
        }
    }

    public function donorRegister(){
        $state = State::all();
        $country = Country::all();
        $city = City::all();
        $area = Area::all();

        return view('home.donor-registration',['states'=>$state, 'countries'=>$country, 'cities'=>$city, 'areas'=>$area]);
    }

    public function searchDonor(){
        $hospital = DB::table('hospital_details')->get();
        return view('home.search-donor',['hospitals'=>$hospital]);
    }

    public function donorSearch(Request $request){
        $hospital_id = $request->hospital_id;
        $blood_group = $request->blood_group;

        $hospital = DB::table('hospital_details')->where('id',$hospital_id)->get()->first();

        $latitude = floatval($hospital->latitude);
        $longitude = floatval($hospital->longitude);
        $radius = floatval($request->radius);


        //using haversine formula
        $area = Area::select('areas.*')
        ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
        ->havingRaw("distance < ?", [$radius])
        ->get()->first();
        if($area){
        $donors = DB::table('blood_donors')->where([['area_id',$area->area_id],['blood_group',$blood_group]])->get();
        
        }
        else{
            $donors=[];     
        }
         return view('home.search-results',['donors'=>$donors]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function sendMessage(Request $request){
       $message_data = array();
       $message_data['name'] = $request->name;
       $message_data['contact_no'] = $request->phone;
       $message_data['email'] = $request->email;
       $message_data['message'] = $request->message;
       $message_data['created_at'] = Carbon::now();


       $res = Messages::insert($message_data);
       return redirect()->route('front')->with('message','Your Message has been successfully sent.');

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

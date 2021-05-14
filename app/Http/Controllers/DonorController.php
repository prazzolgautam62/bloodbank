<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodDonor;
use App\BloodRequests;

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

    public function search($text){
        dd($text);
    }
    public function activeDonors(){
        $donor = BloodDonor::where('status',1)->get();
        $status = "Active";
        return view('admin.donor',['donors'=>$donor,'status'=>$status]);
    }
    public function inactiveDonors(){
        $donor = BloodDonor::where('status',0)->get();
        $status = "Not Active";
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
       return view('admin.blood-requests',['blood'=>$blood]);
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

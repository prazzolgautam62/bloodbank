<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HospitalDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql="
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Sushma Koirala Memorial (SKM) Hospital     ', 'Salambutar   ','Sankhu, Shankharapur Municipality, Ktm', '27.72366271100265' , '85.45250959446874');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Ayur Health Care & Diagnostic Centre       ', 'Satdobato-15 ','Lalitpur, Patan                       ', '27.65945         ' , '85.32456');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Bhawani Hospital Research Center           ', 'Birgunj      ','Parsa                                 ', '27.06118871388014' , '84.81904021648616');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Binaytara Foundation Cancer Center         ', 'Janakpurdham ','Dhanusha                              ', '26.16297702483289' , '85.26671602888543');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Birgunj Health Care Hospital               ', 'Birgunj      ','Parsa                                 ', '27.04443418548712' , '84.90028765992068');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES(' Chitwan Medical College Teaching Hospital  ', 'Bharatpur    ','Chitwan District                      ', '27.68573759820287' , '84.43054883072979');
        INSERT INTO `hospital_details`(name, address_1, address_2, longitude, latitude) VALUES('Advanced Poly Clinic(Pokhara)',             'Pani Pokhari    ',' Kathmandu                            ','28.222193468141537', '84.16159043460125');
        

        ";
        DB::unprepared($sql);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "
        INSERT INTO `cities` (`CITY_ID`, `STATE_ID`, `CITY_NAME`) VALUES
        (3, 1, 'Ariyalur'),
        (4, 1, 'Chennai'),
        (5, 1, 'Coimbatore'),
        (7, 1, 'Cuddalore'),
        (8, 1, 'Dharmapuri'),
        (9, 1, 'Dindigul'),
        (10, 1, 'Erode'),
        (11, 1, 'Kanchipuram'),
        (12, 1, 'Kanyakumari'),
        (13, 1, 'Karur'),
        (14, 1, 'Krishnagiri'),
        (15, 1, 'Madurai'),
        (16, 1, 'Nagapattinam'),
        (17, 1, 'Namakkal'),
        (18, 1, 'Nilgiris and Ooty'),
        (19, 1, 'Perambalur'),
        (20, 1, 'Pudukkottai'),
        (21, 1, 'Ramanathapuram'),
        (22, 1, 'Salem'),
        (23, 1, 'Sivaganga'),
        (24, 1, 'Thanjapur'),
        (25, 1, 'Theni'),
        (26, 1, 'Thoothukudi'),
        (27, 1, 'Tiruchirappalli'),
        (28, 1, 'Tirunelveli'),
        (29, 1, 'Tiruppur'),
        (30, 1, 'Tiruvallur'),
        (31, 1, 'Tiruvannamalai'),
        (32, 1, 'Tiruvarur'),
        (33, 1, 'Vellore'),
        (34, 1, 'Viluppuram'),
        (35, 1, 'Virudhunagar'),
        (36, 40, 'Mali'),
        (37, 37, 'Canada'),
        (38, 38, 'Kwait'),
        (39, 39, 'Malaysia & Brunei'),
        (40, 41, 'Nepal'),
        (41, 42, 'Oman'),
        (42, 43, 'Pakistan'),
        (43, 44, 'Qater'),
        (44, 45, 'Russia'),
        (45, 46, 'Saudi Arabia'),
        (48, 2, 'Kerala'),
        (49, 2, 'Alappuzha'),
        (50, 2, 'Alleppey'),
        (51, 2, 'Alwaye'),
        (52, 2, 'Bekal'),
        (53, 2, '  Fort Kochi'),
        (54, 2, 'Kochi'),
        (55, 2, 'Kollam'),
        (56, 2, 'Thrissur'),
        (57, 2, 'Ernakulam'),
        (58, 2, 'Kottayam'),
        (59, 2, 'Kovalam'),
        (60, 2, 'Kozikode'),
        (61, 2, 'Kumarakom'),
        (62, 2, 'Malampuzha'),
        (63, 2, 'Munnar'),
        (64, 2, 'Palakkad'),
        (65, 2, 'Pathanamthitta'),
        (66, 2, 'Thoppumpaddy'),
        (67, 2, 'Ponnani'),
        (68, 2, 'Punalur'),
        (69, 2, 'Thalassery'),
        (70, 2, 'Thekkady'),
        (71, 2, 'Thiruvananthapuram'),
        (72, 2, 'Thrippunithura'),
        (73, 2, 'Varkala'),
        (74, 2, 'Perinthalamanna');
       ";



        DB::unprepared($sql);
    }
}

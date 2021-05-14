<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "
        INSERT INTO `countries` (`COUNTRY_ID`, `COUNTRY_NAME`) VALUES
        (1, 'India'),
        (2, 'Saudi Arabia'),
        (4, 'Kwait'),
        (5, 'Qatar'),
        (6, 'Singapore'),
        (7, 'Russia'),
        (8, 'Pakistan'),
        (9, 'Bangladesh'),
        (10, 'Nepal'),
        (11, 'Mali'),
        (12, 'Malaysia & Brunei'),
        (13, 'Canada');";

        DB::unprepared($sql);
    }
}

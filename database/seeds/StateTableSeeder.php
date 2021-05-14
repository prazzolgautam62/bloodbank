<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = "
        INSERT INTO `states` (`STATE_ID`, `STATE_NAME`, `COUNTRY_ID`) VALUES
        (1, 'Tamilnadu', 1),
        (2, 'Kerala', 1),
        (3, 'Andra Pradesh', 1),
        (4, 'Arunacha Pradesh', 1),
        (5, 'Assam', 1),
        (6, 'Bihar', 1),
        (7, 'Chhattisgarh', 1),
        (8, 'Goa', 1),
        (9, 'Gujarat', 1),
        (10, 'Haryana', 1),
        (11, 'Himachal Pradesh', 1),
        (12, 'Jammu And Kashmir', 1),
        (13, 'Jharkhand', 1),
        (14, 'Karnataka', 1),
        (15, 'Madya Pradesh', 1),
        (16, 'Maharashtra', 1),
        (17, 'Manipur', 1),
        (18, 'Meghalaya', 1),
        (19, 'Mizoram', 1),
        (20, 'Nagaland', 1),
        (21, 'Orissa', 1),
        (22, 'Punjab', 1),
        (23, 'Rajasthan', 1),
        (24, 'sikkim', 1),
        (25, 'Tripura', 1),
        (26, 'Uttaranchal', 1),
        (27, 'Utter Pradesh', 1),
        (28, 'West Bengal', 1),
        (29, 'Andaman and Nicobar Islands', 1),
        (30, 'Chandigarh ', 1),
        (31, 'Daddy and Nagar Haveli', 1),
        (32, 'Daman and Diu', 1),
        (33, 'Delhi', 1),
        (34, 'Lakshadweep', 1),
        (35, 'Puducherry', 1),
        (36, 'Telangana', 1),
        (37, 'Canada', 12),
        (38, 'Kwait', 4),
        (39, 'Malaysia & Brunei', 12),
        (40, 'Mali', 11),
        (41, 'Nepal', 10),
        (42, 'Oman', 9),
        (43, 'Pakistan', 8),
        (44, 'Russia', 7),
        (45, 'Saudi Arabia', 2),
        (46, 'Singapore', 6);

        ";
        DB::unprepared($sql);
    }
}

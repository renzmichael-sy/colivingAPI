<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
          ['category_id' => 1,'name' => 'Food', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 1,'name' => 'Toiletries', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 1,'name' => 'Pet Supplies', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 2,'name' => 'Delivery', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 2,'name' => 'Take-out', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 2,'name' => 'Restaurant', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 3,'name' => 'Water', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 3,'name' => 'Electricity', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 3,'name' => 'Gas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 3,'name' => 'Internet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 3,'name' => 'Telephone', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 3,'name' => 'Cellphone Line', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 4,'name' => 'Repair', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 4,'name' => 'Registration', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 4,'name' => 'Inspection', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 4,'name' => 'Road Tax', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 4,'name' => 'Car Repair', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 5,'name' => 'Plane Ticket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 5,'name' => 'Hotel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 5,'name' => 'Attraction Ticket', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 5,'name' => 'Souvenirs', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 6,'name' => 'Tuition Fee', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 6,'name' => 'School Supplies', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 6,'name' => 'Other Fees', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 7,'name' => 'House Insurance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 7,'name' => 'Car Insurance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 7,'name' => 'Health Insurance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 7,'name' => 'Pet Insurance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 8,'name' => 'Entertainment Subscription', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 8,'name' => 'Magazine Subscription', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['category_id' => 9,'name' => 'Car Loan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['category_id' => 9,'name' => 'Cash Loan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);
    }
}

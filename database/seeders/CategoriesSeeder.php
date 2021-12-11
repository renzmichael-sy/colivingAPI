<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          ['name' => 'Grocery', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Food', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Utilities', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Transportation', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Rent/Mortgage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

          ['name' => 'Travel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Education', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Insurance', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Monthly Subscriptions', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Loans', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}

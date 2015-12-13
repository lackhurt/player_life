<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        DB::selectCollection('users')->drop();
        DB::selectCollection('users')->insert([
            "_id" => new \MongoId("55f03d896803fa7b048b4568"),
            "birthday" => false,
            "birthplace_city" => "抚顺",
            "birthplace_province" => "辽宁",
            "gender" => "male",
            "location_city" => "抚顺",
            "location_province" => "辽宁",
            "nickname" => "test nick name",
            "password" => '$2y$10$B4ADk9bJi2oiJA5PNZ0uhu/Qufc8dF8MlNXIS0iFrhcYzkfhn/B5S',
            "phone" => "13333333333"
        ]);
	}
}

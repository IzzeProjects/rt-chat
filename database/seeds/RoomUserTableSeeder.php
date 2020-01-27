<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_user')->insert([
            'room_id' => 1,
            'user_id' => 1,
        ]);
    }
}

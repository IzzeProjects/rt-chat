<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Создание тестового пользователя
         */
        $testUser = DB::table('users')->where('email', 'test@test.ru')->first();
        if (empty($testUser)) {
            DB::table('users')->insert([
                'name' => 'test',
                'email' => 'test@test.ru',
                'password' => bcrypt('123123123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

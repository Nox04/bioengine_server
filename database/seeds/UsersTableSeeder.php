<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name'      => 'Juan David Angarita',
            'email'     => 'juan.angarita.11@gmail.com',
            'phone'     => '3168819879',
            'token'     => '678Tppydk732dq48pxj834kf3',
        ]);
    }
}

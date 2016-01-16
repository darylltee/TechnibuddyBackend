<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class techniusertestusers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('techniusers')->delete();

        $users = array(
                ['username' => 'ryanchenkie', 'email' => 'ryanchenkie@gmail.com', 'password' => Hash::make('secret')],
                ['username' => 'budidis', 'email' => 'budidis@gmail.com', 'password' => Hash::make('password')],
              
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
		
    }
}

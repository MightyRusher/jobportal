<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role_employer = new Role();
        $role_employer->name = "employer";
        $role_employer->description = "A Employer User";
        $role_employer->save();

        $role_seeker = new Role();
        $role_seeker->name = "seeker";
        $role_seeker->description = "A Seeker User";
        $role_seeker->save();

    }
}

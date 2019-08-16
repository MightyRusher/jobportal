<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_seeker = Role::where("name", "seeker")->first();
        $role_employer  = Role::where("name", "employer")->first();

        $seeker = new User();
        $seeker->name = "Seeker Name";
        $seeker->email = "seeker@example.com";
        $seeker->password = bcrypt("secret");
        $seeker->save();
        $seeker->roles()->attach($role_seeker);
        $employer = new User();
        $employer->name = "employer Name";
        $employer->email = "employer@example.com";
        $employer->password = bcrypt("secret");
        $employer->save();
        $employer->roles()->attach($role_employer);
    }
}

<?php

use Illuminate\Database\Seeder;

//use HasRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      App\User::create([
                  'name' => "Admin",
                  'avatar' => $faker->imageurl($width = 50, $height = 50),
                  'email' => "admin@example.com",
                  'logo' => $faker->imageurl($width = 50, $height = 50),
                  'company' => $faker->company,
                  'certificate' => $faker->ean13,
                  'password' => bcrypt("admin"),
              ]);
      App\User::create([
                  'name' => "Guest",
                  'avatar' => $faker->imageurl($width = 50, $height = 50),
                  'email' => "guest@example.com",
                  'logo' => $faker->imageurl($width = 50, $height = 50),
                  'company' => $faker->company,
                  'certificate' => $faker->ean13,
                  'password' => bcrypt("guest"),
              ]);

      $admin = new App\Role();
      $admin->name = "admin";
      $admin->display_name = "admin role";
      $admin->description = "Has all rights";
      $admin->save();

      $guest = new App\Role();
      $guest->name = "Guest";
      $guest->display_name = "guest role";
      $guest->description = "Has view rights";
      $guest->save();

      $admin = App\Role::find(1);
      $user = App\User::find(1);
      $guest = App\Role::find(2);
      $guestUser = App\User::find(2);
      $user->attachRole($admin);
      $guestUser->attachRole($guest);

      $adminPermissions = new App\Permission();
      $adminPermissions->name = 'adminPermissions';
	  $adminPermissions->display_name = 'admin permissions';
	  $adminPermissions->description = 'All rights';
	  $adminPermissions->save();
	
	  $guestPermissions = new App\Permission();
      $guestPermissions->name = 'guestPermissions';
	  $guestPermissions->display_name = 'guest permissions';
	  $guestPermissions->description = 'Some rights';
	  $guestPermissions->save();
	  
	  $admin->attachPermission($adminPermissions);

      for($i = 0; $i < 10; $i++) {
          App\User::create([
              'name' => $faker->name,
              'avatar' => $faker->imageurl($width = 50, $height = 50),
              'email' => $faker->email,
              'logo' => $faker->imageurl($width = 50, $height = 50),
              'company' => $faker->company,
              'certificate' => $faker->ean13,
              'password' => bcrypt($faker->password),
          ]);
      }
    }
}

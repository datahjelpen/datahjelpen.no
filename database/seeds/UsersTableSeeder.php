<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Bjørnar Hagen',
            'email' => 'b@datahjelpen.no',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'verified' => true,
            'agree_tos' => true,
            'agree_tos_latest' => Carbon::now()->toDateTimeString(),
        ]);

        $user->assignRole('superadmin');
        $user->assignRole('admin');
        $user->assignRole('author');
        // $user->assignRole('user_vl1');
        // $user->assignRole('user');

        factory(User::class, 20)->create();
        // factory(App\User::class, 50)->create()->each(function ($u) {
        //    $u->posts()->save(factory(App\Post::class)->make());
        // });
    }
}

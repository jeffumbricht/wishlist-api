<?php

use Illuminate\Database\Seeder;
use App\User;
use App\WishlistItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($u) {
            factory(WishlistItem::class, 5)->create(['user_id' => $u->id]);
        });
    }
}

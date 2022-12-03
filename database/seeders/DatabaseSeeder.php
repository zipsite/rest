<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\TypeAccess;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        TypeAccess::create(['name' => 'ssh_key']);
        TypeAccess::create(['name' => 'user_password']);
        User::create(['name' => 'ООО ВОТЕЛ']);
        Access::create([
            'user_id' => 1,
            'type_id' => 1,
            'data' => "Здесь будет ssh_key"
        ]);
        Access::create([
            'user_id' => 1,
            'type_id' => 2,
            'data' => "Здесь будет пароль"
        ]);
    }
}

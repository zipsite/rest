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
        TypeAccess::create([
            'name' => 'ssh_key',
            'struct' => json_encode([
                'host' => '',
                'user' => '',
                'key' => [
                    'type' => '',
                    'value' => ''
                ]
            ])
        ]);
        TypeAccess::create([
            'name' => 'user_password',
            'struct' => json_encode([
                'url' => '',
                'steps' => ''
            ])
        ]);
        User::create(['name' => 'ООО ВОТЕЛ']);
        Access::create([
            'name' => 'админка сервера',
            'user_id' => 1,
            'type_id' => 1,
            'data' => TypeAccess::find(1)->struct
        ]);
        Access::create([
            'name' => 'билайн бизнесс',
            'user_id' => 1,
            'type_id' => 2,
            'data' => TypeAccess::find(2)->struct
        ]);
    }
}

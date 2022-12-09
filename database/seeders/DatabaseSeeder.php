<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\AccessSample;
use App\Models\AccessType;
use App\Models\Client;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Client::create(['name' => 'ООО ВОТЕЛ']);
        AccessType::create([
            'name' => 'ssh',
            'data' => json_encode([
                ['name' => 'host', 'type' => 'ifstring', 'condition' => '/((\d{1,3}\.){3}\d{1,3}|(\w+\.)*\w):\d{1,5}/'],
                ['name' => 'user', 'type' => 'string', 'edit' => true],
                [
                    'name' => 'key',
                    'type' => 'object',
                    'contained' => [
                        ['name' => 'type', 'type' => 'enum', 'edit' => true, 'variants' => ['rsa', 'id545']],
                        ['name' => 'value', 'type' => 'string', 'edit' => true]
                    ]
                ]
            ]),
        ]);
        AccessSample::create([
            'name' => 'server csl',
            'type_id' => 1,
            'data' => json_encode([
                'host' => 'vsl.com:444',
                'user' => '',
                'key' => [
                    'type' => '',
                    'value' => ''
                ]
            ])
        ]);
        Access::create([
            'name' => 'admin_server',
            'sample_id' => 1,
            'client_id' => 1,
            'data' => json_encode([
                'user' => 'user',
                'type' => 'rsa',
                'value' => '*some key*'
            ])
        ]);
    }
}
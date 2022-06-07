<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    private array $data;
    private string $permissions = '{"platform.systems.roles":true,"platform.systems.users":true,"platform.systems.attachment":true,"platform.index":true}';

    public function __construct ()
    {
        $this->data = [
            "name" => "admin", "email" => "admin@gmail.com", "password" => bcrypt( "secretPassword" ), "permissions" => $this->permissions,

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        User::query()->insert($this->data);
    }

}

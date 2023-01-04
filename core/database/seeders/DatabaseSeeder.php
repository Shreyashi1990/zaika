<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use App\Models\Themes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        update_static_option('get_script_version','1.0.1');
    }
}

<?php

namespace Database\Seeders\Tenant;

use App\Jobs\PlaceOrderMailJob;
use App\Jobs\TenantCredentialJob;
use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminSeed extends Seeder
{
    public static function run()
    {

        $raw_pass = '12345678';
        $admin = Admin::create([
            'name' => 'Test User',
            'username' => 'super_admin',
            'email' => 'test@test.com',
            'password' => Hash::make($raw_pass),
            'image' => 11
        ]);

        $admin->assignRole('Super Admin');
    }
}

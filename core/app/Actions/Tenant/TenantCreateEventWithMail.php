<?php

namespace App\Actions\Tenant;

use App\Events\TenantRegisterEvent;
use App\Mail\TenantCredentialMail;
use App\Models\PaymentLogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TenantCreateEventWithMail
{
    public static function tenant_create_event_with_credential_mail($user, $subdomain)
    {
            event(new TenantRegisterEvent($user, $subdomain));
            try {
                $raw_pass = '12345678';
                $credential_password = $raw_pass;
                $credential_email = $user->email;
                $credential_username = 'super_admin';

                Mail::to($credential_email)->send(new TenantCredentialMail($credential_username, $credential_password));

                return true;
            } catch (\Exception $e) {}
    }
}

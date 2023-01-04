<?php

namespace Database\Seeders\Tenant\ModuleData;

use App\Models\FormBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormBuilderSeed extends Seeder
{
    public static function execute()
    {
        DB::statement("INSERT INTO `form_builders` (`id`, `title`, `email`, `button_text`, `fields`, `success_message`, `created_at`, `updated_at`)
VALUES
	(1,'Contact','kotysegoly@mailinator.com','Send Message','{\"success_message\":\"Thanx for your message\",\"field_type\":[\"text\",\"text\",\"email\",\"text\",\"file\",\"textarea\"],\"field_name\":[\"name\",\"subject\",\"email\",\"call\",\"file\",\"message\"],\"field_placeholder\":[\"Your Name\",\"Subjet\",\"Email\",\"Talephone\",\"File\",\"Message\"],\"field_required\":[\"on\"],\"mimes_type\":{\"4\":\"mimes:jpg,jpeg,png\"}}','Thanx for your message','2022-08-31 05:02:00','2022-08-31 10:07:03')");
    }
}

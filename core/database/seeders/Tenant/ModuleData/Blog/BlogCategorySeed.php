<?php

namespace Database\Seeders\Tenant\ModuleData\Blog;

use App\Helpers\ImageDataSeedingHelper;
use App\Helpers\SanitizeInput;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Blog\Entities\Blog;

class BlogCategorySeed
{

    public static function run()
    {
        DB::statement("INSERT INTO `blog_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
	(1,'{\"en_US\":\"Away\",\"ar\":\"\\u062c\\u0648\\u0644\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0645\"}','1','2022-08-30 11:04:23','2022-08-30 11:06:39'),
	(2,'{\"en_US\":\"Travell\",\"ar\":\"\\u062c\\u0648\\u0644\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628\"}','1','2022-08-30 11:04:38','2022-08-30 11:06:19'),
	(3,'{\"en_US\":\"Office Tour\",\"ar\":\"\\u062c\\u0648\\u0644\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628\"}','1','2022-08-30 11:04:43','2022-08-30 11:06:16'),
	(4,'{\"en_US\":\"Vacation\",\"ar\":\"\\u062c\\u0648\\u0644\\u0629 \\u0641\\u064a \\u0627\\u0644\\u0645\\u0643\\u062a\\u0628\"}','1','2022-08-30 11:04:48','2022-08-30 11:06:02'),
	(5,'{\"en_US\":\"Winter\",\"ar\":\"\\u0627\\u0644\\u0634\\u062a\\u0627\\u0621\"}','1','2022-08-30 11:05:01','2022-08-30 11:05:33')");
    }



}

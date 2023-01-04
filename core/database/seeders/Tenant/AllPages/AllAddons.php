<?php

namespace Database\Seeders\Tenant\AllPages;

use App\Models\Page;
use App\Models\PageBuilder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AllAddons
{

    public static function execute()
    {
        $data = file_get_contents('assets/tenant/page-layout/demo-data.json');
        $all_data_decoded = json_decode($data);

        foreach ($all_data_decoded as $item){
            foreach ($item as $more){
                PageBuilder::create([
                    'addon_name' => $more->addon_name,
                    'addon_type' => $more->addon_type,
                    'addon_location' => $more->addon_location,
                    'addon_order' => $more->addon_order,
                    'addon_page_id' => $more->addon_page_id,
                    'addon_page_type' => $more->addon_page_type,
                    'addon_settings' => $more->addon_settings,
                    'addon_namespace' => $more->addon_namespace,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

        }

    }



}

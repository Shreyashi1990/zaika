<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Helpers\LanguageHelper;
use App\Helpers\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Themes;
use App\Models\TopbarInfo;
use Illuminate\Http\Request;

class OtherSettingsController extends Controller
{
    public function other_settings_page()
    {
        return view('tenant.admin.pages.other-settings');
    }

    public function update_other_settings(Request $request)
    {
        foreach (LanguageHelper::all_languages() as $lang){

            $fields = [
                'home_one_header_button_'.$lang->slug.'_text'  => 'nullable|string',
                'home_one_header_button_'.$lang->slug.'_url' => 'nullable|string',

                'home_two_header_button_'.$lang->slug.'_text' => 'nullable|string',
                'home_two_header_button_'.$lang->slug.'_url' => 'nullable|string',

                'home_three_header_button_'.$lang->slug.'_text' => 'nullable|string',
                'home_three_header_button_'.$lang->slug.'_url' => 'nullable|string',

                'home_four_header_button_'.$lang->slug.'_text' => 'nullable|string',
                'home_four_header_button_'.$lang->slug.'_url' => 'nullable|string',

                'home_five_header_button_'.$lang->slug.'_text' => 'nullable|string',
                'home_five_header_button_'.$lang->slug.'_url' => 'nullable|string',

                'home_six_header_button_'.$lang->slug.'_text' => 'nullable|string',
                'home_six_header_button_'.$lang->slug.'_url' => 'nullable|string',
            ];

            $this->validate($request,$fields);

            foreach ($fields as $field_name => $rules){
                update_static_option($field_name,$request->$field_name);
            }
        }

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function theme_settings()
    {
        $all_themes = Themes::where('status',1)->get();
        return view('tenant.admin.pages.theme-settings',compact('all_themes'));
     }

    public function update_theme_settings(Request $request)
    {

        $request->validate([
            'tenant_default_theme' => 'nullable'
        ]);

        update_static_option('tenant_default_theme',$request->tenant_default_theme);

        return response()->success(ResponseMessage::SettingsSaved());
    }

}

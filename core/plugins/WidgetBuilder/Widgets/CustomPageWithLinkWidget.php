<?php

namespace Plugins\WidgetBuilder\Widgets;


use App\Facades\GlobalLanguage;
use App\Helpers\LanguageHelper;
use App\Models\Language;
use App\Models\Widgets;
use Modules\Blog\Entities\BlogCategory;
use Plugins\PageBuilder\Fields\Number;
use Plugins\PageBuilder\Fields\Repeater;
use Plugins\PageBuilder\Fields\Select;
use Plugins\PageBuilder\Fields\Text;
use Plugins\PageBuilder\Fields\Textarea;
use Plugins\PageBuilder\Helpers\RepeaterField;
use Plugins\WidgetBuilder\WidgetBase;
use Mews\Purifier\Facades\Purifier;
use App\Helpers\SanitizeInput;

class CustomPageWithLinkWidget extends WidgetBase
{
    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();

        $widget_saved_values = $this->get_settings();
        $output .= $this->admin_language_tab();
        $output .= $this->admin_language_tab_start();

        $all_languages = GlobalLanguage::all_languages();

        foreach ($all_languages as $key => $lang) {
            $output .= $this->admin_language_tab_content_start([
                'class' => $key == 0 ? 'tab-pane fade show active' : 'tab-pane fade',
                'id' => "nav-home-" . $lang->slug
            ]);
            $output .= Text::get([
                'name' => 'title_'.$lang->slug,
                'label' => __('Title'),
                'value' => $widget_saved_values['title_'.$lang->slug] ?? null
            ]);

            $output .= $this->admin_language_tab_content_end();
        }
        $output .= $this->admin_language_tab_end();




        //repeater
        $output .= Repeater::get([
            'settings' => $widget_saved_values,
            'id' => 'footer_custom_page_with_link',
            'multi_lang' => true,
            'fields' => [
                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title',
                    'label' => __('Title')
                ],

                [
                    'type' => RepeaterField::TEXT,
                    'name' => 'repeater_title_url',
                    'label' => __('Title URL')
                ],
            ]
        ]);


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }


    public function enable(): bool
    {
        return is_null(tenant()); // TODO: Change the autogenerated stub
    }

    public function frontend_render()
    {
        $user_selected_language = get_user_lang();
        $widget_saved_values = $this->get_settings();
        $title = $widget_saved_values['title_' . $user_selected_language] ?? '';
        $repeater_data = $widget_saved_values['footer_custom_page_with_link'] ?? [];

   $repeater_markup = '';
    foreach ($repeater_data['repeater_title_url_'.$user_selected_language] as $key => $url){
        $r_title_url = $url ?? '';
        $r_title = $repeater_data['repeater_title_'.$user_selected_language][$key] ?? '';

$repeater_markup.= <<<SOCIALITEM
     <li  class="listItem wow fadeInUp" data-wow-delay="0.1s"><a class="singleLinks" href="{$r_title_url}">{$r_title}</a></li>
SOCIALITEM;

}

return <<<HTML
 <div class="col-xxl-2 col-xl-2 col-lg-6 col-md-6 col-sm-6">
        <div class="footer-widget widget  mb-24">
            <div class="footer-tittle">
                <h4 class="footerTittle">{$title}</h4>
                <ul class="listing">
                    {$repeater_markup}
                </ul>
            </div>
        </div>
    </div>
HTML;
}

    public function widget_title(){
        return __('Custom Page Link');
    }

}

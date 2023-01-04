<?php


namespace Plugins\PageBuilder;

use App\Models\PageBuilder;
use Plugins\PageBuilder\Addons\Landlord\About\AboutUs;
use Plugins\PageBuilder\Addons\Landlord\About\CountArea;
use Plugins\PageBuilder\Addons\Landlord\Common\Brand;
use Plugins\PageBuilder\Addons\Landlord\Common\ContactArea;
use Plugins\PageBuilder\Addons\Landlord\Common\ContactCards;
use Plugins\PageBuilder\Addons\Landlord\Common\FaqOne;
use Plugins\PageBuilder\Addons\Landlord\Common\Newsletter;
use Plugins\PageBuilder\Addons\Landlord\Common\PricePlan;
use Plugins\PageBuilder\Addons\Landlord\Common\TeamMemberOne;
use Plugins\PageBuilder\Addons\Landlord\Common\TemplateDesign;
use Plugins\PageBuilder\Addons\Landlord\Common\TestimonialOne;
use Plugins\PageBuilder\Addons\Landlord\Common\WhyChooseUs;
use Plugins\PageBuilder\Addons\Landlord\Home\HeaderStyleOne;
use Plugins\PageBuilder\Addons\Tenants\Common\about\AboutUsOne;
use Plugins\PageBuilder\Addons\Tenants\Common\about\MissionAreaOne;
use Plugins\PageBuilder\Addons\Tenants\Common\contact\ContactAreaOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\BlogOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\BrandOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\BrandTwo;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\FaqThree;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\FaqTwo;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\ImageGalleryOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\PortfolioOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\ServiceOne;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\TeamMemberTwo;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\TestimonialFive;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\TestimonialFour;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\TestimonialThree;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\TestimonialTwo;
use Plugins\PageBuilder\Addons\Tenants\Common\misc\VideoGalleryOne;
use Plugins\PageBuilder\Addons\Tenants\Donation\AboutDonation;
use Plugins\PageBuilder\Addons\Tenants\Donation\BlogSliderOne;
use Plugins\PageBuilder\Addons\Tenants\Donation\DonationActivities;
use Plugins\PageBuilder\Addons\Tenants\Donation\DonationContactArea;
use Plugins\PageBuilder\Addons\Tenants\Donation\DonationTestimonial;
use Plugins\PageBuilder\Addons\Tenants\Donation\DonationWithFilter;
use Plugins\PageBuilder\Addons\Tenants\Donation\HeaderOne;
use Plugins\PageBuilder\Addons\Tenants\Donation\RecentCampaign;
use Plugins\PageBuilder\Addons\Tenants\Donation\ServiceDonation;
use Plugins\PageBuilder\Addons\Tenants\Event\AboutEventOne;
use Plugins\PageBuilder\Addons\Tenants\Event\EventCounterupOne;
use Plugins\PageBuilder\Addons\Tenants\Event\EventSliderOne;
use Plugins\PageBuilder\Addons\Tenants\Event\EventSpeakers;
use Plugins\PageBuilder\Addons\Tenants\Event\EventSubscribeNewsletter;
use Plugins\PageBuilder\Addons\Tenants\Event\EventTestimonial;
use Plugins\PageBuilder\Addons\Tenants\Event\EventWithFilter;
use Plugins\PageBuilder\Addons\Tenants\Event\HeaderTwo;
use Plugins\PageBuilder\Addons\Tenants\Job\AboutJobOne;
use Plugins\PageBuilder\Addons\Tenants\Job\BlogSliderTwo;
use Plugins\PageBuilder\Addons\Tenants\Job\HeaderThree;
use Plugins\PageBuilder\Addons\Tenants\Job\JobCategory;
use Plugins\PageBuilder\Addons\Tenants\Job\JobCircular;
use Plugins\PageBuilder\Addons\Tenants\Job\JobSubscribeNewsletter;
use Plugins\PageBuilder\Addons\Tenants\Job\JobWithFilter;
use Plugins\PageBuilder\Addons\Tenants\Knowledgebase\AboutKnowledgebaseOne;
use Plugins\PageBuilder\Addons\Tenants\Knowledgebase\HeaderFour;
use Plugins\PageBuilder\Addons\Tenants\Knowledgebase\Knowledgebase;
use Plugins\PageBuilder\Addons\Tenants\Ticket\AboutTicket;
use Plugins\PageBuilder\Addons\Tenants\Ticket\HeaderFive;
use Plugins\PageBuilder\Addons\Tenants\Ticket\TicketContactArea;
use Plugins\PageBuilder\Addons\Tenants\Ticket\WhyChooseArea;

use Plugins\PageBuilder\Addons\Landlord\Common\OnlyImage;
use Plugins\PageBuilder\Addons\Landlord\Common\TextEditor;
use Plugins\PageBuilder\Addons\Landlord\Common\RawHtml;


class PageBuilderSetup
{

    private static function registerd_widgets(): array
    {
        //check module wise widget by set condition
        return [
            //Admin Register
            HeaderStyleOne::class,
            Brand::class,
            WhyChooseUs::class,
            TemplateDesign::class,
            PricePlan::class,
            TestimonialOne::class,
            FaqOne::class,
            Newsletter::class,
            AboutUs::class,
            CountArea::class,
            TeamMemberOne::class,
            ContactCards::class,
            ContactArea::class,

            //Tenant
            ContactAreaOne::class,
            AboutUsOne::class,
            \Plugins\PageBuilder\Addons\Tenants\Common\misc\TeamMemberOne::class,
            MissionAreaOne::class,
            \Plugins\PageBuilder\Addons\Tenants\Common\misc\TestimonialOne::class,
            BrandOne::class,
            \Plugins\PageBuilder\Addons\Tenants\Common\misc\FaqOne::class,
            ImageGalleryOne::class,
            VideoGalleryOne::class,
            TeamMemberTwo::class,
            TestimonialTwo::class,
            PortfolioOne::class,
            BlogOne::class,
            ServiceOne::class,

           //extra addon of landlord
            OnlyImage::class,
            TextEditor::class,
            RawHtml::class,

            HeaderOne::class,
            BrandTwo::class,
            RecentCampaign::class,
            AboutDonation::class,
            ServiceDonation::class,
            DonationActivities::class,
            DonationTestimonial::class,
            BlogSliderOne::class,
            DonationWithFilter::class,
            HeaderTwo::class,
            DonationContactArea::class,
            EventSliderOne::class,
            AboutEventOne::class,
            EventCounterupOne::class,
            EventSpeakers::class,
            EventTestimonial::class,
            EventSubscribeNewsletter::class,
            EventWithFilter::class,
            HeaderThree::class,
            JobCategory::class,
            AboutJobOne::class,
            JobCircular::class,
            TestimonialThree::class,
            BlogSliderTwo::class,
            JobSubscribeNewsletter::class,
            JobWithFilter::class,
            HeaderFour::class,
            Knowledgebase::class,
            AboutKnowledgebaseOne::class,
            TestimonialFour::class,
            FaqTwo::class,
            HeaderFive::class,
            WhyChooseArea::class,
            AboutTicket::class,
            TestimonialFive::class,
            FaqThree::class,
            TicketContactArea::class
        ];
    }

    public static function get_tenant_admin_panel_widgets(): string
    {
        $widgets_markup = '';
        $widget_list = self::tenant_registerd_widgets();

        foreach ($widget_list as $widget){



            try {
                $widget_instance = new  $widget();
            }catch (\Exception $e){
                $msg = $e->getMessage();
                throw new \ErrorException($msg);
            }
            if ($widget_instance->enable()){
                $widgets_markup .= self::render_admin_addon_item([
                    'addon_name' => $widget_instance->addon_name(),
                    'addon_namespace' => $widget_instance->addon_namespace(), // new added
                    'addon_title' => $widget_instance->addon_title(),
                    'preview_image' => $widget_instance->get_preview_image($widget_instance->preview_image())
                ]);
            }

        }
        return $widgets_markup;
    }
    public static function get_admin_panel_widgets(): string
    {
        $widgets_markup = '';
        $widget_list = self::registerd_widgets();
        foreach ($widget_list as $widget){
            try {
                $widget_instance = new  $widget();
            }catch (\Exception $e){
                $msg = $e->getMessage();
                throw new \ErrorException($msg);
            }
            if ($widget_instance->enable()){
                $widgets_markup .= self::render_admin_addon_item([
                    'addon_name' => $widget_instance->addon_name(),
                    'addon_namespace' => $widget_instance->addon_namespace(), // new added
                    'addon_title' => $widget_instance->addon_title(),
                    'preview_image' => $widget_instance->get_preview_image($widget_instance->preview_image())
                ]);
            }

        }
        return $widgets_markup;
    }

    private static function render_admin_addon_item($args): string
    {
        return '<li class="ui-state-default widget-handler" data-name="'.$args['addon_name'].'" data-namespace="'.base64_encode($args['addon_namespace']).'" >
                    <h4 class="top-part"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.$args['addon_title'].$args['preview_image'].'</h4>
                </li>';
    }
    public static function render_widgets_by_name_for_admin($args){
        $widget_class = $args['namespace'];

        $instance = new $widget_class($args);
        if ($instance->enable()){
            return $instance->admin_render();
        }
    }

    public static function render_widgets_by_name_for_frontend($args){
        $widget_class = $args['namespace'];
        $instance = new $widget_class($args);

        if ($instance->enable()){
            return $instance->frontend_render();
        }
    }

    public static function render_frontend_pagebuilder_content_by_location($location): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_location' => $location])->orderBy('addon_order', 'ASC')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_frontend([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'location' => $location,
                'id' => $widget->id,
                'column' => $args['column'] ?? false
            ]);
        }
        return $output;
    }

    public static function get_saved_addons_by_location($location): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_location' => $location])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_admin([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'id' => $widget->id,
                'type' => 'update',
                'order' => $widget->addon_order,
                'page_type' => $widget->addon_page_type,
                'page_id' => $widget->addon_page_id,
                'location' => $widget->addon_location
            ]);
        }

        return $output;
    }
    public static function get_saved_addons_for_dynamic_page($page_type,$page_id): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_page_type' => $page_type,'addon_page_id' => $page_id])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_admin([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'id' => $widget->id,
                'type' => 'update',
                'order' => $widget->addon_order,
                'page_type' => $widget->addon_page_type,
                'page_id' => $widget->addon_page_id,
                'location' => $widget->addon_location
            ]);
        }

        return $output;
    }
    public static function render_frontend_pagebuilder_content_for_dynamic_page($page_type,$page_id): string
    {
        $output = '';
        $all_widgets = PageBuilder::where(['addon_page_type' => $page_type,'addon_page_id' => $page_id])->orderBy('addon_order','asc')->get();
        foreach ($all_widgets as $widget) {
            $output .= self::render_widgets_by_name_for_frontend([
                'name' => $widget->addon_name,
                'namespace' => $widget->addon_namespace,
                'id' => $widget->id,
                'column' => $args['column'] ?? false
            ]);
        }
        return $output;
    }
}

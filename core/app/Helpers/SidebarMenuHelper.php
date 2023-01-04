<?php


namespace App\Helpers;


use App\Models\PaymentLogs;
use App\Models\PricePlan;
use App\Models\User;
use function __;

class SidebarMenuHelper
{

    public function render_sidebar_menus() : string
    {
        $menu_instance = new \App\Helpers\MenuWithPermission();

        $menu_instance->add_menu_item('dashboard-menu', [
            'route' => 'landlord.admin.home',
            'label' => __('Dashboard'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-view-dashboard',
        ]);

        $admin = \Auth::guard('admin')->user();

        if ($admin->hasRole('Super Admin')){
            $this->admin_manage_menus($menu_instance);
            $this->users_manage_menus($menu_instance);
        }

        $this->users_website_issues_manage_menus($menu_instance);

        $this->pages_settings_menus($menu_instance);
        $this->themes_settings_menus($menu_instance);
        $this->price_plan_settings_menus($menu_instance);
        $this->newsletter_settings_menus($menu_instance);
        $this->order_manage_settings_menus($menu_instance);
        $this->custom_domain_settings_menus($menu_instance);
        $this->support_ticket_settings_menus($menu_instance);
        $this->testimonial_settings_menus($menu_instance);
        $this->brands_settings_menus($menu_instance);
        $this->form_builder_settings_menus($menu_instance);
        $this->appearance_settings_menus($menu_instance);
        $this->general_settings_menus($menu_instance);

        $menu_instance->add_menu_item('languages', [
            'route' => 'landlord.admin.languages',
            'label' => __('Languages'),
            'parent' => null,
            'permissions' => ['language-list','language-create','language-edit','language-delete'],
            'icon' => 'mdi mdi-language-css3',
        ]);
        return $menu_instance->render_menu_items();
    }

    private function pages_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('pages-settings-menu-items', [
            'route' => '#',
            'label' => __('Pages'),
            'parent' => null,
            'permissions' => ['page-list','page-create','page-edit','page-delete'],
            'icon' => 'mdi mdi-file',
        ]);
        $menu_instance->add_menu_item('pages-settings-all-page-settings', [
            'route' => 'landlord.admin.pages',
            'label' => __('All Pages'),
            'parent' => 'pages-settings-menu-items',
            'permissions' => ['page-list'],
        ]);
        $menu_instance->add_menu_item('pages-settings-new-page-settings', [
            'route' => 'landlord.admin.pages.create',
            'label' => __('New Pages'),
            'parent' => 'pages-settings-menu-items',
            'permissions' => ['page-create'],
        ]);
    }

    private function themes_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('themes-settings-menu-items', [
            'route' => '#',
            'label' => __('Themes'),
            'parent' => null,
            'permissions' => ['theme-list','theme-create','theme-edit','theme-delete'],
            'icon' => 'mdi mdi-shape-plus',
        ]);
        $menu_instance->add_menu_item('pages-settings-all-theme-settings', [
            'route' => 'landlord.admin.theme.gallery',
            'label' => __('Theme Gallery'),
            'parent' => 'themes-settings-menu-items',
            'permissions' => ['page-list'],
        ]);
        $menu_instance->add_menu_item('pages-settings-new-theme-settings', [
            'route' => 'landlord.admin.all.theme',
            'label' => __('Theme List'),
            'parent' => 'themes-settings-menu-items',
            'permissions' => ['page-create'],
        ]);
    }

    private function price_plan_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('price-plan-settings-menu-items', [
            'route' => '#',
            'label' => __('Price Plan'),
            'parent' => null,
            'permissions' => ['price-plan-list','price-plan-create','price-plan-edit','price-plan-delete'],
            'icon' => 'mdi mdi-cash-multiple',
        ]);
        $menu_instance->add_menu_item('price-plan-settings-all-page-settings', [
            'route' => 'landlord.admin.price.plan',
            'label' => __('All Price Plan'),
            'parent' => 'price-plan-settings-menu-items',
            'permissions' => ['price-plan-list'],
        ]);
        $menu_instance->add_menu_item('price-plan-settings-new-page-settings', [
            'route' => 'landlord.admin.price.plan.create',
            'label' => __('New Price Plan'),
            'parent' => 'price-plan-settings-menu-items',
            'permissions' => ['price-plan-create'],
        ]);

        $menu_instance->add_menu_item('price-plan-settings-plan-settings', [
            'route' => 'landlord.admin.price.plan.settings',
            'label' => __('Settings'),
            'parent' => 'price-plan-settings-menu-items',
            'permissions' => [''],
        ]);
    }

    private function newsletter_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('newsletter', [
            'route' => '#',
            'label' => __('Newsletter Manage'),
            'parent' => null,
            'permissions' => ['newsletter-list','newsletter-create','newsletter-edit','newsletter-delete'],
            'icon' => 'mdi mdi-newspaper',
        ]);

        $menu_instance->add_menu_item('all-newsletter', [
            'route' => 'landlord.admin.newsletter',
            'label' => __('All Subscribers'),
            'parent' => 'newsletter',
            'permissions' => ['newsletter-list'],
        ]);

        $menu_instance->add_menu_item('mail-send-all-newsletter', [
            'route' => 'landlord.admin.newsletter.mail',
            'label' => __('Send Mail to All'),
            'parent' => 'newsletter',
            'permissions' => [],
        ]);
    }

    private function order_manage_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('order-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('Package Order Manage'),
            'parent' => null,
            'permissions' => ['package-order-all-order','package-order-pending-order','package-order-pending-order',
             'package-order-progress-order','package-order-complete-order','package-order-success-order-page','package-order-cancel-order-page',
                'package-order-order-page-manage','package-order-order-report','package-order-payment-logs','package-order-payment-report'
            ],
            'icon' => 'mdi mdi-cash-multiple',
        ]);
        $menu_instance->add_menu_item('order-manage-all-order-settings-all-page-settings', [
            'route' => 'landlord.admin.package.order.manage.all',
            'label' => __('All Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-all-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-pending-order-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.manage.pending',
            'label' => __('Pending Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-pending-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-in-progress-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.manage.in.progress',
            'label' => __('In Progress Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-progress-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-complete-order-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.manage.completed',
            'label' => __('Completed Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-complete-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-success-page-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.success.page',
            'label' => __('Success Order Page'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => [ 'package-order-success-order-page'],
        ]);
        $menu_instance->add_menu_item('order-manage-cancel-page-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.cancel.page',
            'label' => __('Cancel Order Page'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-cancel-order-page'],
        ]);
        $menu_instance->add_menu_item('order-manage-order-page-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.page',
            'label' => __('Order Page Manage'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => [ 'package-order-order-page-manage'],
        ]);
        $menu_instance->add_menu_item('order-manage-order-report-settings-new-page-settings', [
            'route' => 'landlord.admin.package.order.report',
            'label' => __('Order Report'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => [ 'package-order-order-report'],
        ]);
        $menu_instance->add_menu_item('order-manage-payment-log-settings-new-page-settings', [
            'route' => 'landlord.admin.payment.logs',
            'label' => __('All Payment Logs'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-payment-logs'],
        ]);
        $menu_instance->add_menu_item('order-manage-payment-report-settings-new-page-settings', [
            'route' => 'landlord.admin.payment.report',
            'label' => __('Payment Report'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-payment-report'],
        ]);
    }

    private function custom_domain_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('custom-domain-settings-menu-items', [
            'route' => '#',
            'label' => __('Custom Domain'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);
        $menu_instance->add_menu_item('all-pending-custom-domain-request', [
            'route' => 'landlord.admin.custom.domain.requests.all.pending',
            'label' => __('All Pending Request'),
            'parent' => 'custom-domain-settings-menu-items',
            'permissions' => ['package-order-all-order'],
        ]);

        $menu_instance->add_menu_item('all-custom-domain-request', [
            'route' => 'landlord.admin.custom.domain.requests.all',
            'label' => __('All Requests'),
            'parent' => 'custom-domain-settings-menu-items',
            'permissions' => ['package-order-all-order'],
        ]);

        $menu_instance->add_menu_item('all-custom-domain-request-settings', [
            'route' => 'landlord.admin.custom.domain.requests.settings',
            'label' => __('Settings'),
            'parent' => 'custom-domain-settings-menu-items',
            'permissions' => ['package-order-all-order'],
        ]);

    }

    private function testimonial_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('testimonial', [
            'route' => 'landlord.admin.testimonial',
            'label' => __('Testimonial'),
            'parent' => null,
            'permissions' => ['testimonial-list', 'testimonial-create','testimonial-edit','testimonial-delete'],
            'icon' => 'mdi mdi-format-quote-close',
        ]);
    }

    private function support_ticket_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('support-tickets-settings-menu-items', [
            'route' => '#',
            'label' => __('Support Tickets'),
            'parent' => null,
            'permissions' => ['support-ticket-list','support-ticket-create','support-ticket-edit','support-ticket-delete',],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-all', [
            'route' => 'landlord.admin.support.ticket.all',
            'label' => __('All Tickets'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-list'],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-add', [
            'route' => 'landlord.admin.support.ticket.new',
            'label' => __('Add New Ticket'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-create'],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-department', [
            'route' => 'landlord.admin.support.ticket.department',
            'label' => __('Departments'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-department-list','support-ticket-department-create','support-ticket-department-edit','support-ticket-department-delete',],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-setting', [
            'route' => 'landlord.admin.support.ticket.page.settings',
            'label' => __('Page Settings'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function brands_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('brands', [
            'route' => 'landlord.admin.brands',
            'label' => __('Brands'),
            'parent' => null,
            'permissions' => [ 'brand-list','brand-create','brand-edit','brand-delete'],
            'icon' => 'mdi mdi-slack',
        ]);
    }

    private function form_builder_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('form-builder-settings-menu-items', [
            'route' => '#',
            'label' => __('Form Builder'),
            'parent' => null,
            'permissions' => ['form-builder'],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('form-builder-settings-all', [
            'route' => 'landlord.admin.form.builder.all',
            'label' => __('Custom From Builder'),
            'parent' => 'form-builder-settings-menu-items',
            'permissions' => ['form-builder'],
        ]);

        $menu_instance->add_menu_item('form-builder-settings-contact-message', [
            'route' => 'landlord.admin.contact.message.all',
            'label' => __('All Form Submission'),
            'parent' => 'form-builder-settings-menu-items',
            'permissions' => ['form-builder'],
        ]);
    }

    private function appearance_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('appearance-settings-menu-items', [
            'route' => '#',
            'label' => __('Appearance Settings'),
            'parent' => null,
            'permissions' => ['widget-builder'],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('widget-builder-settings-all', [
            'route' => 'landlord.admin.widgets',
            'label' => __('Widget Builder'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['widget-builder'],
        ]);

        $menu_instance->add_menu_item('menu-settings-all', [
            'route' => 'landlord.admin.menu',
            'label' => __('Menu Manage'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['menu-manage'],
        ]);

        $menu_instance->add_menu_item('topbar-settings-all', [
            'route' => 'landlord.admin.topbar.settings',
            'label' => __('Topbar Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('login-register-settings-all', [
            'route' => 'landlord.admin.login.register.settings',
            'label' => __('Login/Register Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('404-settings-all', [
            'route' => 'landlord.admin.404.page.settings',
            'label' => __('404 Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('maintenance-settings-all', [
            'route' => 'landlord.admin.maintains.page.settings',
            'label' => __('Maintenance Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function general_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('general-settings-menu-items', [
            'route' => '#',
            'label' => __('General Settings'),
            'parent' => null,
            'permissions' => ['general-settings-page-settings','general-settings-site-identity','general-settings-basic-settings','general-settings-color-settings',
                'general-settings-typography-settings','general-settings-seo-settings','general-settings-payment-settings','general-settings-third-party-script-settings',
                'general-settings-smtp-settings','general-settings-custom-css-settings','general-settings-custom-js-settings','general-settings-database-upgrade-settings',
                'general-settings-cache-clear-settings','general-settings-license-settings'],
            'icon' => 'mdi mdi-settings',
        ]);
        $menu_instance->add_menu_item('general-settings-page-settings', [
            'route' => 'landlord.admin.general.page.settings',
            'label' => __('Page Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-page-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-site-identity', [
            'route' => 'landlord.admin.general.site.identity',
            'label' => __('Site Identity'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-site-identity'],
        ]);
        $menu_instance->add_menu_item('general-settings-basic-settings', [
            'route' => 'landlord.admin.general.basic.settings',
            'label' => __('Basic Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-basic-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-color-settings', [
            'route' => 'landlord.admin.general.color.settings',
            'label' => __('Color Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-color-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-typography-settings', [
            'route' => 'landlord.admin.general.typography.settings',
            'label' => __('Typography Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-typography-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-seo-settings', [
            'route' => 'landlord.admin.general.seo.settings',
            'label' => __('SEO Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-seo-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-payment-gateway-settings', [
            'route' => 'landlord.admin.general.payment.settings',
            'label' => __('Payment Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-payment-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-third-party-script-settings', [
            'route' => 'landlord.admin.general.third.party.script.settings',
            'label' => __('Third Party Script'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-third-party-script-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-smtp-settings', [
            'route' => 'landlord.admin.general.smtp.settings',
            'label' => __('Smtp Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-smtp-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-custom-css-settings', [
            'route' => 'landlord.admin.general.custom.css.settings',
            'label' => __('Custom CSS'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-custom-css-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-custom-js-settings', [
            'route' => 'landlord.admin.general.custom.js.settings',
            'label' => __('Custom JS'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-custom-js-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-database-upgrade-settings', [
            'route' => 'landlord.admin.general.database.upgrade.settings',
            'label' => __('Database Upgrade'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-database-upgrade-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-cache-settings', [
            'route' => 'landlord.admin.general.cache.settings',
            'label' => __('Cache Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-cache-clear-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-sitemap-settings', [
            'route' => 'landlord.admin.general.sitemap.settings',
            'label' => __('Sitemap Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('general-settings-license-settings', [
            'route' => 'landlord.admin.general.license.settings',
            'label' => __('License Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-license-settings'],
        ]);
    }

    private function users_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('users-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('Users Manage'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('users-manage-settings-list-menu-items', [
            'route' => 'landlord.admin.tenant',
            'label' => __('All Users'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('users-manage-settings-add-new-menu-items', [
            'route' => 'landlord.admin.tenant.new',
            'label' => __('Add New'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('users-manage-settings-activity-log', [
            'route' => 'landlord.admin.tenant.activity.log',
            'label' => __('Activity Log'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('users-manage-settings', [
            'route' => 'landlord.admin.tenant.settings',
            'label' => __('Account Settings'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function users_website_issues_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('users-website-issues-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('User Website'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('users-website-manage-settings-list-menu-items', [
            'route' => 'landlord.admin.tenant.website.issues',
            'label' => __('User website Issues'),
            'parent' => 'users-website-issues-manage-settings-menu-items',
            'permissions' => [],
        ]);

    }

    private function admin_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('admin-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('Admin Role Manage'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('admins-manage-settings-list-menu-items', [
            'route' => 'landlord.admin.all.user',
            'label' => __('All Admin'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('admins-manage-settings-add-new-menu-items', [
            'route' => 'landlord.admin.new.user',
            'label' => __('Add New Admin'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('admins-role-manage-settings-add-new-menu-items', [
            'route' => 'landlord.admin.all.admin.role',
            'label' => __('All Admin Role'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
    }


    /* tenent menu */
    public function render_tenant_sidebar_menus() : string
    {
        $menu_instance = new \App\Helpers\MenuWithPermission();
        $admin = \Auth::guard('admin')->user();

        $current_tenant_payment_data = tenant()->payment_log_for_sidebar()->first() ?? [];
        $current_tenant_payment_data = $current_tenant_payment_data->payment_status == 'complete' || $current_tenant_payment_data->payment_status == 'pending'
        && $current_tenant_payment_data->status == 'trial' ? $current_tenant_payment_data : [];

        if(!empty($current_tenant_payment_data)) {
        $package = tenant()->user()->first()->payment_log()->first()->package()->first() ?? [];

            if (!empty($package)) {
                $all_features = $package->plan_features ?? [];
                //applying plan access
                foreach ($all_features as $key => $feature_item) {

                    if (!empty($feature_item->feature_name == 'dashboard')) {
                        $menu_instance->add_menu_item('tenant-dashboard-menu', [
                            'route' => 'tenant.admin.dashboard',
                            'label' => __('Dashboard'),
                            'parent' => null,
                            'permissions' => [],
                            'icon' => 'mdi mdi-home',
                        ]);
                    }

                    if (!empty($feature_item->feature_name == 'admin')) {
                        if ($admin->hasRole('Super Admin')) {
                            $this->tenant_admin_manage_menus($menu_instance);
                        }
                    }

                    if (!empty($feature_item->feature_name == 'user')) {
                        if ($admin->hasRole('Super Admin')) {
                            $this->tenant_users_manage_menus($menu_instance);
                        }
                    }

                    if (!empty($feature_item->feature_name == 'donation')) {
                        $this->tenant_donation_settings_menus($menu_instance);
                        $this->tenant_donation_activities($menu_instance);
                    }


                    if (!empty($feature_item->feature_name == 'event')) {
                        $this->tenant_event_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name) && $feature_item->feature_name == 'job') {
                        $this->tenant_job_settings_menus($menu_instance);
                    }


                    if (!empty($feature_item->feature_name == 'support_ticket')) {
                        $this->tenant_support_ticket_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'brand')) {
                        $this->tenant_brands_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'custom_domain')) {
                        $this->tenant_custom_domain_request_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'testimonial')) {
                        $this->tenant_testimonial_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'form_builder')) {
                        $this->tenant_form_builder_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'own_order_manage')) {
                        if ($admin->hasRole('Super Admin')) {
                            $this->tenant_payment_manage_menus($menu_instance);
                        }
                    }

                    if (!empty($feature_item->feature_name == 'page')) {
                        $this->tenant_pages_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'portfolio')) {
                        $this->tenant_porfolio_settings_menu($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'blog')) {
                        $this->tenant_blog_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'service')) {
                        $this->tenant_services_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'knowledgebase')) {
                        $this->tenant_knowledgebase_settings_menu($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'newsletter')) {
                        $this->tenant_newsletter_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'faq')) {
                        $this->tenant_faq_settings($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'gallery')) {
                        $this->tenant_image_gallery($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'appearance_settings')) {
                        $this->tenant_appearance_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'general_settings')) {
                        $this->tenant_general_settings_menus($menu_instance);
                    }

                    if (!empty($feature_item->feature_name == 'language')) {
                        $menu_instance->add_menu_item('tenant-languages', [
                            'route' => 'tenant.admin.languages',
                            'label' => __('Languages'),
                            'parent' => null,
                            'permissions' => ['language-list', 'language-create', 'language-edit', 'language-delete'],
                            'icon' => 'mdi mdi-polymer ',
                        ]);
                    }


                }
            }
        }

        return $menu_instance->render_menu_items();
    }

    private function tenant_donation_settings_menus(MenuWithPermission $menu_instance): void
    {
            $menu_instance->add_menu_item('donation-settings-menu-items', [
                'route' => '#',
                'label' => __('Donations'),
                'parent' => null,
                'permissions' => ['donation-list','donation-create','donation-edit','donation-delete'],
                'icon' => 'mdi mdi-cash-multiple',
            ]);

            $menu_instance->add_menu_item('donation-settings-all-page-settings', [
                'route' => 'tenant.admin.donation',
                'label' => __('All Donations'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => ['donation-list'],
            ]);

            $menu_instance->add_menu_item('donation-settings-add-page-settings', [
                'route' => 'tenant.admin.donation.new',
                'label' => __('Add Donation'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => ['donation-create'],
            ]);

            $menu_instance->add_menu_item('donation-settings-category-page-settings', [
                'route' => 'tenant.admin.donation.category',
                'label' => __('Category'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => ['donation-category'],
            ]);

            $menu_instance->add_menu_item('donation-settings-all-donations-logs', [
                'route' => 'tenant.admin.donation.payment.logs',
                'label' => __('All Payment Logs'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => ['donation-payment'],
            ]);

            $menu_instance->add_menu_item('donation-settings-payment-logs-report', [
                'route' => 'tenant.admin.donation.payment.logs.report',
                'label' => __('Payment Logs Report'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => ['donation-payment'],
            ]);

            $menu_instance->add_menu_item('donation-settings-donations-all-settings', [
                'route' => 'tenant.admin.donation.settings',
                'label' => __('Settings'),
                'parent' => 'donation-settings-menu-items',
                'permissions' => [],
            ]);
    }

    public function tenant_donation_activities(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('donation-activities-settings-menu-items', [
            'route' => '#',
            'label' => __('Donation Activities'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('settings-donation-activity-list', [
            'route' => 'tenant.admin.donation.activity',
            'label' => __('All Activity'),
            'parent' => 'donation-activities-settings-menu-items',
            'permissions' => ['donation-activity-list'],
        ]);

        $menu_instance->add_menu_item('donation-activity-add', [
            'route' => 'tenant.admin.donation.activity.new',
            'label' => __('Add Activity'),
            'parent' => 'donation-activities-settings-menu-items',
            'permissions' => ['donation-activity-create'],
        ]);

        $menu_instance->add_menu_item('settings-donation-activity-category', [
            'route' => 'tenant.admin.donation.activity.category',
            'label' => __('Category'),
            'parent' => 'donation-activities-settings-menu-items',
            'permissions' => ['donation-activity-create'],
        ]);
    }


    private function tenant_event_settings_menus(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('event-settings-menu-items', [
            'route' => '#',
            'label' => __('Events'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('event-settings-all-page-settings', [
            'route' => 'tenant.admin.event',
            'label' => __('All Event'),
            'parent' => 'event-settings-menu-items',
            'permissions' => ['event-list'],
        ]);

        $menu_instance->add_menu_item('event-settings-add-page-settings', [
            'route' => 'tenant.admin.event.new',
            'label' => __('Add Event'),
            'parent' => 'event-settings-menu-items',
            'permissions' => ['event-create'],
        ]);

        $menu_instance->add_menu_item('event-settings-category-page-settings', [
            'route' => 'tenant.admin.event.category',
            'label' => __('Category'),
            'parent' => 'event-settings-menu-items',
            'permissions' => ['event-create'],
        ]);

        $menu_instance->add_menu_item('event-settings-all-donations-logs', [
            'route' => 'tenant.admin.event.payment.logs',
            'label' => __('All Payment Logs'),
            'parent' => 'event-settings-menu-items',
            'permissions' => ['event-payment'],
        ]);

        $menu_instance->add_menu_item('event-settings-payment-logs-report', [
            'route' => 'tenant.admin.event.payment.logs.report',
            'label' => __('Payment Logs Report'),
            'parent' => 'event-settings-menu-items',
            'permissions' => ['event-payment'],
        ]);

        $menu_instance->add_menu_item('event-settings-donations-all-settings', [
            'route' => 'tenant.admin.event.settings',
            'label' => __('Settings'),
            'parent' => 'event-settings-menu-items',
            'permissions' => [],
        ]);

    }

    private function tenant_job_settings_menus(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('job-settings-menu-items', [
            'route' => '#',
            'label' => __('Jobs'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('job-settings-all-page-settings', [
            'route' => 'tenant.admin.job',
            'label' => __('All Jobs'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-list'],
        ]);

        $menu_instance->add_menu_item('job-settings-add-page-settings', [
            'route' => 'tenant.admin.job.new',
            'label' => __('Add Job'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-create'],
        ]);

        $menu_instance->add_menu_item('job-settings-category-page-settings', [
            'route' => 'tenant.admin.job.category',
            'label' => __('Category'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-category'],
        ]);

        $menu_instance->add_menu_item('job-settings-all-paid-logs', [
            'route' => 'tenant.admin.job.paid.payment.logs',
            'label' => __('All Paid Applications'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-payment'],
        ]);

        $menu_instance->add_menu_item('job-settings-all-unpaid-logs', [
            'route' => 'tenant.admin.job.unpaid.payment.logs',
            'label' => __('All Unpaid Applications'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-payment'],
        ]);


        $menu_instance->add_menu_item('job-settings-payment-logs-report', [
            'route' => 'tenant.admin.job.payment.logs.report',
            'label' => __('Payment job Report'),
            'parent' => 'job-settings-menu-items',
            'permissions' => ['job-payment'],
        ]);

    }


    public function tenant_porfolio_settings_menu(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('portfolio-settings-menu-items', [
            'route' => '#',
            'label' => __('Portfolio'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('settings-portfolio-list', [
            'route' => 'tenant.admin.portfolio',
            'label' => __('All Portfolio'),
            'parent' => 'portfolio-settings-menu-items',
            'permissions' => ['portfolio-list'],
        ]);

        $menu_instance->add_menu_item('settings-portfolio-add', [
            'route' => 'tenant.admin.portfolio.new',
            'label' => __('Add Portfolio'),
            'parent' => 'portfolio-settings-menu-items',
            'permissions' => ['portfolio-create'],
        ]);

        $menu_instance->add_menu_item('settings-portfolio-category', [
            'route' => 'tenant.admin.portfolio.category',
            'label' => __('Category'),
            'parent' => 'portfolio-settings-menu-items',
            'permissions' => ['portfolio-category'],
        ]);
    }

    public function tenant_knowledgebase_settings_menu(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('knowledgebase-settings-menu-items', [
            'route' => '#',
            'label' => __('Knowledgebase'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('settings-knowledgebase-list', [
            'route' => 'tenant.admin.knowledgebase',
            'label' => __('All Knowledgebase'),
            'parent' => 'knowledgebase-settings-menu-items',
            'permissions' => ['knowledgebase-list'],
        ]);

        $menu_instance->add_menu_item('settings-knowledgebase-add', [
            'route' => 'tenant.admin.knowledgebase.new',
            'label' => __('Add Knowledgebase'),
            'parent' => 'knowledgebase-settings-menu-items',
            'permissions' => ['knowledgebase-create'],
        ]);

        $menu_instance->add_menu_item('settings-knowledgebase-category', [
            'route' => 'tenant.admin.knowledgebase.category',
            'label' => __('Category'),
            'parent' => 'knowledgebase-settings-menu-items',
            'permissions' => ['knowledgebase-category'],
        ]);
    }


    private function tenant_newsletter_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('newsletter', [
            'route' => '#',
            'label' => __('Newsletter Manage'),
            'parent' => null,
            'permissions' => ['newsletter-list','newsletter-create','newsletter-edit','newsletter-delete'],
            'icon' => 'mdi mdi-newspaper',
        ]);

        $menu_instance->add_menu_item('all-newsletter', [
            'route' => 'tenant.admin.newsletter',
            'label' => __('All Subscribers'),
            'parent' => 'newsletter',
            'permissions' => ['newsletter-list'],
        ]);

        $menu_instance->add_menu_item('mail-send-all-newsletter', [
            'route' => 'tenant.admin.newsletter.mail',
            'label' => __('Send Mail to All'),
            'parent' => 'newsletter',
            'permissions' => [],
        ]);
    }

    public function tenant_faq_settings(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('faq-settings-menu-items', [
            'route' => '#',
            'label' => __('Faqs'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('fall-all-list', [
            'route' => 'tenant.admin.faq',
            'label' => __('All Faq'),
            'parent' => 'faq-settings-menu-items',
            'permissions' => ['faq-list'],
        ]);

        $menu_instance->add_menu_item('faq-category', [
            'route' => 'tenant.admin.faq.category',
            'label' => __('Category'),
            'parent' => 'faq-settings-menu-items',
            'permissions' => ['faq-category'],
        ]);
    }

    public function tenant_image_gallery(MenuWithPermission $menu_instance): void
    {
        $menu_instance->add_menu_item('image_gallery-settings-menu-items', [
            'route' => '#',
            'label' => __('Image Gallery'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-cash-multiple',
        ]);

        $menu_instance->add_menu_item('image-gallery-list', [
            'route' => 'tenant.admin.image.gallery',
            'label' => __('All Gallery'),
            'parent' => 'image_gallery-settings-menu-items',
            'permissions' => ['image-gallery-list'],
        ]);

        $menu_instance->add_menu_item('image-gallery-category', [
            'route' => 'tenant.admin.image.gallery.category',
            'label' => __('Category'),
            'parent' => 'image_gallery-settings-menu-items',
            'permissions' => ['image-gallery-category'],
        ]);
    }

    private function tenant_order_manage_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('order-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('User Order Manage'),
            'parent' => null,
            'permissions' => ['package-order-all-order','package-order-pending-order',
                'package-order-progress-order','package-order-complete-order','package-order-success-order-page','package-order-cancel-order-page',
                'package-order-order-page-manage','package-order-order-report','package-order-payment-logs','package-order-payment-report'
            ],
            'icon' => 'mdi mdi-cash-multiple',
        ]);
        $menu_instance->add_menu_item('order-manage-all-order-settings-all-page-settings', [
            'route' => 'tenant.admin.package.order.manage.all',
            'label' => __('All Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-all-order',],
        ]);
        $menu_instance->add_menu_item('order-manage-pending-order-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.manage.pending',
            'label' => __('Pending Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-pending-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-in-progress-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.manage.in.progress',
            'label' => __('In Progress Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-progress-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-complete-order-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.manage.completed',
            'label' => __('Completed Order'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-complete-order'],
        ]);
        $menu_instance->add_menu_item('order-manage-success-page-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.success.page',
            'label' => __('Success Order Page'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-success-order-page'],
        ]);
        $menu_instance->add_menu_item('order-manage-cancel-page-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.cancel.page',
            'label' => __('Cancel Order Page'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-cancel-order-page'],
        ]);
        $menu_instance->add_menu_item('order-manage-page-page-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.page',
            'label' => __('Order Page Manage'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-order-page-manage'],
        ]);
        $menu_instance->add_menu_item('order-manage-order-report-settings-new-page-settings', [
            'route' => 'tenant.admin.package.order.report',
            'label' => __('Order Report'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-order-report'],
        ]);
        $menu_instance->add_menu_item('order-manage-payment-log-settings-new-page-settings', [
            'route' => 'tenant.admin.payment.logs',
            'label' => __('All Payment Logs'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-payment-logs'],
        ]);
        $menu_instance->add_menu_item('order-manage-payment-report-settings-new-page-settings', [
            'route' => 'tenant.admin.payment.report',
            'label' => __('Payment Report'),
            'parent' => 'order-manage-settings-menu-items',
            'permissions' => ['package-order-payment-report'],
        ]);
    }

    private function tenant_services_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('services-settings-menu-items', [
            'route' => '#',
            'label' => __('Services'),
            'parent' => null,
            'permissions' => ['service-list','service-create','service-edit','service-delete'],
            'icon' => 'mdi mdi-file',
        ]);
        $menu_instance->add_menu_item('services-settings-all-page-settings', [
            'route' => 'tenant.admin.service',
            'label' => __('All Services'),
            'parent' => 'services-settings-menu-items',
            'permissions' => ['service-list'],
        ]);
        $menu_instance->add_menu_item('services-settings-add-page-settings', [
            'route' => 'tenant.admin.service.add',
            'label' => __('Add Service'),
            'parent' => 'services-settings-menu-items',
            'permissions' => ['service-create'],
        ]);

        $menu_instance->add_menu_item('services-settings-category-page-settings', [
            'route' => 'tenant.admin.service.category',
            'label' => __('Category'),
            'parent' => 'services-settings-menu-items',
            'permissions' => ['service-category-list'],
        ]);

    }

    private function tenant_pages_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('pages-settings-menu-items', [
            'route' => '#',
            'label' => __('Pages'),
            'parent' => null,
            'permissions' => ['page-list','page-create','page-edit','page-delete'],
            'icon' => 'mdi mdi-file',
        ]);
        $menu_instance->add_menu_item('pages-settings-all-page-settings', [
            'route' => 'tenant.admin.pages',
            'label' => __('All Pages'),
            'parent' => 'pages-settings-menu-items',
            'permissions' => ['page-list'],
        ]);
        $menu_instance->add_menu_item('pages-settings-new-page-settings', [
            'route' => 'tenant.admin.pages.create',
            'label' => __('New Pages'),
            'parent' => 'pages-settings-menu-items',
            'permissions' => ['page-create'],
        ]);
    }

    private function tenant_brands_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('brands', [
            'route' => 'tenant.admin.brands',
            'label' => __('Brands'),
            'parent' => null,
            'permissions' => [ 'brand-list','brand-create','brand-edit','brand-delete'],
            'icon' => 'mdi mdi-slack',
        ]);
    }



    private function tenant_blog_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('blog-settings-menu-items', [
            'route' => '#',
            'label' => __('Blogs'),
            'parent' => null,
            'permissions' => ['blog-list','blog-create','blog-edit','blog-delete','blog-settings'],
            'icon' => 'mdi mdi-blogger',
        ]);

        $menu_instance->add_menu_item('blog-all-settings-menu-items', [
            'route' => 'tenant.admin.blog',
            'label' => __('All Blogs'),
            'parent' => 'blog-settings-menu-items',
            'permissions' => ['blog-list'],
        ]);

        $menu_instance->add_menu_item('blog-add-settings-menu-items', [
            'route' => 'tenant.admin.blog.new',
            'label' => __('Add New Blog'),
            'parent' => 'blog-settings-menu-items',
            'permissions' => ['blog-create'],
        ]);

        $menu_instance->add_menu_item('blog-category-settings-all', [
            'route' => 'tenant.admin.blog.category',
            'label' => __('Blog Category'),
            'parent' => 'blog-settings-menu-items',
            'permissions' => ['blog-category-list'],
        ]);

        $menu_instance->add_menu_item('blog-settings-all', [
            'route' => 'tenant.admin.blog.settings',
            'label' => __('Settings'),
            'parent' => 'blog-settings-menu-items',
            'permissions' => ['blog-settings'],
        ]);

    }


    private function tenant_testimonial_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('testimonial', [
            'route' => 'tenant.admin.testimonial',
            'label' => __('Testimonial'),
            'parent' => null,
            'permissions' => ['testimonial-list', 'testimonial-create','testimonial-edit','testimonial-delete'],
            'icon' => 'mdi mdi-format-quote-close',
        ]);
    }

    private function tenant_support_ticket_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('support-tickets-settings-menu-items', [
            'route' => '#',
            'label' => __('Support Tickets'),
            'parent' => null,
            'permissions' => ['support-ticket-list','support-ticket-create','support-ticket-edit','support-ticket-delete',],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-all', [
            'route' => 'tenant.admin.support.ticket.all',
            'label' => __('All Tickets'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-list'],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-add', [
            'route' => 'tenant.admin.support.ticket.new',
            'label' => __('Add New Ticket'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-create'],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-department', [
            'route' => 'tenant.admin.support.ticket.department',
            'label' => __('Departments'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => ['support-ticket-department-list','support-ticket-department-create','support-ticket-department-edit','support-ticket-department-delete',],
        ]);

        $menu_instance->add_menu_item('support-ticket-settings-setting', [
            'route' => 'tenant.admin.support.ticket.page.settings',
            'label' => __('Page Settings'),
            'parent' => 'support-tickets-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function tenant_form_builder_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('form-builder-settings-menu-items', [
            'route' => '#',
            'label' => __('Form Builder'),
            'parent' => null,
            'permissions' => ['form-builder'],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('form-builder-settings-all', [
            'route' => 'tenant.admin.form.builder.all',
            'label' => __('Custom From Builder'),
            'parent' => 'form-builder-settings-menu-items',
            'permissions' => ['form-builder'],
        ]);

        $menu_instance->add_menu_item('form-builder-settings-contact-message', [
            'route' => 'tenant.admin.contact.message.all',
            'label' => __('All Form Submission'),
            'parent' => 'form-builder-settings-menu-items',
            'permissions' => ['form-builder'],
        ]);
    }

    private function tenant_appearance_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('appearance-settings-menu-items', [
            'route' => '#',
            'label' => __('Appearance Settings'),
            'parent' => null,
            'permissions' => ['menu-manage','topbar-manage','widget-builder','other-settings'],
            'icon' => 'mdi mdi-folder-outline',
        ]);

        $menu_instance->add_menu_item('theme-settings-all-tenant', [
            'route' => 'tenant.admin.theme',
            'label' => __('Theme Manage'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['theme-manage'],
        ]);

        $menu_instance->add_menu_item('menu-settings-all', [
            'route' => 'tenant.admin.menu',
            'label' => __('Menu Manage'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['menu-manage'],
        ]);

        $menu_instance->add_menu_item('widget-builder-settings-all', [
            'route' => 'tenant.admin.widgets',
            'label' => __('Widget Builder'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['widget-builder'],
        ]);

        $menu_instance->add_menu_item('topbar-settings-all', [
            'route' => 'tenant.admin.topbar.settings',
            'label' => __('Topbar Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('other-settings', [
            'route' => 'tenant.admin.other.settings',
            'label' => __('Other Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => ['other-settings'],
        ]);

        $menu_instance->add_menu_item('404-settings-all', [
            'route' => 'tenant.admin.404.page.settings',
            'label' => __('404 Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);

        $menu_instance->add_menu_item('maintenance-settings-all', [
            'route' => 'tenant.admin.maintains.page.settings',
            'label' => __('Maintenance Settings'),
            'parent' => 'appearance-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function tenant_general_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('general-settings-menu-items', [
            'route' => '#',
            'label' => __('General Settings'),
            'parent' => null,
            'permissions' => ['general-settings-page-settings','general-settings-site-identity','general-settings-basic-settings','general-settings-color-settings',
                'general-settings-typography-settings','general-settings-seo-settings','general-settings-payment-settings','general-settings-third-party-script-settings',
                'general-settings-smtp-settings','general-settings-custom-css-settings','general-settings-custom-js-settings','general-settings-database-upgrade-settings',
                'general-settings-cache-clear-settings','general-settings-license-settings'],
            'icon' => 'mdi mdi-settings',
        ]);
        $menu_instance->add_menu_item('general-settings-reading-settings', [
            'route' => 'tenant.admin.general.page.settings',
            'label' => __('Page Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-page-settings'],
        ]);

        $menu_instance->add_menu_item('general-settings-site-identity', [
            'route' => 'tenant.admin.general.site.identity',
            'label' => __('Site Identity'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-site-identity'],
        ]);
        $menu_instance->add_menu_item('general-settings-basic-settings', [
            'route' => 'tenant.admin.general.basic.settings',
            'label' => __('Basic Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-basic-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-color-settings', [
            'route' => 'tenant.admin.general.color.settings',
            'label' => __('Color Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-color-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-typography-settings', [
            'route' => 'tenant.admin.general.typography.settings',
            'label' => __('Typography Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-typography-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-seo-settings', [
            'route' => 'tenant.admin.general.seo.settings',
            'label' => __('SEO Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-seo-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-payment-gateway-settings', [
            'route' => 'tenant.admin.general.payment.settings',
            'label' => __('Payment Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-payment-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-third-party-script-settings', [
            'route' => 'tenant.admin.general.third.party.script.settings',
            'label' => __('Third Party Script'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-third-party-script-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-email-settings', [
            'route' => 'tenant.admin.general.email.settings',
            'label' => __('Email Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-smtp-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-custom-css-settings', [
            'route' => 'tenant.admin.general.custom.css.settings',
            'label' => __('Custom CSS'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-custom-css-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-custom-js-settings', [
            'route' => 'tenant.admin.general.custom.js.settings',
            'label' => __('Custom JS'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-custom-js-settings'],
        ]);

        $menu_instance->add_menu_item('general-settings-cache-settings', [
            'route' => 'tenant.admin.general.cache.settings',
            'label' => __('Cache Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => [ 'general-settings-cache-clear-settings'],
        ]);
        $menu_instance->add_menu_item('general-settings-sitemap-settings', [
            'route' => 'tenant.admin.general.sitemap.settings',
            'label' => __('Sitemap Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('general-settings-license-settings', [
            'route' => 'tenant.admin.general.license.settings',
            'label' => __('License Settings'),
            'parent' => 'general-settings-menu-items',
            'permissions' => ['general-settings-license-settings'],
        ]);
    }

    private function tenant_users_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('users-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('Users Manage'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('users-manage-settings-list-menu-items', [
            'route' => 'tenant.admin.user',
            'label' => __('All Users'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('users-manage-settings-add-new-menu-items', [
            'route' => 'tenant.admin.user.new',
            'label' => __('Add New'),
            'parent' => 'users-manage-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function tenant_payment_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('tenant-payment-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('My Package Orders'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('my-payment-manage-my-logs-settings-menu-items', [
            'route' => 'tenant.my.package.order.payment.logs',
            'label' => __('My Payment Logs'),
            'parent' => 'tenant-payment-manage-settings-menu-items',
            'permissions' => [],
        ]);
    }

    private function tenant_custom_domain_request_settings_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('custom-domain-request', [
            'route' => 'tenant.admin.custom.domain.requests',
            'label' => __('Custom Domain'),
            'parent' => null,
            'permissions' => ['custom-domain'],
            'icon' => 'mdi mdi-format-quote-close',
        ]);
    }

    private function tenant_admin_manage_menus(MenuWithPermission $menu_instance) : void
    {
        $menu_instance->add_menu_item('admin-manage-settings-menu-items', [
            'route' => '#',
            'label' => __('Admin Role Manage'),
            'parent' => null,
            'permissions' => [],
            'icon' => 'mdi mdi-account-multiple',
        ]);
        $menu_instance->add_menu_item('admins-manage-settings-list-menu-items', [
            'route' => 'tenant.admin.all.user',
            'label' => __('All Admin'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('admins-manage-settings-add-new-menu-items', [
            'route' => 'tenant.admin.new.user',
            'label' => __('Add New Admin'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
        $menu_instance->add_menu_item('admins-role-manage-settings-add-new-menu-items', [
            'route' => 'tenant.admin.all.admin.role',
            'label' => __('All Admin Role'),
            'parent' => 'admin-manage-settings-menu-items',
            'permissions' => [],
        ]);
    }


}

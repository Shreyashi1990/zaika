<?php

namespace Database\Seeders\Tenant;

use App\Mail\TenantCredentialMail;
use App\Models\Admin;
use App\Models\Language;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeed extends Seeder
{

    public static function process_seeding()
    {
         \DB::statement("INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1,'page-list','admin','2022-08-09 16:09:40','2022-08-09 16:09:40'),
	(2,'page-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(3,'page-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(4,'page-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(5,'price-plan-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(6,'price-plan-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(7,'price-plan-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(8,'price-plan-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(9,'package-order-all-order','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(10,'package-order-pending-order','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(11,'package-order-progress-order','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(12,'package-order-complete-order','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(13,'package-order-success-order-page','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(14,'package-order-cancel-order-page','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(15,'package-order-order-page-manage','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(16,'package-order-order-report','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(17,'package-order-payment-logs','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(18,'package-order-payment-report','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(19,'package-order-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(20,'package-order-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(21,'testimonial-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(22,'testimonial-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(23,'testimonial-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(24,'testimonial-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(25,'brand-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(26,'brand-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(27,'brand-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(28,'brand-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(29,'blog-category-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(30,'blog-category-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(31,'blog-category-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(32,'blog-category-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(33,'blog-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(34,'blog-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(35,'blog-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(36,'blog-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(37,'blog-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(38,'blog-comments','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(39,'service-category-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(40,'service-category-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(41,'service-category-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(42,'service-category-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(43,'service-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(44,'service-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(45,'service-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(46,'service-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(47,'service-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(48,'service-comments','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(49,'form-builder','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(50,'widget-builder','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(51,'general-settings-page-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(52,'general-settings-global-navbar-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(53,'general-settings-global-footer-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(54,'general-settings-site-identity','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(55,'general-settings-basic-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(56,'general-settings-color-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(57,'general-settings-typography-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(58,'general-settings-seo-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(59,'general-settings-payment-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(60,'general-settings-third-party-script-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(61,'general-settings-smtp-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(62,'general-settings-custom-css-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(63,'general-settings-custom-js-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(64,'general-settings-database-upgrade-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(65,'general-settings-cache-clear-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(66,'general-settings-license-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(67,'language-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(68,'language-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(69,'language-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(70,'language-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(71,'menu-manage','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(72,'topbar-manage','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(73,'other-settings','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(74,'newsletter-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(75,'newsletter-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(76,'newsletter-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(77,'newsletter-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(78,'support-ticket-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(79,'support-ticket-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(80,'support-ticket-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(81,'support-ticket-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(82,'support-ticket-department-list','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(83,'support-ticket-department-create','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(84,'support-ticket-department-edit','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(85,'support-ticket-department-delete','admin','2022-08-09 16:09:41','2022-08-09 16:09:41'),
	(121,'donation-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(122,'donation-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(123,'donation-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(124,'donation-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(125,'donation-category-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(126,'donation-category-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(127,'donation-category-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(128,'donation-category-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(129,'donation-payment','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(130,'event-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(131,'event-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(132,'event-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(133,'event-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(134,'event-category-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(135,'event-category-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(136,'event-category-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(137,'event-category-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(138,'event-payment','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(139,'job-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(140,'job-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(141,'job-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(142,'job-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(143,'job-category-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(144,'job-category-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(145,'job-category-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(146,'job-category-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(147,'job-payment','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(148,'knowledgebase-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(149,'knowledgebase-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(150,'knowledgebase-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(151,'knowledgebase-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(152,'knowledgebase-category-list','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(153,'knowledgebase-category-create','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(154,'knowledgebase-category-edit','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(155,'knowledgebase-category-delete','admin','2022-11-13 09:08:17','2022-11-13 09:08:17'),
	(156,'portfolio-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(157,'portfolio-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(158,'portfolio-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(159,'portfolio-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(160,'portfolio-category-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(161,'portfolio-category-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(162,'portfolio-category-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(163,'portfolio-category-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(164,'donation-activity-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(165,'donation-activity-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(166,'donation-activity-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(167,'donation-activity-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(168,'donation-activity-category-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(169,'donation-activity-category-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(170,'donation-activity-category-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(171,'donation-activity-category-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(172,'image-gallery-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(173,'image-gallery-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(174,'image-gallery-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(175,'image-gallery-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(176,'image-gallery-category-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(177,'image-gallery-category-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(178,'image-gallery-category-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(179,'image-gallery-category-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(180,'faq-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(181,'faq-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(182,'faq-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(183,'faq-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(184,'faq-category-list','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(185,'faq-category-create','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(186,'faq-category-edit','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(187,'faq-category-delete','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(188,'custom-domain','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(189,'general-settings','admin','2022-11-13 09:14:03','2022-11-13 09:14:03'),
	(190,'newsletter','admin','2022-11-13 09:14:03','2022-11-13 09:14:03')");
        // $permissions = ['page-list','page-create'];
        // foreach( $permissions as $per){
        //     Permission::updateOrCreate(['name' => $per,'guard_name' => 'admin'],['name' => $per,'guard_name' => 'admin']);
        // }
        $data = \DB::table('permissions')->select('name')->get()->toArray();
        $role = Role::updateOrCreate(['name' => 'Super Admin','guard_name' => 'admin'],['name' => 'Super Admin','guard_name' => 'admin']);
        $role->syncPermissions($data);
    }
}

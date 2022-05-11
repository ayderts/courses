<?php

namespace Database\Seeders\voyagers\basis;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Setting::create([
            'key' => 'admin.title',
            'display_name' => 'Название админки',
            'value' => 'BI UNIVERSITY',
            'details' => '',
            'type' => 'text',
            'group' => 'Admin',
        ]);

        Setting::create([
            'key' => 'admin.description',
            'display_name' => 'Описание админки',
            'value' => 'Авторизуйтесь, чтобы управлять проектом',
            'details' => '',
            'type' => 'text',
            'group' => 'Admin',
        ]);

        Setting::create([
            'key' => 'site.title',
            'display_name' => 'Название сайта',
            'value' => 'BI UNIVERSITY',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.description',
            'display_name' => 'Описание сайта',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.google_analytics_tracking_id',
            'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'admin.google_analytics_client_id',
            'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Admin',
        ]);

        Setting::create([
            'key' => 'site.youtube',
            'display_name' => 'Ссылка на YouTube',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.telegram',
            'display_name' => 'Ссылка на Telegram',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.linkedin',
            'display_name' => 'Ссылка на LinkedIn',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.twitter',
            'display_name' => 'Ссылка на Twitter',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.whatsapp',
            'display_name' => 'Ссылка на WhatsApp',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.instagram',
            'display_name' => 'Ссылка на Instagram',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Setting::create([
            'key' => 'site.facebook',
            'display_name' => 'Ссылка на Facebook',
            'value' => '',
            'details' => '',
            'type' => 'text',
            'group' => 'Site',
        ]);

        Permission::generateFor('settings');
    }
}

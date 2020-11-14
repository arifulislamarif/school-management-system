<?php

namespace Database\Seeders;

use App\Models\WebsiteSettings;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $setting = new WebsiteSettings();
            $setting->name = "Site Name";
            $setting->email = "example@mail.com";
            $setting->logo_image = "backend/image/logo-default.png";
            $setting->favicon_image = "backend/image/logo-default.png";
            $setting->save();
    }
}

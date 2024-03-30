<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $site = new Site();
        $site->title = "Tejassvi";
        $site->email = "care@tejassvi.com";
        $site->phone = "9462576574";
        $site->whatsapp_no = "9462576574";
        $site->social_links = [
            "facebook" => "https://www.facebook.com/Tejassvi.online",
            "instagram" => 'https://www.instagram.com/tejassvi.com_',
        ];
        $site->save();
    }
}

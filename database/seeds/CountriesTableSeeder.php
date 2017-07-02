<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('countries')->truncate();

        DB::table('countries')->insert([
            'country_code' => 'KWD',
            'name_en' => 'Kuwait',
            'name_ar' => 'الكويت',
            'currency_en' => 'KD',
            'currency_ar' => 'د.ك',
        ]);

        DB::table('countries')->insert([
            'country_code' => 'BHD',
            'name_en' => 'Bahrain',
            'name_ar' => 'البحرين‎‎',
            'currency_en' => 'BD',
            'currency_ar' => 'د.ب',
        ]);

        DB::table('countries')->insert([
            'country_code' => 'OMR',
            'name_en' => 'Oman',
            'name_ar' => 'عُمان‎‎',
            'currency_en' => 'OMR',
            'currency_ar' => 'ر.ع',
        ]);

        DB::table('countries')->insert([
            'country_code' => 'SAR',
            'name_en' => 'Saudi Arabia',
            'name_ar' => 'السعودية',
            'currency_en' => 'SR',
            'currency_ar' => 'ر.س',
        ]);

        DB::table('countries')->insert([
            'country_code' => 'QAR',
            'name_en' => 'Qatar',
            'name_ar' => 'قطر‎‎',
            'currency_en' => 'QR',
            'currency_ar' => 'ر.ق',
        ]);

        DB::table('countries')->insert([
            'country_code' => 'AED',
            'name_en' => 'United Arab Emirates',
            'name_ar' => 'الإمارات',
            'currency_en' => 'AED',
            'currency_ar' => 'د.إ',
        ]);

        $this->command->info('Countries Seeded!');
    }
}

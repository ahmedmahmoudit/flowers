<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('areas')->truncate();

        // kuwait Areas
        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Kuwait City',
            'name_ar' => 'الكويت',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Dasmān',
            'name_ar' => 'دسمان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sharq',
            'name_ar' => 'شرق',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mirgāb',
            'name_ar' => 'المرقاب',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Jibla',
            'name_ar' => 'جبلة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Dasma',
            'name_ar' => 'الدسمة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Da\'iya',
            'name_ar' => 'الدعية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Salhiya',
            'name_ar' => 'الصالحية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sawābir',
            'name_ar' => 'الصوابر',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Bneid il-Gār',
            'name_ar' => 'بنيد القار',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Kaifan',
            'name_ar' => 'كيفان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mansūriya',
            'name_ar' => 'المنصورية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Abdullah as-Salim suburb',
            'name_ar' => 'ضاحية عبد الله السالم',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Nuzha',
            'name_ar' => 'النزهة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Faiha\'',
            'name_ar' => 'الفيحاء',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Shamiya',
            'name_ar' => 'الشامية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Rawda',
            'name_ar' => 'الروضة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Khaldiya',
            'name_ar' => 'الخالدية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Qadsiya',
            'name_ar' => 'القادسية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Qurtuba',
            'name_ar' => 'قرطبة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Surra',
            'name_ar' => 'السرة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Yarmūk',
            'name_ar' => 'اليرموك',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Shuwaikh',
            'name_ar' => 'الشويخ',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Rai',
            'name_ar' => 'الري',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Ghirnata',
            'name_ar' => 'غرناطة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sulaibikhat',
            'name_ar' => 'الصليبخات',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Doha',
            'name_ar' => 'الدوحة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Nahdha',
            'name_ar' => 'النهضة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Jabir al-Ahmad City',
            'name_ar' => 'مدينة جابر الأحمد',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Qairawān',
            'name_ar' => 'القيروان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

//        Hawally Governate
        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Hawally',
            'name_ar' => 'حولي',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Rumaithiya',
            'name_ar' => 'الرميثية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Jabriya',
            'name_ar' => 'الجابرية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Salmiya',
            'name_ar' => 'السالمية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mishrif',
            'name_ar' => 'مشرف',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sha\'ab	',
            'name_ar' => 'الشعب',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Bayān',
            'name_ar' => 'بيان',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Bi\'di\'	',
            'name_ar' => 'البدع',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Nigra	',
            'name_ar' => 'النقرة',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Salwa',
            'name_ar' => 'سلوى',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Maidan Hawalli',
            'name_ar' => 'ميدان حولي',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mubarak aj-Jabir suburb',
            'name_ar' => 'ضاحية مبارك الجابر',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'South Surra',
            'name_ar' => 'جنوب السرة',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Hittin',
            'name_ar' => 'حطين',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

//        Mubarak al-Kabeer Governorate

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mubarak al-Kabeer',
            'name_ar' => 'مبارك الكبير',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Adān',
            'name_ar' => 'العدان',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Qurain',
            'name_ar' => 'القرين',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Qusūr',
            'name_ar' => 'القصور',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sabah as-Salim suburb',
            'name_ar' => 'ضاحية صباح السالم',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Misīla',
            'name_ar' => 'المسيلة',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Abu \'Fteira',
            'name_ar' => 'أبو فطيرة',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sabhān',
            'name_ar' => 'صبحان',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Fintās',
            'name_ar' => 'الفنطاس',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Funaitīs',
            'name_ar' => 'الفنيطيس',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

//        Ahmadi Governorate

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Ahmadi',
            'name_ar' => 'الأحمدي',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Aqila',
            'name_ar' => 'العقيلة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Zuhar',
            'name_ar' => 'الظهر',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Miqwa\'',
            'name_ar' => 'المقوع',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mahbula',
            'name_ar' => 'المهبولة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Rigga',
            'name_ar' => 'الرقة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Hadiya',
            'name_ar' => 'هدية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Abu Hulaifa',
            'name_ar' => 'أبو حليفة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sabahiya',
            'name_ar' => 'الصباحية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Mangaf',
            'name_ar' => 'المنقف',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Fahaheel',
            'name_ar' => 'الفحيحيل',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Wafra',
            'name_ar' => 'الوفرة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Zoor',
            'name_ar' => 'الزور',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Khairan',
            'name_ar' => 'الخيران',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Abdullah Port',
            'name_ar' => 'ميناء عبد الله',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Agricultural Wafra',
            'name_ar' => 'الوفرة الزراعية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Bneidar',
            'name_ar' => 'بنيدر',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Jilei\'a',
            'name_ar' => 'الجليعة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Jabir al-Ali Suburb',
            'name_ar' => 'ضاحية جابر العلي',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Fahd al-Ahmad Suburb',
            'name_ar' => 'ضاحية فهد الأحمد',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Shu\'aiba',
            'name_ar' => 'الشعيبة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sabah al-Ahmad City',
            'name_ar' => 'مدينة صباح الأحمد',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Nuwaiseeb',
            'name_ar' => 'النويصيب',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Khairan City',
            'name_ar' => 'مدينة الخيران',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Ali as-Salim suburb',
            'name_ar' => 'ضاحية علي صباح السالم',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id' => '1',
            'name_en' => 'Sabah al-Ahmad Nautical City',
            'name_ar' => 'مدينة صباح الأحمد البحرية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

//        BAHRIN COUNTRY

        DB::table('areas')->insert([
            'country_id' => '2',
            'name_en' => 'Capital Governorate',
            'name_ar' => 'محافظة العاصمة‎‎',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'محافظة العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '2',
            'name_en' => 'Muharraq Governorate',
            'name_ar' => 'محافظة المحرق‎‎',
            'group_name_en' => 'Muharraq Governorate',
            'group_name_ar' => 'محافظة المحرق‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '2',
            'name_en' => 'Northern Governorate',
            'name_ar' => 'المحافظة الشمالية',
            'group_name_en' => 'Northern Governorate',
            'group_name_ar' => 'المحافظة الشمالية',
        ]);

        DB::table('areas')->insert([
            'country_id' => '2',
            'name_en' => 'Southern Governorate',
            'name_ar' => 'المحافظة الجنوبية‎‎',
            'group_name_en' => 'Southern Governorate',
            'group_name_ar' => 'المحافظة الجنوبية‎‎',
        ]);

//        OMAN COUNTRY

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Nizwa',
            'name_ar' => 'نزوى‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Samail',
            'name_ar' => 'سمائل‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Bahla',
            'name_ar' => 'بهلا‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Adam',
            'name_ar' => 'آدم‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Hamra',
            'name_ar' => 'الحمراء‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Bidbid',
            'name_ar' => 'بدبد‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Manah',
            'name_ar' => 'منح‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Izki',
            'name_ar' => 'إزكي‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Sohar',
            'name_ar' => 'صُحار‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Shinas',
            'name_ar' => 'شناص',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Liwa',
            'name_ar' => 'ليوه',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Saham',
            'name_ar' => 'صحم‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al-Khaburah',
            'name_ar' => 'الخابورة‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Suwaiq',
            'name_ar' => 'السويق‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Rustaq',
            'name_ar' => 'الرستاق‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Awabi',
            'name_ar' => 'القوابي‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Nakhal',
            'name_ar' => 'نخل‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Wadi al Maawil',
            'name_ar' => 'وادي الموايل',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Barka',
            'name_ar' => 'بركاء‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al-Musannah',
            'name_ar' => 'المصنعة‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Haima',
            'name_ar' => 'هيماء',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Duqm',
            'name_ar' => 'الدقم‎‎',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Mahout',
            'name_ar' => 'ماهوت',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Jazer',
            'name_ar' => 'الجزر',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Ibra',
            'name_ar' => 'ابراء‎‎',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Mudhaibi',
            'name_ar' => 'مودهابي',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Bidiya',
            'name_ar' => 'بيضيا',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Kabil',
            'name_ar' => 'قابل',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Wadi Bani Khalid',
            'name_ar' => 'وادي باني خالد',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Dima W’attayeen',
            'name_ar' => 'ديمه واطين',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Sur',
            'name_ar' => 'صور‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Kamil & Al Wafi',
            'name_ar' => 'Al Kamil & Al Wafi',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Jalan Bani Bu Hassan',
            'name_ar' => 'جعلان بني بو حسن‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Jalan Bani Bu Ali',
            'name_ar' => 'Jalan Bani Bu Ali',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Masirah',
            'name_ar' => 'مصيرة‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Ibri',
            'name_ar' => 'عبري‎‎',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Yanqul',
            'name_ar' => 'Yanqul',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Dhank',
            'name_ar' => 'Dhank',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Amarat',
            'name_ar' => 'العامرات‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Bawshar',
            'name_ar' => 'بوشر‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Muscat',
            'name_ar' => 'مسقط‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Muttrah',
            'name_ar' => 'مطرح‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Qurayyat',
            'name_ar' => 'Qurayyat',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Seeb',
            'name_ar' => 'السيب‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Khasab',
            'name_ar' => 'خصب‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Bukha',
            'name_ar' => 'Bukha',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Dibba Al-Baya',
            'name_ar' => 'دبا البيعة‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Madha',
            'name_ar' => 'مدحاء‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al-Mazyona',
            'name_ar' => 'المزيونة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Dhalkut',
            'name_ar' => 'ضلكوت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Mirbat',
            'name_ar' => 'مرباط',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Muqshin',
            'name_ar' => 'مقشن',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Rakhyut',
            'name_ar' => 'رخيوت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Sadah',
            'name_ar' => 'سدح',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Salalah',
            'name_ar' => 'صلالة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Shalim and the Hallaniyat Islands',
            'name_ar' => 'شليم وجزر الحلانيات',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Taqah',
            'name_ar' => 'طاقة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Thumrait',
            'name_ar' => 'ثمريت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '3',
            'name_en' => 'Al Buraimi',
            'name_ar' => 'البريمي‎‎',
            'group_name_en' => 'Al Buraimi',
            'group_name_ar' => 'البريمي‎‎',
        ]);


//        Saudi Arabia COUNTRY
        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Bahah',
            'name_ar' => 'الباحة‎‎',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Aqiq',
            'name_ar' => 'العقيق',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Karra',
            'name_ar' => 'الكرة',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Mandaq',
            'name_ar' => 'المندق',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Makhwah',
            'name_ar' => 'المخوة',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Baljurashi',
            'name_ar' => 'بلجرشي‎‎',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Qilwah',
            'name_ar' => 'قلوه',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Arar',
            'name_ar' => 'عرعر‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Rafha',
            'name_ar' => 'رفحاء‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Turaif',
            'name_ar' => 'طريف‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Haql',
            'name_ar' => 'حقل',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Dumat al-Jundal',
            'name_ar' => 'دومة الجندل‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Qurayyat',
            'name_ar' => 'القريات‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Sakakah',
            'name_ar' => 'سكاكا‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Medina',
            'name_ar' => 'المدينة المنورة‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Henakiyah',
            'name_ar' => 'الحناكية',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Ola',
            'name_ar' => 'العلا',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Badr',
            'name_ar' => 'بَـدْر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Khaybar',
            'name_ar' => 'خيبر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Mahd adh-Dhahab',
            'name_ar' => 'مَـهـد الـذّهـب‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Yanbu\' al Bahr',
            'name_ar' => 'ينبع البحر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Badayea',
            'name_ar' => 'البادية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Bukayriyah',
            'name_ar' => 'البكيرية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Mithnab',
            'name_ar' => 'آل المذنب',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Nabhaniyah',
            'name_ar' => 'النبهانية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ar Rass',
            'name_ar' => 'الرس‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Shimasiyah',
            'name_ar' => 'الشماسية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ayn Ibn Fuhayd',
            'name_ar' => 'عين إبن فهيد',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Buraidah',
            'name_ar' => 'بريدة‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Riyadh Al Khabra',
            'name_ar' => 'رياض أل خبر',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Unaizah',
            'name_ar' => 'عنيزة‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Uyun AlJiwa',
            'name_ar' => 'عيون الجواء‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Afif',
            'name_ar' => 'عفيف‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Layla',
            'name_ar' => 'لیلى',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Diriyah',
            'name_ar' => 'الدرعية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Duwadimi',
            'name_ar' => 'الدوادمي',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-Ghat',
            'name_ar' => 'الغاط',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-H̨arīq',
            'name_ar' => 'الحريق‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-Kharj',
            'name_ar' => 'الخرج‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Majma\'ah',
            'name_ar' => 'المجمعة‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-Muzahmiyya',
            'name_ar' => 'المزاحمية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Riyadh',
            'name_ar' => 'الرياض‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-Quway\'iyah',
            'name_ar' => 'القويعية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Sulayyil',
            'name_ar' => 'السليل‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Zulfi',
            'name_ar' => 'الزلفي',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Dhurma',
            'name_ar' => 'ضرما‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Howtat Bani Tamim',
            'name_ar' => 'حوطة بني تميم',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Huraymila',
            'name_ar' => 'حريملا',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Rumah',
            'name_ar' => 'رماح',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Shaqra',
            'name_ar' => 'شقرا',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Thadiq',
            'name_ar' => 'ثادق‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Wadi Al Dawasir',
            'name_ar' => 'وادي الدواسر‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Abha',
            'name_ar' => 'أبها‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ahad Rafidah',
            'name_ar' => 'أهاد رفيدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Majaridah',
            'name_ar' => 'المجريدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al-Namas',
            'name_ar' => 'النماص‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Bareq',
            'name_ar' => 'بارق‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Bisha',
            'name_ar' => 'بيشة‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Dhahran Al Janub',
            'name_ar' => 'الظهران الجنوب',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Khamis Mushait',
            'name_ar' => 'خميس مشيط‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Muhayil',
            'name_ar' => 'Muhayil',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Rojal',
            'name_ar' => 'Rojal',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Sarat Abidah',
            'name_ar' => 'سارة عبيدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Tathlith',
            'name_ar' => 'Tathlith',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Dammam',
            'name_ar' => 'الدمام‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Ahsa',
            'name_ar' => 'الأحساء‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ras Al Khafji',
            'name_ar' => 'رأس الخفجي‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Kharkhir',
            'name_ar' => 'الخرخير',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Khobar',
            'name_ar' => 'الخبر‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Nairyah',
            'name_ar' => 'النعيرية',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Qatif',
            'name_ar' => 'القطيف‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Abqaiq',
            'name_ar' => 'بقيق‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Hafar Al-Batin',
            'name_ar' => 'حفر الباطن‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Jubail',
            'name_ar' => 'الجبيل‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Qaryat al-Ulya',
            'name_ar' => 'قرية العليا‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ras Tanura',
            'name_ar' => 'رأس تنورة',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Khazaiah',
            'name_ar' => 'Al Khazaiah',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Shinan',
            'name_ar' => 'الشنان',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Baqaa',
            'name_ar' => 'البقعة',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ha\'il',
            'name_ar' => 'حائل‎‎',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Abu `Arish',
            'name_ar' => 'أبو العريش',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ahad al Masarihah',
            'name_ar' => 'أهاد المصريحة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Darb',
            'name_ar' => 'الدرب',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Dayer',
            'name_ar' => 'الدير',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Aridhah',
            'name_ar' => 'العريضه',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Edabi',
            'name_ar' => 'الدابي',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Haridhah',
            'name_ar' => 'الحريضة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Reeth',
            'name_ar' => 'الريث',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Baish',
            'name_ar' => 'بيش',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Damad',
            'name_ar' => 'داماد',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Farasan',
            'name_ar' => 'فرسان',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Jizan',
            'name_ar' => 'جازان‎‎',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Sabya',
            'name_ar' => 'صبيا',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Samtah',
            'name_ar' => 'صامطة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Jumum',
            'name_ar' => 'الجموم',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Kamil',
            'name_ar' => 'الكامل',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Khurmah',
            'name_ar' => 'الخرمه',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Lith',
            'name_ar' => 'الليث‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Qunfudhah',
            'name_ar' => 'القنفذة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ta\'if',
            'name_ar' => 'الطائف‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Jeddah',
            'name_ar' => 'جدة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Khulays',
            'name_ar' => 'خليص',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Mecca',
            'name_ar' => 'مكة',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Rabigh',
            'name_ar' => 'رابغ‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Ranyah',
            'name_ar' => 'Ranyah',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Turubah',
            'name_ar' => 'تربة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Badr Al Janub',
            'name_ar' => 'بدر الجنوب',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Hubuna',
            'name_ar' => 'Hubuna',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Khubash',
            'name_ar' => 'Khubash',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Najran',
            'name_ar' => 'نجران‎‎',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Sharurah',
            'name_ar' => 'شرورة',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Thar',
            'name_ar' => 'ثار',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Yadamah',
            'name_ar' => 'يدمة',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Al Wajh',
            'name_ar' => 'الوجه‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Duba',
            'name_ar' => 'ضبا‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Tabuk',
            'name_ar' => 'تبوك‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Tayma',
            'name_ar' => 'تيماء‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en' => 'Umluj',
            'name_ar' => 'أملج',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);


//      QATAR
        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Abu Dhalouf',
            'name_ar' => 'أبو ظلوف‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Ain Mohammed',
            'name_ar' => 'عين محمد',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Ain Sanan',
            'name_ar' => 'عين سنان',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al `Arish',
            'name_ar' => 'العريش‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al-Gamashiya',
            'name_ar' => 'الغاشية',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Ghariyah',
            'name_ar' => 'الغارية‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al-Judhe',
            'name_ar' => 'Al-Judhe',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Khuwayr',
            'name_ar' => 'الخوير‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Mafjar',
            'name_ar' => 'المفجر‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al-Mourouna',
            'name_ar' => 'آل المارون',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al-Naaman',
            'name_ar' => 'النعمان',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Madinat ash Shamal',
            'name_ar' => 'الشمال‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Ar Ru\'ays',
            'name_ar' => 'اَلرُّؤَيْس‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Freiha',
            'name_ar' => 'فريحة‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Fuwayrit',
            'name_ar' => 'فويرط‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Jebel Jassassiyeh',
            'name_ar' => 'جبل القصاصية',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Madinat Al Kaaban',
            'name_ar' => 'مدينة الكعبان‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Umm Jassim',
            'name_ar' => 'أم جاسم',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Umm Al Maa',
            'name_ar' => 'أم آل ما',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Zubarah',
            'name_ar' => 'الزبارة‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Khor',
            'name_ar' => 'الخور‎‎',
            'group_name_en' => 'Al Khor',
            'group_name_ar' => 'الخور‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Umm Salal',
            'name_ar' => 'أم صلال‎‎',
            'group_name_en' => 'Umm Salal',
            'group_name_ar' => 'أم صلال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Daayen',
            'name_ar' => 'الضعاين‎‎',
            'group_name_en' => 'Al Daayen',
            'group_name_ar' => 'الضعاين‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Rayyan',
            'name_ar' => 'الريان‎‎',
            'group_name_en' => 'Al Rayyan',
            'group_name_ar' => 'الريان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Doha',
            'name_ar' => 'الدوحة‎‎',
            'group_name_en' => 'Doha',
            'group_name_ar' => 'الدوحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al Wakrah',
            'name_ar' => 'الوكرة‎‎',
            'group_name_en' => 'Al Wakrah',
            'group_name_ar' => 'الوكرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '5',
            'name_en' => 'Al-Shahaniya',
            'name_ar' => 'الشحانية',
            'group_name_en' => 'Al-Shahaniya',
            'group_name_ar' => 'الشحانية',
        ]);


//      United Arab Emirates
        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Dubai',
            'name_ar' => 'دبي‎‎',
            'group_name_en' => 'Dubai',
            'group_name_ar' => 'دبي‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Abu Dhabi',
            'name_ar' => 'أبو ظبي‎‎',
            'group_name_en' => 'Abu Dhabi',
            'group_name_ar' => 'أبو ظبي‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Sharjah',
            'name_ar' => 'الشارقة‎‎',
            'group_name_en' => 'Sharjah',
            'group_name_ar' => 'الشارقة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Al Ain',
            'name_ar' => 'العين‎‎',
            'group_name_en' => 'Al Ain',
            'group_name_ar' => 'العين‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Ajman',
            'name_ar' => 'عجمان‎‎',
            'group_name_en' => 'Ajman',
            'group_name_ar' => 'عجمان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Ras al-Khaimah',
            'name_ar' => 'رأس الخيمة‎‎',
            'group_name_en' => 'Ras al-Khaimah',
            'group_name_ar' => 'رأس الخيمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Fujairah',
            'name_ar' => 'الفجيرة‎‎',
            'group_name_en' => 'Fujairah',
            'group_name_ar' => 'الفجيرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id' => '6',
            'name_en' => 'Umm al-Quwain',
            'name_ar' => 'أمّ القيوين‎‎',
            'group_name_en' => 'Umm al-Quwain',
            'group_name_ar' => 'أمّ القيوين‎‎',
        ]);



        $this->command->info('Areas Seeded!');
    }
}

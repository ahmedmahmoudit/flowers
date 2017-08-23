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
            'country_id'    => '1',
            'name_en'       => 'Kuwait City',
            'name_ar'       => 'الكويت',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Dasmān',
            'name_ar'       => 'دسمان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sharq',
            'name_ar'       => 'شرق',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Kuwait City',
            'name_ar'       => 'الكويت',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mirgāb',
            'name_ar'       => 'المرقاب',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Jibla',
            'name_ar'       => 'جبلة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Dasma',
            'name_ar'       => 'الدسمة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Da\'iya',
            'name_ar'       => 'الدعية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Salhiya',
            'name_ar'       => 'الصالحية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sawābir',
            'name_ar'       => 'الصوابر',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Bneid il-Gār',
            'name_ar'       => 'بنيد القار',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Kaifan',
            'name_ar'       => 'كيفان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mansūriya',
            'name_ar'       => 'المنصورية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Abdullah as-Salim suburb',
            'name_ar'       => 'ضاحية عبد الله السالم',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Nuzha',
            'name_ar'       => 'النزهة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Faiha\'',
            'name_ar'       => 'الفيحاء',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Shamiya',
            'name_ar'       => 'الشامية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Rawda',
            'name_ar'       => 'الروضة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Khaldiya',
            'name_ar'       => 'الخالدية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Qadsiya',
            'name_ar'       => 'القادسية',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Qurtuba',
            'name_ar'       => 'قرطبة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Surra',
            'name_ar'       => 'السرة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Yarmūk',
            'name_ar'       => 'اليرموك',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Shuwaikh',
            'name_ar'       => 'الشويخ',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Rai',
            'name_ar'       => 'الري',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Ghirnata',
            'name_ar'       => 'غرناطة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sulaibikhat',
            'name_ar'       => 'الصليبخات',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Doha',
            'name_ar'       => 'الدوحة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Nahdha',
            'name_ar'       => 'النهضة',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Jabir al-Ahmad City',
            'name_ar'       => 'مدينة جابر الأحمد',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Qairawān',
            'name_ar'       => 'القيروان',
            'group_name_en' => 'Capital Governorate',
            'group_name_ar' => 'العاصمة‎‎',
        ]);

//        Hawally Governate
        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Hawally',
            'name_ar'       => 'حولي',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Rumaithiya',
            'name_ar'       => 'الرميثية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Jabriya',
            'name_ar'       => 'الجابرية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Salmiya',
            'name_ar'       => 'السالمية',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mishrif',
            'name_ar'       => 'مشرف',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sha\'ab	',
            'name_ar'       => 'الشعب',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Bayān',
            'name_ar'       => 'بيان',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Bi\'di\'	',
            'name_ar'       => 'البدع',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Nigra	',
            'name_ar'       => 'النقرة',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Salwa',
            'name_ar'       => 'سلوى',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Maidan Hawalli',
            'name_ar'       => 'ميدان حولي',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mubarak aj-Jabir suburb',
            'name_ar'       => 'ضاحية مبارك الجابر',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'South Surra',
            'name_ar'       => 'جنوب السرة',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Hittin',
            'name_ar'       => 'حطين',
            'group_name_en' => 'Hawalli Governorate',
            'group_name_ar' => 'حولي',
        ]);

//        Mubarak al-Kabeer Governorate

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mubarak al-Kabeer',
            'name_ar'       => 'مبارك الكبير',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Adān',
            'name_ar'       => 'العدان',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Qurain',
            'name_ar'       => 'القرين',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Qusūr',
            'name_ar'       => 'القصور',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sabah as-Salim suburb',
            'name_ar'       => 'ضاحية صباح السالم',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Misīla',
            'name_ar'       => 'المسيلة',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Abu \'Fteira',
            'name_ar'       => 'أبو فطيرة',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sabhān',
            'name_ar'       => 'صبحان',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Fintās',
            'name_ar'       => 'الفنطاس',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Funaitīs',
            'name_ar'       => 'الفنيطيس',
            'group_name_en' => 'Mubarak al-Kabeer Governorate',
            'group_name_ar' => 'مبارك الكبير',
        ]);

//        Ahmadi Governorate

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Ahmadi',
            'name_ar'       => 'الأحمدي',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Aqila',
            'name_ar'       => 'العقيلة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Zuhar',
            'name_ar'       => 'الظهر',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Miqwa\'',
            'name_ar'       => 'المقوع',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mahbula',
            'name_ar'       => 'المهبولة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Rigga',
            'name_ar'       => 'الرقة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Hadiya',
            'name_ar'       => 'هدية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Abu Hulaifa',
            'name_ar'       => 'أبو حليفة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sabahiya',
            'name_ar'       => 'الصباحية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Mangaf',
            'name_ar'       => 'المنقف',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Fahaheel',
            'name_ar'       => 'الفحيحيل',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Wafra',
            'name_ar'       => 'الوفرة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Zoor',
            'name_ar'       => 'الزور',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Khairan',
            'name_ar'       => 'الخيران',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Abdullah Port',
            'name_ar'       => 'ميناء عبد الله',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Agricultural Wafra',
            'name_ar'       => 'الوفرة الزراعية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Bneidar',
            'name_ar'       => 'بنيدر',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Jilei\'a',
            'name_ar'       => 'الجليعة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Jabir al-Ali Suburb',
            'name_ar'       => 'ضاحية جابر العلي',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Fahd al-Ahmad Suburb',
            'name_ar'       => 'ضاحية فهد الأحمد',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Shu\'aiba',
            'name_ar'       => 'الشعيبة',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sabah al-Ahmad City',
            'name_ar'       => 'مدينة صباح الأحمد',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Nuwaiseeb',
            'name_ar'       => 'النويصيب',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Khairan City',
            'name_ar'       => 'مدينة الخيران',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Ali as-Salim suburb',
            'name_ar'       => 'ضاحية علي صباح السالم',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '1',
            'name_en'       => 'Sabah al-Ahmad Nautical City',
            'name_ar'       => 'مدينة صباح الأحمد البحرية',
            'group_name_en' => 'Ahmadi Governorate',
            'group_name_ar' => 'الأحمدي',
        ]);

//        BAHRIN COUNTRY

//        DB::table('areas')->insert([
//            'country_id'    => '2',
//            'name_en'       => 'Capital Governorate',
//            'name_ar'       => 'محافظة العاصمة‎‎',
//            'group_name_en' => 'Capital Governorate',
//            'group_name_ar' => 'محافظة العاصمة‎‎',
//        ]);
//
//        DB::table('areas')->insert([
//            'country_id'    => '2',
//            'name_en'       => 'Muharraq Governorate',
//            'name_ar'       => 'محافظة المحرق‎‎',
//            'group_name_en' => 'Muharraq Governorate',
//            'group_name_ar' => 'محافظة المحرق‎‎',
//        ]);
//
//        DB::table('areas')->insert([
//            'country_id'    => '2',
//            'name_en'       => 'Northern Governorate',
//            'name_ar'       => 'المحافظة الشمالية',
//            'group_name_en' => 'Northern Governorate',
//            'group_name_ar' => 'المحافظة الشمالية',
//        ]);
//
//        DB::table('areas')->insert([
//            'country_id'    => '2',
//            'name_en'       => 'Southern Governorate',
//            'name_ar'       => 'المحافظة الجنوبية‎‎',
//            'group_name_en' => 'Southern Governorate',
//            'group_name_ar' => 'المحافظة الجنوبية‎‎',
//        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_en'    => '',
            'name_ar'    => '',
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "جدة",
            'name_en'    => "jeddah",
        ]);
        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الرياض", 'name_en' => "riyadh",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "خبر", 'name_en' => "khobar",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الدمام", 'name_en' => "dammam",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "أبها", 'name_en' => "abha",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "بقيق", 'name_en' => "abqiq",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "ابو عريش", 'name_en' => "abu-arish",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الأحساء", 'name_en' => "al-ahsa",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الباحة", 'name_en' => "al-baha",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الظهران", 'name_en' => "al-dhahran",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الجش", 'name_en' => "al-jish",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الجبيل", 'name_en' => "al-jubail",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الخرج", 'name_en' => "al-kharj",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "المدينة المنورة", 'name_en' => "al-madina-el-monawara",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "القطيف", 'name_en' => "al-qatif",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الطائف", 'name_en' => "al-taif",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "البكيرية", 'name_en' => "al-bokiria",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "المذنب", 'name_en' => "almadnab",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4', 'name_ar' => "عرعر", 'name_en' => "arar",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "بيشة", 'name_en' => "bisha",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "بريدة", 'name_en' => "buraida",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الدلم", 'name_en' => "dalam",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الدوادمي", 'name_en' => "dawadmy",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "حفر الباطن", 'name_en' => "hafr-elbatin",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "حائل", 'name_en' => "hail",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الجفر", 'name_en' => "jafr",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "جازان", 'name_en' => "jazan",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الخفجي", 'name_en' => "khafjie",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "خميس مشيط", 'name_en' => "khamis-mushayt",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "مكة المكرمة", 'name_en' => "macca",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "المجمعة", 'name_en' => "magmaa",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "محائل عسير", 'name_en' => "mahayel-asir",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "مزاحمية", 'name_en' => "muzahmaia",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "النعيرية", 'name_en' => "naariya",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "عنيزة", 'name_en' => "oniza",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "القصيم", 'name_en' => "qassim",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "القريات", 'name_en' => "qurayat",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "رابغ", 'name_en' => "rabgh",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "رفحاء", 'name_en' => "rafha",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "راس تنورة", 'name_en' => "ras-tanura",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الرس", 'name_en' => "rass",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "صفوى", 'name_en' => "safwa",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "سكاكا", 'name_en' => "sakaka",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "شقراء", 'name_en' => "shaqra",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "سيهات", 'name_en' => "sihat",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "تبوك", 'name_en' => "tabuk",
        ]);

        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "طريف", 'name_en' => "turaif",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "ينبع", 'name_en' => "yanbu",
        ]);


        DB::table('areas')->insert([
            'country_id' => '4',
            'name_ar'    => "الزلفي", 'name_en' => "zulfi",
        ]);


        DB::table('areas')->insert([
            "country_id" => "2",
            "name_ar"    => "عالي",
            "name_en"    => "a'ali"
        ]);

        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "أبو ابهام", "name_en" => "abu-baham"]);

        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "أبو صيبع", "name_en" => "abu-saiba"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "عذاري ", "name_en" => "adhari"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "العدلية", "name_en" => "adliya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "البحير", "name_en" => "al-bahair"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "البرهامة", "name_en" => "al-burhama"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الدير", "name_en" => "al-dair"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الحجر", "name_en" => "al-hajar"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الحورة", "name_en" => "al-hoora"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الجنبية", "name_en" => "al-janabiyah",]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الجسرة", "name_en" => "al-jasra"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "اللوزي", "name_en" => "al-lawzi"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المقشع", "name_en" => "al-maqsha"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المرخ", "name_en" => "al-markh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المزروعية", "name_en" => "al-mazrowiah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المصلى", "name_en" => "al-musalla"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "القدم ", "name_en" => "al-qadam"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "القلعة", "name_en" => "al-qalah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "القرية", "name_en" => "al-qurayyah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الصافرية", "name_en" => "al-safriyah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الساية", "name_en" => "al-sayh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "العرين", "name_en" => "alareen"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الكورنيش", "name_en" => "alcorniche"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الفاتح", "name_en" => "alfateh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الغريفة", "name_en" => "alghurayfah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "القفول", "name_en" => "alguful"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الحجيات", "name_en" => "alhajiyat"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الحنينية", "name_en" => "alhunayniyah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الجفير", "name_en" => "aljuffair"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "النعيم", "name_en" => "alnaim"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السلمانية", "name_en" => "alsalmaniya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السويفية", "name_en" => "alsuwayfiyah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "أمواج ", "name_en" => "amwaj"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "عراد", "name_en" => "arad"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "عسكر", "name_en" => "askar"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "عسكر ألبا", "name_en" => "askar-alba"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "عوالي", "name_en" => "awali"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بحرين باي", "name_en" => "bahrain-bay"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المرفأ المالي", "name_en" => "bahrain-financial-harbour"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بني جمرة", "name_en" => "bni-jamra"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "باربار", "name_en" => "barbar"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "البلاد القديم", "name_en" => "bilad-al-qadeem"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بو عشيرة", "name_en" => "bu-ashira"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بو غزال", "name_en" => "bu-ghazal"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بو كوارة", "name_en" => "bu-kowarah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بوقوة", "name_en" => "bu-quwah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "البديع", "name_en" => "budaiya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بوري", "name_en" => "buri"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "البسيتين", "name_en" => "busaiteen"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الديه", "name_en" => "daih"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "دمستان", "name_en" => "damist"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "دار كليب", "name_en" => "dar-kulaib"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المنطقة الدبلوماسية", "name_en" => "diplomatic-area"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الدراز", "name_en" => "diraz"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "ديار المحرق", "name_en" => "diyar-al-muharraq"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "درة البحرين", "name_en" => "durrat-al-bahrain"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الرفاع الشرقي", "name_en" => "east-riffa"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "العكر الشرقي", "name_en" => "eastern-eker"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "قلالي", "name_en" => "galaly"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "حالة النعيم", "name_en" => "halat-naim"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "حالة السلطة", "name_en" => "halat-seltah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الهملة", "name_en" => "hamala"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الحد", "name_en" => "hidd"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "منطقة الحد الصناعية", "name_en" => "hidd-industrial-area"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "حلة العبد الصالح", "name_en" => "hillat-abdul-saleh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "هورة عالي", "name_en" => "hoarat-a'ali"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "مدينة عيسى", "name_en" => "isa-town"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جنوسان", "name_en" => "jnusan"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جاري الشيخ", "name_en" => "jary-al-shaikh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جو", "name_en" => "jaww"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "بلاج الجزائر", "name_en" => "jazaair-beach-/-bilag-al-jazaair"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جبلة حبشي", "name_en" => "jeblat-hebshi"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جد الحاج", "name_en" => "jid-al-haj"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جد علي", "name_en" => "jid-ali"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جدحفص", "name_en" => "jidhafs"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جرداب", "name_en" => "jurdab"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "كرباباد", "name_en" => "karbabad"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "كرانة ", "name_en" => "karranah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "كرزكان", "name_en" => "karzakkan"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الكوره", "name_en" => "kawarah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الخميس", "name_en" => "khamis"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المعامير", "name_en" => "ma`ameer"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "مدينة حمد", "name_en" => "madinat-hamad-/-hamad-town"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الماحوز", "name_en" => "mahooz"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المالكية", "name_en" => "malkiya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "وسط المنامة", "name_en" => "manama-center"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "مقابة", "name_en" => "maqabah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "ميناء سلمان", "name_en" => "mina-salman"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المحرق", "name_en" => "muharraq"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "النبيه صالح", "name_en" => "nabih-saleh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السهلة الشمالية", "name_en" => "north-sehla"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "المدينة الشمالية", "name_en" => "northern-city"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "النويدرات", "name_en" => "nuwaidrat"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "القضيبية", "name_en" => "qudaibiya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "رأس الرمان", "name_en" => "ras-rumman"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "جزيرة ريف", "name_en" => "reef-island"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الرفاع الشمالي", "name_en" => "riffa-alshamali-/-north-riffa"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "رفاع فيوز", "name_en" => "riffa-views"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سار", "name_en" => "saar"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "صدد", "name_en" => "sadad"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سافرة", "name_en" => "safreh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الصخير", "name_en" => "sakhir"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الصالحية", "name_en" => "salihiya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سلماباد", "name_en" => "salmabad"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سماهيج ", "name_en" => "samaheej"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سنابس", "name_en" => "sanabis"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سند", "name_en" => "sanad"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الواجهة البحرية / سيتي سنتر", "name_en" => "sea-front-/-city-center"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السيف", "name_en" => "seef"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السقية", "name_en" => "segaya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "شهركان", "name_en" => "shahrakkan"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الشاخورة", "name_en" => "shakhurah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة أبو العيش", "name_en" => "sitra-abu-alayash"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة الحمرية / مجمع سترة", "name_en" => "sitra-al-hamriyah-/-sitra-mall"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة الخارجية", "name_en" => "sitra-al-kharijiya"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة القريه", "name_en" => "sitra-al-qaryah"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "منطقة سترة الصناعية", "name_en" => "sitra-industrial-area"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة مهزة", "name_en" => "sitra-mahaza"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة مرقوبان", "name_en" => "sitra-murqoban"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة سفالة", "name_en" => "sitra-sufala"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة أم البيض", "name_en" => "sitra-um-al-baidh"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "سترة واديان", "name_en" => "sitra-wadiyan"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "السهلة الجنوبية", "name_en" => "south-sehla"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "طشان", "name_en" => "tashan"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "توبلي", "name_en" => "tubli"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "ام الحصم", "name_en" => "umm-al-hassam"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "وادي السيل", "name_en" => "wadi-alsail"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الرفاع الغربي", "name_en" => "west-riffa"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "العكر الغربي", "name_en" => "western-eker"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الزلاق", "name_en" => "zallaq"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "مدينة زايد", "name_en" => "zayed-town"]);
        DB::table('areas')->insert([
            'country_id' => "2", "name_ar" => "الزنج", "name_en" => "zinj"]);




        $this->command->info('Areas Seeded!');
    }
}

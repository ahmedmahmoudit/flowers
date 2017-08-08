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
            'name_en' => 'Kuwait City',
            'name_ar' => 'الكويت',
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
            'name_en' => '',
            'name_ar' => '',
            'group_name_en' => '',
            'group_name_ar' => '',
        ]);


        $this->command->info('Areas Seeded!');
    }
}

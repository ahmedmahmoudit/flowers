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

        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "عباسية", "name_en" => "abbasiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "عبدالله المبارك غرب جليب", "name_en" => "abdullah-al-mubarak---west-jleeb",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "عبدالله السالم", "name_en" => "abdullah-al-salem",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "أبرق خيطان", "name_en" => "abraq-khaithan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "أبو فطيرة", "name_en" => "abu-ftaira",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ابوحليفة", "name_en" => "abu-halifa",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "أبو الحصانية", "name_en" => "abu-hasaniya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العديلية", "name_en" => "adailiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العدان", "name_en" => "adan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المطار", "name_en" => "airport",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الجليعة  والزور وصولة", "name_en" => "al-julayah---az-zour-sulah",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المسايل", "name_en" => "al-masayel",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "النعيم", "name_en" => "al-naeem",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الأحمدي", "name_en" => "al-ahmadi",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "البدع", "name_en" => "al-bedae",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => " على صباح السالم - ام الهيمان", "name_en" => "ali-sabah-al-salem---umm-al-hayman",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "القرين", "name_en" => "al-qurain",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "القصور", "name_en" => "al-qusour",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "أمغرة الصناعية", "name_en" => "amgarah-industrial",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الأندلس", "name_en" => "andalous",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العارضية", "name_en" => "ardhiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "عارضية الصناعية", "name_en" => "ardiya-small-industrial",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "عارضية مخازن", "name_en" => "ardiya-storage-zone",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "أشبيليا", "name_en" => "ashbeliah",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "بيان", "name_en" => "bayan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "بنيد القار", "name_en" => "bneid-al-qar",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "شريط الساحلي ب", "name_en" => "coast-strip-b",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الدعية", "name_en" => "daiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الدسمة", "name_en" => "dasma",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "دسمان", "name_en" => "dasman",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الظهر", "name_en" => "dhaher",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ضجيج", "name_en" => "dhajeej",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الدوحة", "name_en" => "doha",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "شرق الاحمدي", "name_en" => "east-al-ahmadi",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العقيلة", "name_en" => "egaila",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "منطقة المعارض جنوب خيطان", "name_en" => "south-khaithan"
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "فهد الاحمد", "name_en" => "fahad-al-ahmed",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الفحيحيل", "name_en" => "fahaheel",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الفيحاء", "name_en" => "faiha",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الفروانية", "name_en" => "farwaniya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الفردوس", "name_en" => "ferdous",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الفنطاس", "name_en" => "fintas",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "فنيطيس", "name_en" => "fnaitess",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "غرناطة", "name_en" => "ghornata",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "هدية", "name_en" => "hadiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "حولي", "name_en" => "hawally",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "حطين", "name_en" => "hitteen",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "جابر الأحمد", "name_en" => "jaber-al-ahmed",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "جابر العلي", "name_en" => "jaber-al-ali",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الجابرية", "name_en" => "jabriya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الجهراء", "name_en" => "jahra",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "جليب شيوخ", "name_en" => "jleeb-al-shiyoukh",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "كبد", "name_en" => "kabd",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "كيفان", "name_en" => "kaifan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الخيران", "name_en" => "khairan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "خيطان", "name_en" => "khaitan",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الخالدية", "name_en" => "khaldiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مدينة الكويت", "name_en" => "kuwait-city",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مقوع", "name_en" => "magwa",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المهبولة", "name_en" => "mahboula",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ميدان حولي", "name_en" => "maidan-hawally",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المنقف", "name_en" => "mangaf",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المنصورية", "name_en" => "mansouriya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المسيلة", "name_en" => "messila",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ميناء عبدالله", "name_en" => "mina-abdullah",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ميناء الاحمدي", "name_en" => "mina-al-ahmadi",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "المرقاب", "name_en" => "mirqab",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مشرف", "name_en" => "mishrif",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مبارك العبدالله غرب مشرف", "name_en" => "mubarak-al-abdullah---west-mishref",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مبارك الكبير", "name_en" => "mubarak-al-kabir",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "معسكرات المباركية", "name_en" => "mubarakiya-camps",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "النهضة", "name_en" => "nahda",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "النسيم", "name_en" => "nasseem",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "النويصب", "name_en" => "nuwaiseeb",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "النزهة", "name_en" => "nuzha",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العمرية", "name_en" => "omariya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "العيون", "name_en" => "oyoun",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "القادسية", "name_en" => "qadsiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "قيروان جنوب الدوحة", "name_en" => "qairawan-south-doha",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "قصر", "name_en" => "qasr",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "القبلة", "name_en" => "qibla",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "قرطبة", "name_en" => "qortuba",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الرابية", "name_en" => "rabiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الري", "name_en" => "rai",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الروضة", "name_en" => "rawda",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الرقعي", "name_en" => "reggai",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الرحاب", "name_en" => "rehab",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الرقة", "name_en" => "riqqa",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الرميثية", "name_en" => "rumaithiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "سعد العبد الله", "name_en" => "saad-al-abdullah",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مدينة صباح الأحمد البحرية", "name_en" => "sabah-al-ahmad-marine-city",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صباح الأحمد السكنية", "name_en" => "sabah-al-ahmad-residential",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صباح الناصر", "name_en" => "sabah-al-nasser",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صباح السالم", "name_en" => "sabah-al-salem",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الصباحية", "name_en" => "sabahiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صبحان الصناعية", "name_en" => "sabhan-industrial",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "السلام", "name_en" => "salam",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الصالحية", "name_en" => "salhiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "السالمية", "name_en" => "salmiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "سلوى", "name_en" => "salwa",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الشعب", "name_en" => "shaab",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الشامية", "name_en" => "shamiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الشرق", "name_en" => "sharq",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مطار الشيخ سعد العبدالله", "name_en" => "sheikh-saad-al-abdullah-airport",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "ميناء الشعيبة", "name_en" => "shuaiba-port",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الشهداء", "name_en" => "shuhada",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الشويخ", "name_en" => "shuwaikh",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الصديق", "name_en" => "siddiq",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "جنوب الوسطي", "name_en" => "south-wista",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الصليبخات", "name_en" => "sulaibikhat",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صليبية", "name_en" => "sulaibiya",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صليبية الصناعيه 1", "name_en" => "sulaibiya-indutrial-1",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صليبية الصناعيه 2", "name_en" => "sulaibiya-indutrial-2",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "صليبية السكنية", "name_en" => "sulaibiya-residential",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "السرة", "name_en" => "surra",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "تيماء", "name_en" => "taima",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "مزارع الوفرة", "name_en" => "wafra-farms",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الوفرة السكنية", "name_en" => "wafra-residential",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الواحة", "name_en" => "waha",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "غرب ابو فطيرة الحرفية", "name_en" => "west-abu-fetera-small-indust",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "وسطي", "name_en" => "wista",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "اليرموك", "name_en" => "yarmouk",
        ]);
        DB::table('areas')->insert([
            'country_id' => '1', "name_ar" => "الزهراء", "name_en" => "zahra",
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
            'country_id'    => '3',
            'name_en'       => 'Nizwa',
            'name_ar'       => 'نزوى‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Samail',
            'name_ar'       => 'سمائل‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Bahla',
            'name_ar'       => 'بهلا‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Adam',
            'name_ar'       => 'آدم‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Hamra',
            'name_ar'       => 'الحمراء‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Bidbid',
            'name_ar'       => 'بدبد‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Manah',
            'name_ar'       => 'منح‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Izki',
            'name_ar'       => 'إزكي‎‎',
            'group_name_en' => 'Ad Dakhiliyah Governorate',
            'group_name_ar' => 'محافظة الداخلية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Sohar',
            'name_ar'       => 'صُحار‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Shinas',
            'name_ar'       => 'شناص',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Liwa',
            'name_ar'       => 'ليوه',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Saham',
            'name_ar'       => 'صحم‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al-Khaburah',
            'name_ar'       => 'الخابورة‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Suwaiq',
            'name_ar'       => 'السويق‎‎',
            'group_name_en' => 'Al Batinah North Governorate',
            'group_name_ar' => 'محافظة شمال الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Rustaq',
            'name_ar'       => 'الرستاق‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Awabi',
            'name_ar'       => 'القوابي‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Nakhal',
            'name_ar'       => 'نخل‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Wadi al Maawil',
            'name_ar'       => 'وادي الموايل',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Barka',
            'name_ar'       => 'بركاء‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al-Musannah',
            'name_ar'       => 'المصنعة‎‎',
            'group_name_en' => 'Al Batinah South Governorate',
            'group_name_ar' => 'محافظة جنوب الباطنة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Haima',
            'name_ar'       => 'هيماء',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Duqm',
            'name_ar'       => 'الدقم‎‎',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Mahout',
            'name_ar'       => 'ماهوت',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Jazer',
            'name_ar'       => 'الجزر',
            'group_name_en' => 'Al Wusta',
            'group_name_ar' => 'الوسطى‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Ibra',
            'name_ar'       => 'ابراء‎‎',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Mudhaibi',
            'name_ar'       => 'مودهابي',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Bidiya',
            'name_ar'       => 'بيضيا',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Kabil',
            'name_ar'       => 'قابل',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Wadi Bani Khalid',
            'name_ar'       => 'وادي باني خالد',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Dima W’attayeen',
            'name_ar'       => 'ديمه واطين',
            'group_name_en' => 'Ash Sharqiyah North Governorate',
            'group_name_ar' => 'محافظة شمال الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Sur',
            'name_ar'       => 'صور‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Kamil & Al Wafi',
            'name_ar'       => 'Al Kamil & Al Wafi',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Jalan Bani Bu Hassan',
            'name_ar'       => 'جعلان بني بو حسن‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Jalan Bani Bu Ali',
            'name_ar'       => 'Jalan Bani Bu Ali',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Masirah',
            'name_ar'       => 'مصيرة‎‎',
            'group_name_en' => 'Ash Sharqiyah South Governorate',
            'group_name_ar' => 'محافظة جنوب الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Ibri',
            'name_ar'       => 'عبري‎‎',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Yanqul',
            'name_ar'       => 'Yanqul',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Dhank',
            'name_ar'       => 'Dhank',
            'group_name_en' => 'Ad Dhahirah Governorate',
            'group_name_ar' => 'محافظة الظاهرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Amarat',
            'name_ar'       => 'العامرات‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Bawshar',
            'name_ar'       => 'بوشر‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Muscat',
            'name_ar'       => 'مسقط‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Muttrah',
            'name_ar'       => 'مطرح‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Qurayyat',
            'name_ar'       => 'Qurayyat',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Seeb',
            'name_ar'       => 'السيب‎‎',
            'group_name_en' => 'Muscat',
            'group_name_ar' => 'مسقط',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Khasab',
            'name_ar'       => 'خصب‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Bukha',
            'name_ar'       => 'Bukha',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Dibba Al-Baya',
            'name_ar'       => 'دبا البيعة‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Madha',
            'name_ar'       => 'مدحاء‎‎',
            'group_name_en' => 'Musandam Governorate',
            'group_name_ar' => 'محافظة مسندم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al-Mazyona',
            'name_ar'       => 'المزيونة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Dhalkut',
            'name_ar'       => 'ضلكوت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Mirbat',
            'name_ar'       => 'مرباط',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Muqshin',
            'name_ar'       => 'مقشن',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Rakhyut',
            'name_ar'       => 'رخيوت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Sadah',
            'name_ar'       => 'سدح',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Salalah',
            'name_ar'       => 'صلالة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Shalim and the Hallaniyat Islands',
            'name_ar'       => 'شليم وجزر الحلانيات',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Taqah',
            'name_ar'       => 'طاقة',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Thumrait',
            'name_ar'       => 'ثمريت',
            'group_name_en' => 'Dhofar Governorate',
            'group_name_ar' => 'محافظة ظفار‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '3',
            'name_en'       => 'Al Buraimi',
            'name_ar'       => 'البريمي‎‎',
            'group_name_en' => 'Al Buraimi',
            'group_name_ar' => 'البريمي‎‎',
        ]);


//        Saudi Arabia COUNTRY
        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Bahah',
            'name_ar'       => 'الباحة‎‎',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Aqiq',
            'name_ar'       => 'العقيق',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Karra',
            'name_ar'       => 'الكرة',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Mandaq',
            'name_ar'       => 'المندق',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Makhwah',
            'name_ar'       => 'المخوة',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Baljurashi',
            'name_ar'       => 'بلجرشي‎‎',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Qilwah',
            'name_ar'       => 'قلوه',
            'group_name_en' => 'E Al-Bahah Region',
            'group_name_ar' => 'الباحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Arar',
            'name_ar'       => 'عرعر‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Rafha',
            'name_ar'       => 'رفحاء‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Turaif',
            'name_ar'       => 'طريف‎‎',
            'group_name_en' => 'Northern Borders Region',
            'group_name_ar' => 'منطقة الحدود الشمالية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Haql',
            'name_ar'       => 'حقل',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Dumat al-Jundal',
            'name_ar'       => 'دومة الجندل‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Qurayyat',
            'name_ar'       => 'القريات‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Sakakah',
            'name_ar'       => 'سكاكا‎‎',
            'group_name_en' => 'Al Jawf Region',
            'group_name_ar' => 'الجوف‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Medina',
            'name_ar'       => 'المدينة المنورة‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Henakiyah',
            'name_ar'       => 'الحناكية',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Ola',
            'name_ar'       => 'العلا',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Badr',
            'name_ar'       => 'بَـدْر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Khaybar',
            'name_ar'       => 'خيبر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Mahd adh-Dhahab',
            'name_ar'       => 'مَـهـد الـذّهـب‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Yanbu\' al Bahr',
            'name_ar'       => 'ينبع البحر‎‎',
            'group_name_en' => 'Madinah Region',
            'group_name_ar' => 'المدينة المنورة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Badayea',
            'name_ar'       => 'البادية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Bukayriyah',
            'name_ar'       => 'البكيرية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Mithnab',
            'name_ar'       => 'آل المذنب',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Nabhaniyah',
            'name_ar'       => 'النبهانية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ar Rass',
            'name_ar'       => 'الرس‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Shimasiyah',
            'name_ar'       => 'الشماسية',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ayn Ibn Fuhayd',
            'name_ar'       => 'عين إبن فهيد',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Buraidah',
            'name_ar'       => 'بريدة‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Riyadh Al Khabra',
            'name_ar'       => 'رياض أل خبر',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Unaizah',
            'name_ar'       => 'عنيزة‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Uyun AlJiwa',
            'name_ar'       => 'عيون الجواء‎‎',
            'group_name_en' => 'Al-Qassim Region',
            'group_name_ar' => 'منطقة القصيم‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Afif',
            'name_ar'       => 'عفيف‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Layla',
            'name_ar'       => 'لیلى',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Diriyah',
            'name_ar'       => 'الدرعية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Duwadimi',
            'name_ar'       => 'الدوادمي',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-Ghat',
            'name_ar'       => 'الغاط',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-H̨arīq',
            'name_ar'       => 'الحريق‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-Kharj',
            'name_ar'       => 'الخرج‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Majma\'ah',
            'name_ar'       => 'المجمعة‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-Muzahmiyya',
            'name_ar'       => 'المزاحمية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Riyadh',
            'name_ar'       => 'الرياض‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-Quway\'iyah',
            'name_ar'       => 'القويعية‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Sulayyil',
            'name_ar'       => 'السليل‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Zulfi',
            'name_ar'       => 'الزلفي',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Dhurma',
            'name_ar'       => 'ضرما‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Howtat Bani Tamim',
            'name_ar'       => 'حوطة بني تميم',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Huraymila',
            'name_ar'       => 'حريملا',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Rumah',
            'name_ar'       => 'رماح',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Shaqra',
            'name_ar'       => 'شقرا',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Thadiq',
            'name_ar'       => 'ثادق‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Wadi Al Dawasir',
            'name_ar'       => 'وادي الدواسر‎‎',
            'group_name_en' => 'Riyadh Region',
            'group_name_ar' => 'منطقة الرياض‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Abha',
            'name_ar'       => 'أبها‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ahad Rafidah',
            'name_ar'       => 'أهاد رفيدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Majaridah',
            'name_ar'       => 'المجريدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al-Namas',
            'name_ar'       => 'النماص‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Bareq',
            'name_ar'       => 'بارق‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Bisha',
            'name_ar'       => 'بيشة‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Dhahran Al Janub',
            'name_ar'       => 'الظهران الجنوب',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Khamis Mushait',
            'name_ar'       => 'خميس مشيط‎‎',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Muhayil',
            'name_ar'       => 'Muhayil',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Rojal',
            'name_ar'       => 'Rojal',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Sarat Abidah',
            'name_ar'       => 'سارة عبيدة',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Tathlith',
            'name_ar'       => 'Tathlith',
            'group_name_en' => 'Asir Region',
            'group_name_ar' => 'عسير‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Dammam',
            'name_ar'       => 'الدمام‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Ahsa',
            'name_ar'       => 'الأحساء‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ras Al Khafji',
            'name_ar'       => 'رأس الخفجي‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Kharkhir',
            'name_ar'       => 'الخرخير',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Khobar',
            'name_ar'       => 'الخبر‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Nairyah',
            'name_ar'       => 'النعيرية',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Qatif',
            'name_ar'       => 'القطيف‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Abqaiq',
            'name_ar'       => 'بقيق‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Hafar Al-Batin',
            'name_ar'       => 'حفر الباطن‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Jubail',
            'name_ar'       => 'الجبيل‎‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Qaryat al-Ulya',
            'name_ar'       => 'قرية العليا‎',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ras Tanura',
            'name_ar'       => 'رأس تنورة',
            'group_name_en' => 'Eastern Region',
            'group_name_ar' => 'الشرقية‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Khazaiah',
            'name_ar'       => 'Al Khazaiah',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Shinan',
            'name_ar'       => 'الشنان',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Baqaa',
            'name_ar'       => 'البقعة',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ha\'il',
            'name_ar'       => 'حائل‎‎',
            'group_name_en' => 'Ha\'il Region',
            'group_name_ar' => 'حائل‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Abu `Arish',
            'name_ar'       => 'أبو العريش',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ahad al Masarihah',
            'name_ar'       => 'أهاد المصريحة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Darb',
            'name_ar'       => 'الدرب',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Dayer',
            'name_ar'       => 'الدير',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Aridhah',
            'name_ar'       => 'العريضه',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Edabi',
            'name_ar'       => 'الدابي',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Haridhah',
            'name_ar'       => 'الحريضة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Reeth',
            'name_ar'       => 'الريث',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Baish',
            'name_ar'       => 'بيش',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Damad',
            'name_ar'       => 'داماد',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Farasan',
            'name_ar'       => 'فرسان',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Jizan',
            'name_ar'       => 'جازان‎‎',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Sabya',
            'name_ar'       => 'صبيا',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Samtah',
            'name_ar'       => 'صامطة',
            'group_name_en' => 'Jizan Region',
            'group_name_ar' => 'جيزان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Jumum',
            'name_ar'       => 'الجموم',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Kamil',
            'name_ar'       => 'الكامل',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Khurmah',
            'name_ar'       => 'الخرمه',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Lith',
            'name_ar'       => 'الليث‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Qunfudhah',
            'name_ar'       => 'القنفذة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ta\'if',
            'name_ar'       => 'الطائف‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Jeddah',
            'name_ar'       => 'جدة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Khulays',
            'name_ar'       => 'خليص',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Mecca',
            'name_ar'       => 'مكة',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Rabigh',
            'name_ar'       => 'رابغ‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Ranyah',
            'name_ar'       => 'Ranyah',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Turubah',
            'name_ar'       => 'تربة‎‎',
            'group_name_en' => 'Makkah Region',
            'group_name_ar' => 'مكة المكرمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Badr Al Janub',
            'name_ar'       => 'بدر الجنوب',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Hubuna',
            'name_ar'       => 'Hubuna',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Khubash',
            'name_ar'       => 'Khubash',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Najran',
            'name_ar'       => 'نجران‎‎',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Sharurah',
            'name_ar'       => 'شرورة',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Thar',
            'name_ar'       => 'ثار',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Yadamah',
            'name_ar'       => 'يدمة',
            'group_name_en' => 'Najran Region',
            'group_name_ar' => 'نجران‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Al Wajh',
            'name_ar'       => 'الوجه‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Duba',
            'name_ar'       => 'ضبا‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Tabuk',
            'name_ar'       => 'تبوك‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Tayma',
            'name_ar'       => 'تيماء‎‎',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '4',
            'name_en'       => 'Umluj',
            'name_ar'       => 'أملج',
            'group_name_en' => 'Tabuk Region',
            'group_name_ar' => 'تبوك‎‎',
        ]);


//      QATAR
        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Abu Dhalouf',
            'name_ar'       => 'أبو ظلوف‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Ain Mohammed',
            'name_ar'       => 'عين محمد',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Ain Sanan',
            'name_ar'       => 'عين سنان',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al `Arish',
            'name_ar'       => 'العريش‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al-Gamashiya',
            'name_ar'       => 'الغاشية',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Ghariyah',
            'name_ar'       => 'الغارية‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al-Judhe',
            'name_ar'       => 'Al-Judhe',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Khuwayr',
            'name_ar'       => 'الخوير‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Mafjar',
            'name_ar'       => 'المفجر‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al-Mourouna',
            'name_ar'       => 'آل المارون',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al-Naaman',
            'name_ar'       => 'النعمان',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Madinat ash Shamal',
            'name_ar'       => 'الشمال‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Ar Ru\'ays',
            'name_ar'       => 'اَلرُّؤَيْس‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Freiha',
            'name_ar'       => 'فريحة‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Fuwayrit',
            'name_ar'       => 'فويرط‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Jebel Jassassiyeh',
            'name_ar'       => 'جبل القصاصية',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Madinat Al Kaaban',
            'name_ar'       => 'مدينة الكعبان‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Umm Jassim',
            'name_ar'       => 'أم جاسم',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Umm Al Maa',
            'name_ar'       => 'أم آل ما',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Zubarah',
            'name_ar'       => 'الزبارة‎‎',
            'group_name_en' => 'Al Shamal',
            'group_name_ar' => 'الشمال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Khor',
            'name_ar'       => 'الخور‎‎',
            'group_name_en' => 'Al Khor',
            'group_name_ar' => 'الخور‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Umm Salal',
            'name_ar'       => 'أم صلال‎‎',
            'group_name_en' => 'Umm Salal',
            'group_name_ar' => 'أم صلال‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Daayen',
            'name_ar'       => 'الضعاين‎‎',
            'group_name_en' => 'Al Daayen',
            'group_name_ar' => 'الضعاين‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Rayyan',
            'name_ar'       => 'الريان‎‎',
            'group_name_en' => 'Al Rayyan',
            'group_name_ar' => 'الريان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Doha',
            'name_ar'       => 'الدوحة‎‎',
            'group_name_en' => 'Doha',
            'group_name_ar' => 'الدوحة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al Wakrah',
            'name_ar'       => 'الوكرة‎‎',
            'group_name_en' => 'Al Wakrah',
            'group_name_ar' => 'الوكرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '5',
            'name_en'       => 'Al-Shahaniya',
            'name_ar'       => 'الشحانية',
            'group_name_en' => 'Al-Shahaniya',
            'group_name_ar' => 'الشحانية',
        ]);


//      United Arab Emirates
        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Dubai',
            'name_ar'       => 'دبي‎‎',
            'group_name_en' => 'Dubai',
            'group_name_ar' => 'دبي‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Abu Dhabi',
            'name_ar'       => 'أبو ظبي‎‎',
            'group_name_en' => 'Abu Dhabi',
            'group_name_ar' => 'أبو ظبي‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Sharjah',
            'name_ar'       => 'الشارقة‎‎',
            'group_name_en' => 'Sharjah',
            'group_name_ar' => 'الشارقة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Al Ain',
            'name_ar'       => 'العين‎‎',
            'group_name_en' => 'Al Ain',
            'group_name_ar' => 'العين‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Ajman',
            'name_ar'       => 'عجمان‎‎',
            'group_name_en' => 'Ajman',
            'group_name_ar' => 'عجمان‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Ras al-Khaimah',
            'name_ar'       => 'رأس الخيمة‎‎',
            'group_name_en' => 'Ras al-Khaimah',
            'group_name_ar' => 'رأس الخيمة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Fujairah',
            'name_ar'       => 'الفجيرة‎‎',
            'group_name_en' => 'Fujairah',
            'group_name_ar' => 'الفجيرة‎‎',
        ]);

        DB::table('areas')->insert([
            'country_id'    => '6',
            'name_en'       => 'Umm al-Quwain',
            'name_ar'       => 'أمّ القيوين‎‎',
            'group_name_en' => 'Umm al-Quwain',
            'group_name_ar' => 'أمّ القيوين‎‎',
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

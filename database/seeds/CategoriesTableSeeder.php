<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();

        //Flower Category
        DB::table('categories')->insert([
            'parent_id' => '0',
            'name_en' => 'flowers',
            'name_ar' => 'flowers',
            'description_en' => 'flowers category',
            'description_ar' => 'flowers category',
        ]);

        $category = \App\Category::first();
        DB::table('categories')->insert([
            'parent_id' => $category->id,
            'name_en' => 'flowers A',
            'name_ar' => 'flowers A',
            'description_en' => 'flowers category A',
            'description_ar' => 'flowers category A',
        ]);

        DB::table('categories')->insert([
            'parent_id' => $category->id,
            'name_en' => 'flowers b',
            'name_ar' => 'flowers b',
            'description_en' => 'flowers category b',
            'description_ar' => 'flowers category b',
        ]);

        DB::table('categories')->insert([
            'parent_id' => $category->id,
            'name_en' => 'flowers c',
            'name_ar' => 'flowers c',
            'description_en' => 'flowers category c',
            'description_ar' => 'flowers category c',
        ]);

        DB::table('categories')->insert([
            'parent_id' => $category->id,
            'name_en' => 'flowers d',
            'name_ar' => 'flowers d',
            'description_en' => 'flowers category d',
            'description_ar' => 'flowers category d',
        ]);

        $this->command->info('Categories Seeded!');

    }
}

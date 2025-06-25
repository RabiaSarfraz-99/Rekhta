<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoetrycollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [

            ['title' => 'Couplets of Amjad Islam Amjad', 'image' => 'assets/uploades/poetrycollection/assets/images/couplets-of-amjad-islam-amjad_Medium.png', 'url' => '/top-20-couplets-of-amjad-islam-amjad?wref=rweb'],
            ['title' => 'Couplets of shakeb jalali', 'image' => 'assets/images/couplets-of-shakeb-jalali_Medium.png', 'url' => '/top-20-couplets-of-shakeb-jalali?wref=rweb'],
            ['title' => 'Couplets of Obaidullah Aleem', 'image' => 'assets/images/couplets-of-obaidullah-aleem_Medium.png', 'url' => '/top-20-couplets-of-obaidullah-aleem?wref=rweb'],
            ['title' => 'Couplets of Abbas Tabish', 'image' => 'assets/images/couplets-of-abbas-tabish_Medium.png', 'url' => '/top-20-couplets-of-abbas-tabish?wref=rweb'],
            ['title' => 'Couplets of Nasir Kazmi', 'image' => 'assets/images/couplets-of-nasir-kazmi_Medium.png', 'url' => '/top-20-couplets-of-nasir-kazmi?wref=rweb'],
            ['title' => 'Couplets of Zeb Ghauri', 'image' => 'assets/images/couplets-of-zeb-ghauri_Medium.png', 'url' => '/top-20-couplets-of-zeb-ghauri?wref=rweb'],
            ['title' => 'Couplets of Sarwat Husain', 'image' => 'assets/images/couplets-of-sarwat-husain_Medium.png', 'url' => '/top-20-couplets-of-sarwat-husain?wref=rweb'],
            ['title' => 'Couplets of Dagh Dehlvi', 'image' => 'assets/images/couplets-of-dagh-dehlvi_Medium.png', 'url' => '/top-20-couplets-of-dagh-dehlvi?wref=rweb'],
            ['title' => 'Couplets of Rajinder Manchanda Bani', 'image' => 'assets/images/couplets-of-rajinder-manchanda-bani_Medium.png', 'url' => '/top-20-couplets-of-rajinder-manchanda-bani?wref=rweb'],
            ['title' => 'Couplets of Irfan Siddiqui', 'image' => 'assets/images/couplets-of-irfan-siddiqui_Medium.png', 'url' => '/top-20-couplets-of-irfan-siddiqui?wref=rweb'],
            ['title' => 'Couplets of Shakeel Badayuni', 'image' => 'assets/images/couplets-of-shakeel-badayuni_Medium.png', 'url' => '/top-20-couplets-of-shakeel-badayuni?wref=rweb'],
            ['title' => 'Train Shayari', 'image' => 'assets/images/train-shayari_Medium.png', 'url' => '/top-20-train-shayari?wref=rweb'],
        ];

        foreach ($data as $index => $item) {
            DB::table('poetrycollections')->insert([
                'title' => $item['title'],
                'image' => $item['image'],
                'url' => $item['url'],
                'sequence' => $index + 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

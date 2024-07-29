<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データを配列で定義
        $deliveryTimes = [];
        $curriculumId = 1;
        $maxCurriculumId = 72;

        // カリキュラムIDが1から72までの時間帯を4回ずつ追加する
        for ($i = 1; $i <= ($maxCurriculumId * 4); $i++) {
            $deliveryTimes[] = [
                'curriculums_id' => $curriculumId,
                'delivery_from' => '2024-07-13 13:00:00',
                'delivery_to' => '2024-07-13 15:00:00',
            ];

            // カリキュラムIDを切り替える
            if ($i % 4 == 0) {
                $curriculumId++;
            }
        }

        // データの挿入
        foreach ($deliveryTimes as $time_slot) {
            DB::table('delivery_times')->insert($time_slot);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\DormitoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DormitorySeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = file_get_contents(base_path("public/data/dormitory.json"));
        $json = json_decode($json, true);
        foreach ($json as $key => $value) {
            foreach ($value as $dormitory) {
                $dormExists = DormitoryModel::where('name', $dormitory['name'])->first();
                if ($dormExists) {
                    continue;
                }
                $dormitoryData = new DormitoryModel();
                $dormitoryData->name = $dormitory['name'];
                $dormitoryData->save();
            }
        }
    }
}

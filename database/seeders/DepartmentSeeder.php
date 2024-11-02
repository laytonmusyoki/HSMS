<?php

namespace Database\Seeders;

use App\Models\DepartmentData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json=file_get_contents(base_path("public/data/departments.json"));
        $json=json_decode($json,true);

        foreach( $json as $key => $value ){
            foreach($value as $department){
                $department_exists=DepartmentData::where("name",$department['name'])->first();
                if($department_exists){
                    continue;
                }
                $departmentData=new DepartmentData();
                $departmentData->name=$department['name'];
                $departmentData->save();
            }
        }
    }
}

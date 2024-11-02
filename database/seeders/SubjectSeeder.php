<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json=file_get_contents(base_path("public/data/subjects.json"));
        $json=json_decode($json,true);

        foreach ($json as $key => $value) {
            foreach ($value as $subject) {
                $found_subject=Subjects::where('subject', $subject['name'])->first();
                if ($found_subject) {
                    continue;
                }
                $subject_data=new Subjects();
                $subject_data->subject=$subject['name'];
                $subject_data->id=Subjects::max('id') + 1;
                $subject_data->save();
            }
        }
    }
}

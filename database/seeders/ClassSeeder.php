<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
            Classroom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name'=>'1A'],
            ['name'=>'1B'],
            ['name'=>'1C'],
        ];
        
        foreach($data as $value){
            ClassRoom::insert([
                'name'=>$value['name'],
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);
        }
        
    }
}

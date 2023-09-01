<?php

namespace Database\Seeders;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
    @return void
     */
    public function run()
    {
        
        Student::factory()->count(200)->create();
    }
}

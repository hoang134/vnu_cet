<?php

namespace Database\Seeders;

use App\Models\CetKythiStudent;
use Illuminate\Database\Seeder;

class CetKythiStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $cetKythiStudent = new CetKythiStudent();
       $cetKythiStudent->username = 'SV02';
       $cetKythiStudent->Makythi = 'C32021';
       $cetKythiStudent->Mamonthi = 'A1';
       $cetKythiStudent->Sobaodanh = '14898498';
       $cetKythiStudent->Phongthi = 'SV02';
       $cetKythiStudent->Ketqua = '950';
       $cetKythiStudent->save();
    }
}

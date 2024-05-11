<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaSangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ca_lams')->delete();

        DB::table('ca_lams')->truncate();

        DB::table('ca_lams')->insert([
            ['id' => '1', 'name' => 'Ca Sáng', 'gio_vao' => '07:00:00',  'gio_ra' => '12:00:00', 'is_open' => '1'],
            ['id' => '2', 'name' => 'Ca Chiều', 'gio_vao' => '12:00:00',  'gio_ra' => '17:00:00', 'is_open' => '1'],
            ['id' => '3', 'name' => 'Ca Tối', 'gio_vao' => '17:00:00',  'gio_ra' => '22:00:00', 'is_open' => '1'],
            ['id' => '4', 'name' => 'Ca Khuya', 'gio_vao' => '22:00:00',  'gio_ra' => '03:00:00', 'is_open' => '1'],
        ]);
    }
}

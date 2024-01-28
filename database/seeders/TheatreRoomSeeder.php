<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TheatreRooms;

class TheatreRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TheatreRooms::create([
          'room' => 'Room 1',
          'status' => 'Available',
          'comment' => 'Room 1 is available for booking',
          'created_by' => '1',
          'updated_by' => '1',
        ]);

        TheatreRooms::create([
            'room' => 'Room 2',
            'status' => 'Available',
            'comment' => 'Room 2 is available for booking',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
    }
}

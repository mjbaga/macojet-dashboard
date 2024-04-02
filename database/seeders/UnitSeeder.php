<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitC = Unit::create([
            'unit_name' => 'Unit C',
            'unit_type' => 'boarding'
        ]);

        $this->createRooms($unitC, [3, 4, 3, 2, 3, 1]);

        $unitT = Unit::create([
            'unit_name' => 'Unit T',
            'unit_type' => 'transient'
        ]);

        $this->createRooms($unitT, [2]);

        $unitT1 = Unit::create([
            'unit_name' => 'Unit T1',
            'unit_type' => 'transient'
        ]);

        $this->createRooms($unitT1, [2]);

        $unitT2 = Unit::create([
            'unit_name' => 'Unit T2',
            'unit_type' => 'transient'
        ]);

        $this->createRooms($unitT2, [2]);

        $unitO1 = Unit::create([
            'unit_name' => 'Unit O-1',
            'unit_type' => 'boarding'
        ]);

        $this->createRooms($unitO1);

        $unitO2 = Unit::create([
            'unit_name' => 'Unit O-2',
            'unit_type' => 'boarding'
        ]);

        $this->createRooms($unitO2);
    }

    public function createRooms(Unit $unit, array $capacity = [2])
    {
        for($i = 0; $i < count($capacity); $i++) {
            $unit->rooms()->create([
                'room_number' => 'Room ' . ($i + 1),
                'capacity' => $capacity[$i]
            ]);
        }
    }
}

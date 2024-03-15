<?php

namespace Database\Seeders;

use App\Models\Boarder;
use App\Models\RevieweeProfile;
use App\Models\StudentProfile;
use App\Models\WorkerProfile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoarderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boarder::factory(10)->student()->create()->each(function(Boarder $boarder) {
            StudentProfile::factory(1)->create()->each(function(StudentProfile $profile) use ($boarder) {
                $profile->boarder()->save($boarder);
            });
        });

        Boarder::factory(10)->reviewee()->create()->each(function(Boarder $boarder) {
            RevieweeProfile::factory(1)->create()->each(function(RevieweeProfile $profile) use ($boarder) {
                $profile->boarder()->save($boarder);
            });
        });

        Boarder::factory(10)->working()->create()->each(function(Boarder $boarder) {
            WorkerProfile::factory(1)->create()->each(function(WorkerProfile $profile) use ($boarder) {
                $profile->boarder()->save($boarder);
            });
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Award::truncate();
        $baseUrl = asset('assets/images/rewards');

          for($count = 1; $count<=25; $count++){
            Award::create([
                  'title' => 'Reward '.$count,
                  'description' => 'Description for Reward '.$count,
                  'image_path' => $baseUrl.'/'.$count.'.jpg',
              ]);
          }
    }
}

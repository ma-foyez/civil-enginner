<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Testing Experience model...\n";

        // Create without JSON fields first
        $experience = Experience::create([
            'company_name' => 'Test Company',
            'position' => 'Test Position',
            'start_date' => '2021-01-01',
            'is_current' => true,
            'is_active' => true,
            'priority' => 1,
        ]);

        // Then update with JSON fields
        $experience->achievements = ['Achievement 1', 'Achievement 2'];
        $experience->technologies = ['PHP', 'Laravel'];
        $experience->save();

        echo "Created experience with ID: " . $experience->id . "\n";
    }
}

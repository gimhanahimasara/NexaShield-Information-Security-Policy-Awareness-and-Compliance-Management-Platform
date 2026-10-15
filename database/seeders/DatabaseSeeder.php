<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
    {
        
        \App\Models\Policy::factory(15)->create();

        
        $employees = \App\Models\User::factory(10)->create([
            'role' => 'employee',
            'password' => bcrypt('password'), 
        ]);

        
        $activePolicies = \App\Models\Policy::where('status', 'active')->get();

        foreach ($employees as $employee) {
            
            $policiesToAcknowledge = $activePolicies->random(rand(0, $activePolicies->count()));

            foreach ($policiesToAcknowledge as $policy) {
                \App\Models\PolicyAcknowledgment::create([
                    'user_id' => $employee->id,
                    'policy_id' => $policy->id,
                    'acknowledged_at' => now(),
                ]);
            }
        }
    }
}

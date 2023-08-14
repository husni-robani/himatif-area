<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoleEnum;
use App\Providers\Models\Period;
use App\Providers\Models\PeriodUser;
use App\Providers\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Admin
        $user = User::create([
            'name' => 'HIMATIF',
            'email' => 'hima.teknikinformatika@widyatama.ac.id',
            'password' => 'password',
            'period_id' => null,
            'admin' => 1,
            'phone' => '000000000',
            'position' => 'ADMIN',
            'npm' => '00000000'
        ]);

        $period = Period::create(['name' => 'GEN 20', 'vision' => 'TEST', 'mission' => 'TEST', 'year' => 2020, 'description' => 'TEST', 'active' => true]);
        $user = $period->users()->create([
            'name' => 'Husni Robani',
            'email' => 'husni.robani@widyatama.ac.id',
            'password' => 'password',
            'period_id' => $period->id,
            'admin' => 0,
            'phone' => '082119802202',
            'position' => 'ADMIN',
            'npm' => '0620101068'
        ]);

        PeriodUser::create([
            'period_id' => $period->id,
            'user_id' => $user->id,
            'role' => UserRoleEnum::USER
        ]);

    }
}

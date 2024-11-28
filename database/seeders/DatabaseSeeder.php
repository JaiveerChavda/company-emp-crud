<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Department::create(['name' => 'web']);
        Department::create(['name' => 'mobile']);

        Designation::create(['name' => 'developer']);
        Designation::create(['name' => 'designer']);


        Company::factory(5)->create()->each(function ($company) {
            Employee::factory(5)->create(['company_id' => $company->id]);
        });

        Country::factory(50)->create();

        City::factory(50)->create();
    }
}

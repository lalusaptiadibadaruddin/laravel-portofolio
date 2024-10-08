<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'title' => 'Home',
            'url' => 'dashboard',
        ]);

        $master = MenuItem::create([
            'title' => 'Master',
            'url' => '',
        ]);

        MenuItem::create([
            'title' => 'Skill',
            'url' => 'skill',
            'parent_id' => $master->id,
        ]);

        MenuItem::create([
            'title' => 'Media Social',
            'url' => 'contact',
            'parent_id' => $master->id,
        ]);

        $biodata = MenuItem::create([
            'title' => 'Biodata',
            'url' => '',
        ]);

        MenuItem::create([
            'title' => 'Profile',
            'url' => 'profile',
            'parent_id' => $biodata->id,
        ]);

        MenuItem::create([
            'title' => 'Experience',
            'url' => 'experience',
            'parent_id' => $biodata->id,
        ]);

        MenuItem::create([
            'title' => 'List Skill',
            'url' => 'listSkill',
            'parent_id' => $biodata->id,
        ]);

        MenuItem::create([
            'title' => 'Contact',
            'url' => 'contact',
            'parent_id' => $biodata->id,
        ]);

        MenuItem::create([
            'title' => 'Interest',
            'url' => 'interest',
            'parent_id' => $biodata->id,
        ]);

        $management = MenuItem::create([
            'title' => 'Management',
            'url' => '',
        ]);

        MenuItem::create([
            'title' => 'User',
            'url' => 'user',
            'parent_id' => $management->id,
        ]);

    }
}

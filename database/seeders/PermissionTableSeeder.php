<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createTasks = new Permission();
        $createTasks->slug = 'create-tasks';
        $createTasks->name = 'Create Tasks';
        $createTasks->save();

        $deleteTasks = new Permission();
        $deleteTasks->slug = 'delete-tasks';
        $deleteTasks->name = 'Delete Tasks';
        $deleteTasks->save();

        $viewUsers = new Permission();
        $viewUsers->slug = 'view-users';
        $viewUsers->name = 'View Users';
        $viewUsers->save();
    }
}

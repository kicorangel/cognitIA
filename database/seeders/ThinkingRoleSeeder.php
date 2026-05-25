<?php

namespace Database\Seeders;

use App\Models\ThinkingRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Support\DefaultThinkingRoles;

class ThinkingRoleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::orderBy('id')->first();

        if (! $user) {
            $this->command->warn('No users found. Create a user before running ThinkingRoleSeeder.');
            return;
        }

        $roles = DefaultThinkingRoles::cognitiveHat();

        foreach ($roles as $role) {
            ThinkingRole::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'model_key' => 'cognitive_hat',
                    'code' => $role['code'],
                ],
                [
                    'name' => $role['name'],
                    'title' => $role['title'],
                    'profile_prompt' => $role['profile_prompt'],
                    'is_active' => true,
                    'sort_order' => $role['sort_order'],
                ]
            );
        }

        $this->command->info('Default cognitive_hat roles created for user: ' . $user->email);
    }
}
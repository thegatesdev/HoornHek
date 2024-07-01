<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\CaseModel;
use App\Models\CellOccupation;
use App\Models\Evidence;
use App\Models\Group;
use App\Models\Location;
use App\Models\Permission;
use App\Models\Prisoner;
use App\Models\User;
use Database\Factories\ActionFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $location = Location::factory()->createOne();
        $users = User::factory(10)->create();
        $groups = Group::factory(5)->create();
        $actions = Action::all('id');
        foreach ($groups as $group) {
            for ($i = 0; $i < fake()->numberBetween(10, 20); $i++) {
                $group->actions()->attach($actions->find($i));
            }
        }
        foreach ($users as $user) {
            $user->locations()->attach($location);
            $actionCount = fake()->numberBetween(1, 50);

            for ($i = 0; $i < $actionCount; $i++) {
                ActionLog::factory()->create([
                    'user_id' => $user,
                    'action_id' => $actions->random(),
                ]);
            }
            foreach ($groups->random(2) as $group) {
                $user->groups()->attach($group);
            }
        }

        $prisoners = Prisoner::factory(40)->create();
        $cases = CaseModel::factory(35)->create();
        $cellIdx = 0;

        foreach ($prisoners as $prisoner) {
            $case = $cases->random();
            $prisoner->cases()->attach($case, ['reason' => fake()->realTextBetween(20, 40)]);
            $caseId = $prisoner->cases()->first()->link->id;
            if (fake()->boolean(70)) {
                CellOccupation::factory()->create([
                    'location_id' => $location,
                    'case_prisoner_id' => $caseId,
                    'cell' => $cellIdx++,
                ]);
            }
        }

        foreach ($cases as $case) {
            Evidence::factory(fake()->numberBetween(1, 3))->create([
                'case_id' => $case,
            ]);
        }

        // $randomUser = User::all()->random();
        // echo "Random user: " . $randomUser->profile->first_name . PHP_EOL;
        // foreach ($randomUser->locations as $location) {
        //     echo "In: " . $location->city . PHP_EOL;
        // }
        // foreach ($randomUser->groups as $group) {
        //     echo "Group: " . $group->name . PHP_EOL;
        // }
        // foreach ($randomUser->actions as $action) {
        //     echo "Action: " . $action . PHP_EOL;
        // }
    }
}

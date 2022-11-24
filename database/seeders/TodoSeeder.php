<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;
use Nette\Utils\DateTime;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::factory()->count(2)->sequence(
            [
                'name' => 'TodoName',
                'description' => 'TodoDescription',
            ],[
                'name' => 'TodoName2',
                'description' => 'TodoDescription2',
                'due_date' => Carbon::createFromDate(2022,11,30),
                'is_complete' => 1,
            ],
        )->create();
    }
}

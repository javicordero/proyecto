<?php

namespace Database\Seeders;

use App\Models\AttributeType;
use Illuminate\Database\Seeder;

class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttributeType::factory()->count(3)->hasAttributes(4)->create();
    }
}

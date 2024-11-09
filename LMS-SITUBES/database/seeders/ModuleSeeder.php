<?php
// database/seeders/ModuleSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        Module::factory()->count(5)->create();
    }
}

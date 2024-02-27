<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poste;

class PosteSeeder extends Seeder
{

    public function run()
    {
        Poste::create(['nom' => 'pro', 'occupe' => 'oui']);
        Poste::create(['nom' => 'demo', 'occupe' => 'oui']);
    }
}

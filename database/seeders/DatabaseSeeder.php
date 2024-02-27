<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Poste;
use App\Models\Autorisation;
use App\Models\Color_para;
use App\Models\Color_interval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PosteSeeder::class);

/*---Paramétrage des user de base -----------------------------------------------------------------------------*/

        $poste1 = Poste::where('nom', 'pro')->first();

        $user = User::create([
            'name' => 'Konan Marie',
            'email' => 'Konanmarie@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C1223456',
            'tel' => '0757803650',
            'poste_id' => $poste1->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

/*---Paramétrage couleur de base -----------------------------------------------------------------------------*/

        $color_para = Color_para::create([
            'nbre0' => '0',
            'nbre1' => '1',
            'nbre2' => '5',
            'nbre_color' => '4',
            'operation' => 'multiplication',
        ]);

        $color_interval1 = Color_interval::create([
            'nbre1' => '1',
            'nbre2' => '5',
            'color' => 'vert',
            'code_color' => '#5eccbf',
        ]);

        $color_interval2 = Color_interval::create([
            'nbre1' => '6',
            'nbre2' => '10',
            'color' => 'jaune',
            'code_color' => '#f7f880',
        ]);

        $color_interval3 = Color_interval::create([
            'nbre1' => '11',
            'nbre2' => '15',
            'color' => 'orange',
            'code_color' => '#f2b171',
        ]);

        $color_interval4 = Color_interval::create([
            'nbre1' => '16',
            'nbre2' => '25',
            'color' => 'rouge',
            'code_color' => '#ea6072',
        ]);

/*-------------------------------------------------------------------------------------------------------*/
    }

}

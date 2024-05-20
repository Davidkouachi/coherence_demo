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

        $poste0 = Poste::where('nom', 'pro')->first();

        $user = User::create([
            'name' => 'Konan Marie',
            'email' => 'Konanmarie@gmail.com',
            'password' => bcrypt('Kmarie10'),
            'matricule' => 'C1223450',
            'tel' => '0757803650',
            'poste_id' => $poste0->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

        $user = User::create([
            'name' => 'David Kouachi',
            'email' => 'david@gmail.com',
            'password' => bcrypt('David001'),
            'matricule' => 'C1223459',
            'tel' => '0102514392',
            'poste_id' => $poste0->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);


        $poste1 = Poste::where('nom', 'CONTRÔLEUR')->first();

        $user = User::create([
            'name' => 'Controlleur',
            'email' => 'controller@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C1223456',
            'tel' => '0000000000',
            'poste_id' => $poste1->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

        /*---------------------------------------------------------------*/

        $poste2 = Poste::where('nom', 'OPÉRATEUR DE SAISIE')->first();

        $user2 = User::create([
            'name' => 'Operateur',
            'email' => 'operateur@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C12334490',
            'tel' => '1111111111',
            'poste_id' => $poste2->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

        /*---------------------------------------------------------------*/

        $poste3 = Poste::where('nom', 'ADMINISTRATEUR')->first();

        $user3 = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C12345491',
            'tel' => '3333333333',
            'poste_id' => $poste3->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

        /*---------------------------------------------------------------*/

        $poste4 = Poste::where('nom', 'PRODUCTION')->first();

        $user4 = User::create([
            'name' => 'Production',
            'email' => 'produc@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C1234951',
            'tel' => '4444444444',
            'poste_id' => $poste4->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);

        /*---------------------------------------------------------------*/

        $poste5 = Poste::where('nom', 'VALIDATEUR')->first();

        $user5 = User::create([
            'name' => 'Validateur',
            'email' => 'valid@gmail.com',
            'password' => bcrypt('12345'),
            'matricule' => 'C1234904',
            'tel' => '5555555555',
            'poste_id' => $poste5->id,
            'suivi_active' => 'non',
            'fa' => 'non',
        ]);
/*-------------------------------------------------------------------------------------------------------------*/

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

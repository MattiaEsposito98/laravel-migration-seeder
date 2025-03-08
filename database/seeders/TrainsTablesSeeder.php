<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $newTrain = new Train();
            $newTrain->azienda = $faker->company(); // Nome azienda
            $newTrain->stazione_di_partenza = $faker->city(); // Città partenza
            $newTrain->stazione_di_arrivo = $faker->city(); // Città arrivo
            $newTrain->orario_di_partenza = $faker->time(); // Orario partenza
            $newTrain->orario_di_arrivo = $faker->time(); // Orario arrivo
            $newTrain->codice_treno = $faker->bothify('??-#####'); // Codice treno
            $newTrain->totale_carozze = $faker->numberBetween(5, 20); // Numero carrozze


            // Definizione dello stato del treno
            $newTrain->è_cancellato = $faker->boolean();

            if ($newTrain->è_cancellato) {
                // Se il treno è cancellato
                $newTrain->è_in_orario = false;
                $newTrain->ritardo = 0;
            } else {
                // Se il treno non è cancellato
                $newTrain->è_in_orario = $faker->boolean(); // 50% di probabilità di essere in orario
                if ($newTrain->è_in_orario) {
                    $newTrain->ritardo = 0; // Se è in orario, il ritardo è 0
                } else {
                    $newTrain->ritardo = $faker->numberBetween(1, 120); // Se non è in orario, genera un ritardo casuale
                }
            }

            $newTrain->save();
        }
    }
}

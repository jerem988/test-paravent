<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classes\Continent;
use Illuminate\Support\Facades\Storage;

class SurfaceAbriDisponible extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'surface-abri:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obtenir la surface d\'abri disponible à parti de la largeur du continent et des n entiers donnant les altitudes du terrain, d\'ouest en est.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dataSet = file(Storage::path('data-set-continent'));
        $surfaceDisponible = 0;

        if($dataSet && isset($dataSet[0]) && isset($dataSet[1])) {
            $continent = new Continent($dataSet[0], $dataSet[1]);
            $surfaceDisponible = $continent->getSurfaceAbriDisponible();
            $this->info($surfaceDisponible);
        }

        else {
            $this->error('Jeux de données invalide dans le fichier data-set-continent');
        }

        return $surfaceDisponible;
    }
}

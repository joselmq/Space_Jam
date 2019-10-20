<?php


namespace App\Services;

class NasaImagesService {

    public function getNasaImageId(){

        $nasaIdsImages = [];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000201', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => '200910220009HQ', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e001453', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000271', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => 'ED04-0056-105', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000988', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];
        $nasaIdsImages[] = ['id' => 'PIA18054', 'url_project' => 'https://ovacen.com/100-proyectos-ecologicos/'];

        $index = array_rand($nasaIdsImages);
        $image = $nasaIdsImages[$index];

        return $image;
    }
}
<?php


namespace App\Services;

class NasaImagesService {

    public function getNasaImageId(){

        $nasaIds = [
            'GSFC_20171208_Archive_e000201',
            '200910220009HQ',
            'GSFC_20171208_Archive_e001453',
            'GSFC_20171208_Archive_e000271',
            'ED04-0056-105',
            'GSFC_20171208_Archive_e000988',
            'PIA18054',
        ];

        $index = array_rand($nasaIds);
        $id = $nasaIds[$index];

        return $id;
    }
}
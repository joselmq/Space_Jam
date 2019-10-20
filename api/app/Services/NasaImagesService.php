<?php


namespace App\Services;

class NasaImagesService {

    public function getNasaImageId(){

        $nasaIdsImages = [];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000201', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => '200910220009HQ', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e001453', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000271', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => 'ED04-0056-105', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => 'GSFC_20171208_Archive_e000988', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];
        $nasaIdsImages[] = ['id' => 'PIA18054', 'url_project' => 'https://www.naturalcapitalpartners.com/solutions/solution/carbon-emissions'];

        $index = array_rand($nasaIdsImages);
        $image = $nasaIdsImages[$index];

        return $image;
    }
}